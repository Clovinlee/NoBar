<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ... $role)
    {
        $usr = Auth::user();
        $idRole = [];

        foreach ($role as $v) {
            if($v == "user"){
                array_push($idRole,"1");
            }
            else if($v == "admin"){
                array_push($idRole,"2");
            }else if($v == "manager"){
                array_push($idRole,"3");
            }
        }

        if($usr != null && $usr instanceof User){
            if(in_array($usr["role"], $idRole)){
                return $next($request);
            }
        }

        return redirect(url("/"));
    }
}
