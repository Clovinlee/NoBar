<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


class SnackController extends Controller
{   
    use SoftDeletes;

    public function AddSnack(Request $req){
        $namafile = "";
        if($req->hasFile("foto")){
            echo "masuk"; 
            $file = $req->file("foto");
            $namafile = $file->getClientOriginalName();
            echo $namafile;
            $file->move('assets/images', $namafile);
        }
        
        $snack = new Snack();
        $snack->nama = $req->input("name");
        $snack->harga = $req->input("harga");
        $snack->tipe = $req->input("jenis_snack");
        // $snack->foto = $req->input($namafile);
        $snack->foto = $namafile;
        $snack->save();

    }


}
