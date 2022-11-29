<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Studio;
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
            $b=Branch::all();
            foreach ($b as $k => $v) {
                $v->studio=$v->studio;
            }
            return json_encode($b);
        }
    }
    public function DeleteBranch(Request $r)
    {
        if ($r->ajax()) {
            Studio::where("branch_id","=",$r->id)->delete();
            $branch=Branch::find($r->id);
            $branch->delete();
            $b=Branch::all();
            foreach ($b as $k => $v) {
                $v->studio=$v->studio;
            }
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
            foreach ($b as $k => $v) {
                $v->studio=$v->studio;
            }
            return json_encode($b);
        }
    }
    public function SearchBranch(Request $r)
    {
        if ($r->ajax()) {
            $b=Branch::where("nama","like","%".$r->nama."%")->get();
            foreach ($b as $k => $v) {
                $v->studio=$v->studio;
            }
            return json_encode($b);
        }
    }
}
