<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Illuminate\Support\Facades\Request;

class BranchController extends Controller
{
    public function AddBranch(Request $request)
    {
        $data["nama"]=$request->nama;
        Branch::insert($request->data);
        return response();
    }
}
