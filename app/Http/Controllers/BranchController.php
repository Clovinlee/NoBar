<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function AddBranch(Request $request)
    {
        if ($request->ajax()) {
            $id=Branch::get()->last()->id;
            $branch=new Branch();
            $branch->nama=$request->input("nama");
            $branch->save();
            $branch->parent=$id;
            return json_encode($branch);
        }
    }
    public function DeleteBranch(Request $r)
    {
        if ($r->ajax()) {
            $branch=Branch::find($r->id);
            $branch->delete();
            $b=Branch::all();
            return json_encode($b);
        }
    }
    public function EditBranch(Request $r)
    {
        if ($r->ajax()) {
            $branch=Branch::find($r->id);
            $branch->nama=$r->input("nama");
            $branch->save();
            $b=Branch::all();
            return json_encode($b);
        }
    }
    public function SearchBranch(Request $r)
    {
        if ($r->ajax()) {
            $b=Branch::where("nama","like","%".$r->nama."%")->get();
            return json_encode($b);
        }
    }
}
