<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Http\Requests\StoreStudioRequest;
use App\Http\Requests\UpdateStudioRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function AddStudio(Request $r)
    {
        if ($r->ajax()) {
            $s=new Studio;
            $s->branch_id=$r->branch;
            $s->nama=$r->nama;
            $s->slot=$r->slot;
            $s->save();
            $b=Branch::all();
            foreach ($b as $k => $v) {
                $v->studio=$v->studio;
            }
            return json_encode($b);
        }
    }
    public function EditStudio(Request $r)
    {
        if ($r->ajax()) {
            $s=Studio::find($r->id);
            $s->nama=$r->nama;
            $s->slot=$r->slot;
            $s->save();
            $b=Branch::all();
            foreach ($b as $k => $v) {
                $v->studio=$v->studio;
            }
            return json_encode($b);
        }
    }
    public function DeleteStudio(Request $r)
    {
        if ($r->ajax()) {
            $s=Studio::find($r->id);
            $s->delete();
            $b=Branch::all();
            foreach ($b as $k => $v) {
                $v->studio=$v->studio;
            }
            return json_encode($b);
        }
    }
}
