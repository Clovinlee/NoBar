<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $r){
        dd($r->input("search"));
        //return view.
    }
}
