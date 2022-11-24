<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CafeController extends Controller
{

    public function cafePayment(Request $r){

    }
    
    public function index(){
        //GET SNACK
        $listBranch = Branch::all();
        return view("cafe.cafe",["listBranch"=>$listBranch]);
    }

    public function refreshCafe(Request $r){
        if($r->ajax()){
            $listItem = json_decode($r->listItem);
            if(count($listItem) <= 0){
                Session::flash("error",$r->msg);
                return false;
            }else{
                return true;
            }
        }
    }
}
