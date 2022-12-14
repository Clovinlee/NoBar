<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Branch;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetSchedule()
    {
        $jadwal=Schedule::all();
        foreach ($jadwal as $key => $j) {
            $j->branch=$j->branch;
            $j->studio=$j->studio;
            $j->movie=$j->movie;
            $j->harga=number_format($j->price);
        }
        return DataTables::of($jadwal)->make(true);
    }
    public function DeleteSchedule(Request $r)
    {
        $s=Schedule::where("id","=",$r->id);
        $s->delete();
    }
    public function EditSchedule(Request $r,$id)
    {
        $s=Schedule::find($id);
        $s->time=$r->time;
        $s->save();
    }
    public function AddSchedule(Request $r)
    {
        foreach ($r->studio as $key => $st) {
            $temp=explode(",",$st);
            $s=new Schedule;
            $s->studio_id=$temp[1];
            $s->branch_id=$temp[0];
            $s->movie_id=$r->movie;
            $s->price=45000;
            $s->time=$r->time;
            $s->save();
        }
    }
    public function Dashboard(Request $r)
    {
        if ($r->ajax()) {
            return json_encode(Schedule::schedulesetelah());
        }
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScheduleRequest  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
