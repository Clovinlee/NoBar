<?php

namespace App\Http\Controllers;

use App\Models\Dtrans;
use App\Models\Htrans;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use stdClass;

class ManagerController extends Controller
{
    //composer require barryvdh/laravel-dompdf
    public function dashboard()
    {
        $profit = DB::select("select IFNULL(SUM(h.total),0) as total from transactions t, htrans h where year(t.created_at) = year(CURRENT_DATE) and month(t.created_at) = month(CURRENT_DATE) and day(t.created_at) = day(CURRENT_DATE) and t.id = h.transaction_id");
        $profit_snack = DB::select("select IFNULL(SUM(h.total),0) as total from transactions t, htranssnacks h where year(t.created_at) = year(CURRENT_DATE) and month(t.created_at) = month(CURRENT_DATE) and day(t.created_at) = day(CURRENT_DATE) and t.id = h.transaction_id;");
        $date = DB::select("select CURRENT_DATE as date");
        $profit = $profit[0]->total;
        $profit_snack = $profit_snack[0]->total;
        $total = $profit + $profit_snack;
        dd($profit);
        return view("manager.dashboard",[
            "profit" => $profit,
            "profit_snack" => $profit_snack,
            "total" => $total
        ]);
    }

    public function generate($awal,$akhir)
    {
        if ($awal == "no" || $akhir == "no") {
            $cek = DB::select('select h.id as id, u.name as nama_user, m.judul as movie_title, s.nama as studio, b.nama as branch, h.total from htrans h, users u, schedules sch, movies m, studios s, branches b where h.user_id = u.id and h.schedule_id = sch.id and sch.movie_id = m.id and sch.studio_id = s.id and sch.branch_id = b.id', []);
            $tipe = "Data semua transaksi";
    
            $jumlah = DB::select('SELECT SUM(htrans.total) as total FROM htrans',[]);
        }else{
            $cek = DB::select('select h.id as id, u.name as nama_user, m.judul as movie_title, s.nama as studio, b.nama as branch, h.total from htrans h, users u, schedules sch, movies m, studios s, branches b where h.user_id = u.id and h.schedule_id = sch.id and sch.movie_id = m.id and sch.studio_id = s.id and sch.branch_id = b.id and h.created_at BETWEEN ? and ?', [$awal,$akhir]);
            $tipe = "Data yang ditampilkan adalah transaksi yang terjadi pada tanggal ".$awal." s/d ".$akhir;
    
            $jumlah = DB::select('SELECT SUM(htrans.total) as total FROM htrans WHERE (htrans.created_at) between ? and ?',[$awal,$akhir]);
        }
        $script = '<h3>'.$tipe.'</h3><br><table class="table table-sm" border="1px">
        <thead>
            <tr class="fw-bold">
                <td>
                    ID Transaksi
                </td>
                <td>
                    Nama user
                </td>
                <td>
                    Judul film
                </td>
                <td>
                    Studio
                </td>
                <td>
                    Lokasi
                </td>
                <td>
                    Total transaksi
                </td>
            </tr>
        </thead>
        <tbody>';
        for ($i=0; $i < count($cek); $i++) { 
            $script = $script . '<tr height="70px" class="align-middle"><td>';
            $script = $script . $cek[$i]->id . '</td>';
            $script = $script .'<td>'. $cek[$i]->nama_user . '</td>';
            $script = $script .'<td>'. $cek[$i]->movie_title . '</td>';
            $script = $script .'<td>'. $cek[$i]->studio . '</td>';
            $script = $script .'<td>'. $cek[$i]->branch . '</td>';
            $script = $script .'<td> Rp. '. $cek[$i]->total . '</td></tr>';
        }
        $script = $script . '</tbody></table><br>';
        $script = $script . '<h3>Total semua Transaksi : Rp. '.$jumlah[0]->total.'</h3>';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($script);
        return $pdf->stream();
    }

    public function generateChart()
    {
        $htrans = DB::select('
            select
                MONTHNAME(date_range.mm) as month_name,
                IFNULL(sum(total), 0) as count
            from
                (
                    select (NOW() - INTERVAL counter.m MONTH) as mm
                    from
                        (
                            select @rownum := @rownum + 1 as m from
                            (select 1 union select 2 union select 3 union select 4) t1,
                            (select 1 union select 2 union select 3) t2,
                            (select @rownum := -1) t0
                        ) counter
                ) date_range    
            left join
                htrans ht
            on
                MONTH(ht.created_at) = MONTH(date_range.mm)
            group by 
                MONTH(date_range.mm), date_range.mm
            order by
                date_range.mm
        ');
        $htrans_snack = DB::select('select MONTHNAME(date_range.mm) as month_name, IFNULL(sum(total), 0) as count from ( select (NOW() - INTERVAL counter.m MONTH) as mm from ( select @rownum := @rownum + 1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3) t2, (select @rownum := -1) t0 ) counter ) date_range left join htranssnacks ht on MONTH(ht.created_at) = MONTH(date_range.mm) group by MONTH(date_range.mm), date_range.mm order by date_range.mm');
        $labels = array_map(function($item) {
            return $item->month_name;
        }, $htrans);
        $data = array_map(function($item) {
            return $item->count;
        }, $htrans);
        
        $labels_snack = array_map(function($item) {
            return $item->month_name;
        }, $htrans_snack);
        $data_snack = array_map(function($item) {
            return $item->count;
        }, $htrans_snack);
        $render = view('manager.laporan',[
            'labels' => $labels,
            'data' => $data,
            'labels_snack' => $labels_snack,
            'data_snack' => $data_snack
        ])->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($render);
        return $pdf->stream();
    }

    public function cekReportAjax(Request $r)
    {
        if ($r->ajax()) {
            $awal = $r->input("awal") ?? "";
            $akhir = $r->input("akhir") ?? "";
    
            $awal = $awal . " 00:00:00";
            $akhir = $akhir . " 23:59:59";
    
            $cek = DB::select('select h.id as id, u.name as nama_user, m.judul as movie_title, s.nama as studio, b.nama as branch, h.total from htrans h, users u, schedules sch, movies m, studios s, branches b where h.user_id = u.id and h.schedule_id = sch.id and sch.movie_id = m.id and sch.studio_id = s.id and sch.branch_id = b.id and h.created_at BETWEEN ? and ?', [$awal,$akhir]);
            $tipe = "Data yang ditampilkan adalah transaksi yang terjadi pada tanggal ".$awal." s/d ".$akhir;
    
            $jumlah = DB::select('SELECT SUM(htrans.total) as total FROM htrans WHERE (htrans.created_at) between ? and ?',[$awal,$akhir]);
            $apa = new stdClass;
            $apa->cek = $cek;
            $apa->tipe = $tipe;
            $apa->jumlah = number_format($jumlah[0]->total,2,',','.');
            return json_encode($apa);
        }
    }

    public function cekMovieAjax(Request $r)
    {
        if ($r->ajax()) {
            $awal = $r->input("awal") ?? "";
            $akhir = $r->input("akhir") ?? "";
    
            $awal = $awal . " 00:00:00";
            $akhir = $akhir . " 23:59:59";
    
            $cek = DB::select('SELECT m.id as id,m.judul as judul,COUNT(d.seat) as terjual FROM htrans h join dtrans d on d.htrans_id = h.id join schedules s on h.schedule_id = s.id RIGHT join movies m on s.movie_id = m.id and h.created_at BETWEEN ? and ? GROUP by m.judul,m.id order by 1', [$awal,$akhir] );
            $tipe = "Data yang ditampilkan adalah transaksi yang terjadi pada tanggal ".$awal." s/d ".$akhir;
    
            $cek2 = array_map(function($item) {
                return $item->terjual;
            }, $cek);
            $jumlah = DB::select('SELECT COUNT(d.seat) as terjual FROM htrans h join dtrans d on d.htrans_id = h.id join schedules s on h.schedule_id = s.id RIGHT join movies m on s.movie_id = m.id and h.created_at BETWEEN ? and ?  order by 1',[$awal,$akhir]);
            $apa = new stdClass;
            $apa->cek = $cek;
            $apa->cek2 = $cek2;
            $apa->tipe = $tipe;
            $apa->jumlah = $jumlah[0]->terjual." pcs";

            return json_encode($apa);
        }
    }

    public function cekSnackAjax(Request $r)
    {
        if ($r->ajax()) {
            $awal = $r->input("awal") ?? "";
            $akhir = $r->input("akhir") ?? "";
    
            $awal = $awal . " 00:00:00";
            $akhir = $akhir . " 23:59:59";
    
            $cek = DB::select('select h.id as id,u.name as nama, s.nama as label,s.harga as harga, ifnull(sum(d.qty),0) as count,h.total as total FROM htranssnacks h join dtranssnacks d on h.id = d.htranssnack_id and h.created_at BETWEEN ? and ? RIGHT join snacks s on d.snack_id = s.id join users u on h.user_id = u.id GROUP by s.nama,h.id,u.name,s.harga,h.total ', [$awal,$akhir] );
            $tipe = "Data yang ditampilkan adalah transaksi yang terjadi pada tanggal ".$awal." s/d ".$akhir;
    
            $cek2 = array_map(function($item) {
                return $item->count;
            }, $cek);
            $jumlah = DB::select('SELECT sum(d.qty) as terjual FROM htranssnacks h join dtranssnacks d on d.htranssnack_id = h.id and h.created_at BETWEEN ? and ?  order by 1',[$awal,$akhir]);
            $apa = new stdClass;
            $apa->cek = $cek;
            $apa->cek2 = $cek2;
            $apa->tipe = $tipe;
            $apa->jumlah = $jumlah[0]->terjual." pcs";

            return json_encode($apa);
        }
    }

    public function cekHariAjax(Request $r)
    {
        if ($r->ajax()) {
            $awal = $r->input("awal") ?? "";
            $akhir = $r->input("akhir") ?? "";
    
            $awal = $awal . " 00:00:00";
            $akhir = $akhir . " 23:59:59";
    
            $bar_hari = DB::select('select dayname(created_at) as hari, count(dayname(created_at)) as jumlah_pembeli from htrans where created_at BETWEEN ? and ? GROUP by dayname(created_at) ORDER BY CASE WHEN hari = "Sunday" THEN 1 WHEN hari = "Monday" THEN 2 WHEN hari = "Tuesday" THEN 3 WHEN hari = "Wednesday" THEN 4 WHEN hari = "Thursday" THEN 5 WHEN hari = "Friday" THEN 6 WHEN hari = "Saturday" THEN 7 END ASC',[$awal,$akhir]); 
            $bar_hari2 = array_map(function($item) {
                return $item->jumlah_pembeli;
            }, $bar_hari);
            $hari_compare = array_map(function($item) {
                return $item->hari;
            }, $bar_hari);
            $baru = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday","Friday", "Saturday"];
            $baru_count=[];
            $ctr = 0;
            foreach ($baru as $key => $value) {
                if (in_array($value,$hari_compare)) {
                    array_push($baru_count,$bar_hari2[$ctr]);
                    $ctr++;
                }
                else{
                    array_push($baru_count,0);
                }
            }
            
            return json_encode($baru_count);
        }
    }

    public function cekBranchAjax(Request $r)
    {
        if ($r->ajax()) {
            $awal = $r->input("awal") ?? "";
            $akhir = $r->input("akhir") ?? "";
    
            $awal = $awal . " 00:00:00";
            $akhir = $akhir . " 23:59:59";
    
            $branch = DB::select('select b.nama as label, count(h.id) as count FROM 
            htrans h join schedules sch on h.schedule_id = sch.id and h.created_at BETWEEN ? and ? right join branches b on b.id = sch.branch_id GROUP by b.nama',[$awal,$akhir]);
    
            $branch_label = array_map(function($item) {
                return $item->label;
            }, $branch);
            $branch_count = array_map(function($item) {
                return $item->count;
            }, $branch);
            return json_encode($branch_count);
        }
    }

    public function cekReport(Request $request){
        $htrans = DB::select('
            select
                MONTHNAME(date_range.mm) as month_name,
                COUNT(id) as count
            from
                (
                    select (NOW() - INTERVAL counter.m MONTH) as mm
                    from
                        (
                            select @rownum := @rownum + 1 as m from
                            (select 1 union select 2 union select 3 union select 4) t1,
                            (select 1 union select 2 union select 3) t2,
                            (select @rownum := -1) t0
                        ) counter
                ) date_range    
            left join
                htrans ht
            on
                MONTH(ht.created_at) = MONTH(date_range.mm)
            group by 
                MONTH(date_range.mm), date_range.mm
            order by
                date_range.mm
        ');

        $htrans_snack = DB::select('select MONTHNAME(date_range.mm) as month_name, IFNULL(sum(total), 0) as count from ( select (NOW() - INTERVAL counter.m MONTH) as mm from ( select @rownum := @rownum + 1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3) t2, (select @rownum := -1) t0 ) counter ) date_range left join htranssnacks ht on MONTH(ht.created_at) = MONTH(date_range.mm) group by MONTH(date_range.mm), date_range.mm order by date_range.mm');
        $labels_htrans_movie = array_map(function($item) {
            return $item->month_name;
        }, $htrans);
        $data_htrans_movie = array_map(function($item) {
            return $item->count;
        }, $htrans);
        
        $labels_htrans_snack = array_map(function($item) {
            return $item->month_name;
        }, $htrans_snack);
        $data_htrans_snack = array_map(function($item) {
            return $item->count;
        }, $htrans_snack);

        $awal = $request->input("awal") ?? "";
        $akhir = $request->input("akhir") ?? "";

        $awal = $awal . " 00:00:00";
        $akhir = $akhir . " 23:59:59";

        $cek = DB::select('select h.id as id, u.name as nama_user, m.judul as movie_title, s.nama as studio, b.nama as branch, h.total from htrans h, users u, schedules sch, movies m, studios s, branches b where h.user_id = u.id and h.schedule_id = sch.id and sch.movie_id = m.id and sch.studio_id = s.id and sch.branch_id = b.id and h.created_at BETWEEN ? and ?', [$awal,$akhir]);
        $tipe = "Data yang ditampilkan adalah transaksi yang terjadi pada tanggal ".$awal." s/d ".$akhir;

        $jumlah = DB::select('SELECT SUM(htrans.total) as total FROM htrans WHERE (htrans.created_at) between ? and ?',[$awal,$akhir]);
        // dd($cek);
        // dd($jumlah);
        // dd($data_snack);
        return view('manager.laporan',[
            'awal' => $awal,
            'akhir' => $akhir,
            'report'=>$cek,
            'tipe' => $tipe,
            'jumlah' => $jumlah[0]->total,
            'labels_htrans_movie' => $labels_htrans_movie,
            'data_htrans_movie' => $data_htrans_movie,
            'labels_htrans_snack' => $labels_htrans_snack,
            'data_htrans_snack' => $data_htrans_snack
        ]);
    }

    public function laporan()
    {        
        $htrans = DB::select('
            select
                MONTHNAME(date_range.mm) as month_name,
                IFNULL(sum(total), 0) as count
            from
                (
                    select (NOW() - INTERVAL counter.m MONTH) as mm
                    from
                        (
                            select @rownum := @rownum + 1 as m from
                            (select 1 union select 2 union select 3 union select 4) t1,
                            (select 1 union select 2 union select 3) t2,
                            (select @rownum := -1) t0
                        ) counter
                ) date_range    
            left join
                htrans ht
            on
                MONTH(ht.created_at) = MONTH(date_range.mm)
            group by 
                MONTH(date_range.mm), date_range.mm
            order by
                date_range.mm
        ');
        $htrans_snack = DB::select('select MONTHNAME(date_range.mm) as month_name, IFNULL(sum(total), 0) as count from ( select (NOW() - INTERVAL counter.m MONTH) as mm from ( select @rownum := @rownum + 1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3) t2, (select @rownum := -1) t0 ) counter ) date_range left join htranssnacks ht on MONTH(ht.created_at) = MONTH(date_range.mm) group by MONTH(date_range.mm), date_range.mm order by date_range.mm');
        $labels = array_map(function($item) {
            return $item->month_name;
        }, $htrans);
        $data = array_map(function($item) {
            return $item->count;
        }, $htrans);
        
        $labels_snack = array_map(function($item) {
            return $item->month_name;
        }, $htrans_snack);
        $data_snack = array_map(function($item) {
            return $item->count;
        }, $htrans_snack);

        $cek = DB::select('select h.id as id, u.name as nama_user, m.judul as movie_title, s.nama as studio, b.nama as branch, h.total from htrans h, users u, schedules sch, movies m, studios s, branches b where h.user_id = u.id and h.schedule_id = sch.id and sch.movie_id = m.id and sch.studio_id = s.id and sch.branch_id = b.id', []);
        $tipe = "";

        $jumlah = DB::select('SELECT SUM(htrans.total) as total FROM htrans');

        return view('manager.laporan',[
            'awal' => "no",
            'akhir' => "no",
            'report'=>$cek,
            'tipe' => $tipe,
            'jumlah' => $jumlah[0]->total,
            'labels' => $labels,
            'data' => $data,
            'labels_snack' => $labels_snack,
            'data_snack' => $data_snack
        ]);
    }

    public function laporanBulanan()
    {        
        $htrans = DB::select('
        select Date(date_range.dd) as date, COUNT(id) as count from ( select (NOW() - INTERVAL counter.d DAY) as dd from ( select @rownum := @rownum + 1 as d from (select 1 union select 2 union select 3 union select 4 union select 5) t1, (select 1 union select 2 union select 3) t2, (select 1 union select 2) t3, (select @rownum := -1) t0 ) counter ) date_range left join htrans ht on DAY(ht.created_at) = DAY(date_range.dd) group by DAY(date_range.dd), date_range.dd order by date_range.dd
        ');
        $labels = array_map(function($item) {
            return $item->date;
        }, $htrans);
        $data = array_map(function($item) {
            return $item->count;
        }, $htrans);
        
        return view('manager.laporan2',[
            'labels' => $labels,
            'data' => $data
        ]);
    }

    public function bar()
    {
        $bar_semua_movie = DB::select('select m.id, count(sch.movie_id) as count FROM htrans h join schedules sch on h.schedule_id = sch.id right join movies m on m.id = sch.movie_id GROUP by m.id',[]); 
        $semua_judul_movie = DB::select('select judul from movies order by id asc');
        $total_movie = DB::select('select count(sch.movie_id) as count FROM htrans h join schedules sch on h.schedule_id = sch.id right join movies m on m.id = sch.movie_id');

        $semua_judul_movie = array_map(function($item) {
            return $item->judul;
        }, $semua_judul_movie);
        $bar_semua_movie = array_map(function($item) {
            return $item->count;
        }, $bar_semua_movie);
        return view('manager.bar',[
            'bar_semua_movie' => $bar_semua_movie,
            'semua_judul_movie' => $semua_judul_movie,
            'total_movie' => $total_movie[0]->count 
        ]);
    }

    public function piechart()
    {
        $bar = DB::select('SELECT s.tipe, SUM(d.qty) AS count
        FROM dtranssnacks d RIGHT JOIN snacks s ON d.snack_id=s.id
        GROUP BY s.tipe',[]); 
        $bar = array_map(function($item) {
            return $item->count;
        }, $bar);
        return view('manager.piechart',[
            'bar' => $bar,
        ]);
    }

    public function barHari()
    {
        $bar_hari = DB::select('select dayname(created_at) as hari, count(dayname(created_at)) as jumlah_pembeli from htrans GROUP by dayname(created_at) ORDER BY CASE WHEN hari = "Sunday" THEN 1 WHEN hari = "Monday" THEN 2 WHEN hari = "Tuesday" THEN 3 WHEN hari = "Wednesday" THEN 4 WHEN hari = "Thursday" THEN 5 WHEN hari = "Friday" THEN 6 WHEN hari = "Saturday" THEN 7 END ASC',[]);  
        $bar_hari = array_map(function($item) {
            return $item->jumlah_pembeli;
        }, $bar_hari);
        return view('manager.barHari',[
            'bar_hari' => $bar_hari
        ]);
    }

    public function index(){
        $profit = DB::select("select IFNULL(SUM(h.total),0) as total from htrans h where DATE(h.created_at) = DATE(CURRENT_DATE)");
        $profit_snack = DB::select("select IFNULL(SUM(h.total),0) as total from htranssnacks h where DATE(h.created_at) = DATE(CURRENT_DATE)");
        $date = DB::select("select CURRENT_DATE as date");
        $profit = $profit[0]->total;
        $profit_snack = $profit_snack[0]->total;
        $total = $profit + $profit_snack;

        $sum_movie = DB::select('select SUM(h.total) as total FROM htrans h where h.created_at BETWEEN (now() - INTERVAL 6 day) and now()');
        $sum_snack = DB::select('select SUM(h.total) as total FROM htranssnacks h where h.created_at BETWEEN (now() - INTERVAL 6 day) and now()');
        $total_semua = $sum_movie[0]->total + $sum_snack[0]->total;
        $total_semua = number_format($total_semua,2,',','.');

        $mgg = DB::select("select Date(date_range.dd) as date, IFNULL(SUM(total),0) as count from ( select (NOW() - INTERVAL counter.d DAY) as dd from ( select @rownum := @rownum + 1 as d from (select 1 union select 2 union select 3 union select 4 union select 5 union SELECT 6 union SELECT 7) t1, (select @rownum := -1) t0 ) counter ) date_range left join htrans ht on DATE(ht.created_at) = DATE(date_range.dd) group by date_range.dd order by date_range.dd");

        $labels = array_map(function($item) {
            return $item->date;
        }, $mgg);
        $data = array_map(function($item) {
            return $item->count;
        }, $mgg);

        $mgg_snack = DB::select("select Date(date_range.dd) as date, IFNULL(SUM(total),0) as count from ( select (NOW() - INTERVAL counter.d DAY) as dd from ( select @rownum := @rownum + 1 as d from (select 1 union select 2 union select 3 union select 4 union select 5 union SELECT 6 union SELECT 7) t1, (select @rownum := -1) t0 ) counter ) date_range left join htranssnacks ht on DATE(ht.created_at) = DATE(date_range.dd) group by date_range.dd order by date_range.dd");

        $labels_snack = array_map(function($item) {
            return $item->date;
        }, $mgg_snack);
        $data_snack = array_map(function($item) {
            return $item->count;
        }, $mgg_snack);

        $movie_mgg = DB::select('select m.judul as label,m.id, count(d.id) as count FROM htrans h join schedules sch on h.schedule_id = sch.id join dtrans d on h.id = d.htrans_id and h.created_at BETWEEN (now() - INTERVAL 6 day) and now() join movies m on m.id = sch.movie_id GROUP by m.id,m.judul', []);
        $snack_mgg = DB::select('select s.tipe as label, sum(d.qty) as count FROM htranssnacks h,dtranssnacks d,snacks s where h.id = d.htranssnack_id and d.snack_id = s.id and h.created_at BETWEEN (now() - INTERVAL 6 day) and now() GROUP by s.tipe',[]);

        $semua = array_map(function($item) {
            return $item->label;
        }, $movie_mgg);
        $bar = array_map(function($item) {
            return $item->count;
        }, $movie_mgg);

        $semua_snack = array_map(function($item) {
            return $item->label;
        }, $snack_mgg);
        $bar_snack = array_map(function($item) {
            return $item->count;
        }, $snack_mgg);

        $branch = DB::select('select b.nama as label, count(h.id) as count FROM 
        htrans h join schedules sch on h.schedule_id = sch.id and h.created_at BETWEEN (now() - INTERVAL 6 day) and now() right join branches b on b.id = sch.branch_id GROUP by b.nama');

        $branch_label = array_map(function($item) {
            return $item->label;
        }, $branch);
        $branch_count = array_map(function($item) {
            return $item->count;
        }, $branch);

        $htrans = DB::select('
            select
                MONTHNAME(date_range.mm) as month_name,
                IFNULL(sum(total), 0) as count
            from
                (
                    select (NOW() - INTERVAL counter.m MONTH) as mm
                    from
                        (
                            select @rownum := @rownum + 1 as m from
                            (select 1 union select 2 union select 3 union select 4) t1,
                            (select 1 union select 2 union select 3) t2,
                            (select @rownum := -1) t0
                        ) counter
                ) date_range    
            left join
                htrans ht
            on
                MONTH(ht.created_at) = MONTH(date_range.mm)
            group by 
                MONTH(date_range.mm), date_range.mm
            order by
                date_range.mm
        ');

        $labels_htrans_movie = array_map(function($item) {
            return $item->month_name;
        }, $htrans);
        $data_htrans_movie = array_map(function($item) {
            return $item->count;
        }, $htrans);

        $htrans_snack = DB::select('select MONTHNAME(date_range.mm) as month_name, IFNULL(sum(total), 0) as count from ( select (NOW() - INTERVAL counter.m MONTH) as mm from ( select @rownum := @rownum + 1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3) t2, (select @rownum := -1) t0 ) counter ) date_range left join htranssnacks ht on MONTH(ht.created_at) = MONTH(date_range.mm) group by MONTH(date_range.mm), date_range.mm order by date_range.mm');

        $labels_htrans_snack = array_map(function($item) {
            return $item->month_name;
        }, $htrans_snack);
        $data_htrans_snack = array_map(function($item) {
            return $item->count;
        }, $htrans_snack);

        $cek = DB::select('select h.id as id, u.name as nama_user, m.judul as movie_title, s.nama as studio, b.nama as branch, h.total from htrans h, users u, schedules sch, movies m, studios s, branches b where h.user_id = u.id and h.schedule_id = sch.id and sch.movie_id = m.id and sch.studio_id = s.id and sch.branch_id = b.id', []);
        $tipe = "";

        $jumlah = DB::select('SELECT SUM(htrans.total) as total FROM htrans');


        $bar_movie = DB::select('SELECT m.judul as label,COUNT(d.seat) as count FROM htrans h join dtrans d on d.htrans_id = h.id join schedules s on h.schedule_id = s.id RIGHT join movies m on s.movie_id = m.id AND YEAR(h.created_at)=year(CURRENT_DATE) GROUP by m.judul',[]); 
        $semua_movie = DB::select('select judul from movies order by id asc');
        $total_movie = DB::select('SELECT COUNT(d.seat) as count FROM htrans h join dtrans d on d.htrans_id = h.id join schedules s on h.schedule_id = s.id RIGHT join movies m on s.movie_id = m.id');

        $bar_htrans_snack = DB::select('select s.nama as label, ifnull(sum(d.qty),0) as count FROM htranssnacks h join dtranssnacks d on h.id = d.htranssnack_id RIGHT join snacks s on d.snack_id = s.id GROUP by s.nama',[]);

        $semua_htrans_snack = array_map(function($item) {
            return $item->label;
        }, $bar_htrans_snack); 
        $data_hitung_snack =  array_map(function($item) {
            return $item->count;
        }, $bar_htrans_snack);

        $semua_judul_movie = array_map(function($item) {
            return $item->label;
        }, $bar_movie);
        $bar_semua_movie = array_map(function($item) {
            return $item->count;
        }, $bar_movie);

        $bar_hari = DB::select('select dayname(created_at) as hari, count(dayname(created_at)) as jumlah_pembeli from htrans GROUP by dayname(created_at) ORDER BY CASE WHEN hari = "Sunday" THEN 1 WHEN hari = "Monday" THEN 2 WHEN hari = "Tuesday" THEN 3 WHEN hari = "Wednesday" THEN 4 WHEN hari = "Thursday" THEN 5 WHEN hari = "Friday" THEN 6 WHEN hari = "Saturday" THEN 7 END ASC',[]);  
        $bar_hari = array_map(function($item) {
            return $item->jumlah_pembeli;
        }, $bar_hari);

        $bar_branch = DB::select('select b.nama as label, count(h.id) as count FROM 
        htrans h join schedules sch on h.schedule_id = sch.id right join branches b on b.id = sch.branch_id GROUP by b.nama',[]);
        $semua_branch = array_map(function($item) {
            return $item->label;
        }, $bar_branch);
        $data_branch = array_map(function($item) {
            return $item->count;
        }, $bar_branch);

        // $admins = DB::table('users')->where('role','=','2')->get();
        $us = new User();
        $admins = User::where('role', '=', '2')->get();

        $tabel_movie = DB::select('SELECT m.id as id,m.judul as judul,COUNT(d.seat) as terjual FROM htrans h join dtrans d on d.htrans_id = h.id join schedules s on h.schedule_id = s.id RIGHT join movies m on s.movie_id = m.id GROUP by m.id,m.judul order by 1');

        $report_snack = DB::select('select h.id as id,u.name as nama, s.nama as label,s.harga as harga, ifnull(sum(d.qty),0) as count,h.total as total FROM htranssnacks h join dtranssnacks d on h.id = d.htranssnack_id RIGHT join snacks s on d.snack_id = s.id join users u on h.user_id = u.id GROUP by s.nama,h.id,u.name,s.harga,h.total',[]);
        $total_snack = DB::select('select sum(qty) as count from dtranssnacks',[]);
        return view('manager.manager',[
            'profit' => $profit,
            'profit_snack' => $profit_snack,
            'total' => $total_semua,
            'labels' => $labels,
            'data' => $data,
            'labels_snack' => $labels_snack,
            'data_snack' => $data_snack,
            'bar' => $bar,
            'semua' => $semua,
            'bar_snack' => $bar_snack,
            'semua_snack' => $semua_snack,
            'branch_label' => $branch_label,
            'branch_count' => $branch_count,
            'awal' => "no",
            'akhir' => "no",
            'report'=>$cek,
            'tipe' => $tipe,
            'jumlah' => $jumlah[0]->total,
            'labels_htrans_movie' => $labels_htrans_movie,
            'data_htrans_movie' => $data_htrans_movie,
            'labels_htrans_snack' => $labels_htrans_snack,
            'data_htrans_snack' => $data_htrans_snack,
            'bar_semua_movie' => $bar_semua_movie,
            'semua_judul_movie' => $semua_judul_movie,
            'total_movie' => $total_movie[0]->count,
            'bar_hari' => $bar_hari,
            'semua_htrans_snack' => $semua_htrans_snack,
            'bar_htrans_snack' => $data_hitung_snack,
            'semua_branch' => $semua_branch,
            'data_branch' => $data_branch,
            'admins' => $admins,
            'report_all_movie' => $tabel_movie,
            'report_snack' => $report_snack,
            'total_snack' => $total_snack[0]->count
        ]);
    }

    public function addAdmin(){
        $admins = DB::select("SELECT * FROM users WHERE role=2");
        return view('manager.master-admin',["admins" => $admins]);
    }

    public function formAdmin(){
        return view('manager.add-admin');
    }

    public function verifyregister(Request $r){
        $credentials = $r->validate([
            'name'=>'required|max:255',
            'email'=>'required|email:dns|unique:users,email',
            'password'=>'required|min:5|max:255',
            'confirm_password'=>'required|same:password'
        ]);
        $credentials["password"] = Hash::make($credentials["password"]);
        $usr = new User();
        $usr->name = $credentials["name"];
        $usr->email = $credentials["email"];
        $usr->password = $credentials["password"];
        $usr->role = 2;
        $usr->save();

        $admins = DB::select("SELECT * FROM users WHERE role=2");
        return view('manager.master-admin',["admins" => $admins]);
    }

    public function delete(Request $r){
        User::where('id', '=', $r->id)->delete();
        $data   = User::where('role','=','2')->get();
        return json_encode($data);
    }

    public function add(Request $r){
        if($r->ajax()){
            $m = new User();
            $m->name = $r->nama;
            $m->email = $r->email;
            $m->password = Hash::make($r->password);
            $m->role = 2;
            $m->save();

            $data = User::where('role','=','2')->get();
            return json_encode($data);
        }   
    }
}
