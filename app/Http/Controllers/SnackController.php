<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


class SnackController extends Controller
{   
    use SoftDeletes;

    public function AddSnack(Request $r){
        if ($r->ajax()) {
            $m              =   new Snack;
            $m->nama        =   $r->nama;
            $m->harga       =   $r->harga;
            $m->tipe        =   $r->jenis;
            $img            =   $r->file("image");
            $img->storeAs("/snack",$img->getClientOriginalName(), 'public');
            $m->foto        =   $img->getClientOriginalName();
            $m->deskripsi = $r->deskripsi;
            $m->save();
            $data           = Snack::all();
            return json_encode($data);
        }
    }





}
