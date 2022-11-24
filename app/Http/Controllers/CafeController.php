<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function index(){
        //GET SNACK
        $listBranch = Branch::all();
        return view("cafe.cafe",["listBranch"=>$listBranch]);
    }
}
