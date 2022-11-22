<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ManagerController extends Controller
{
    public function dashboard()
    {
        $profit = DB::select("select SUM(h.total) as total from transactions t, htrans h where year(t.created_at) = year(CURRENT_DATE) and month(t.created_at) = month(CURRENT_DATE) and day(t.created_at) = day(CURRENT_DATE) and t.id = h.transaction_id");
        $date = DB::select("select CURRENT_DATE as date");
        // dd();
        return view("manager.dashboard",["profit" => $profit[0]->total,"date" => $date[0]->date]);
    }
}