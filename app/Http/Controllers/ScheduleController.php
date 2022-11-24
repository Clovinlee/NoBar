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

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function JadwalBranch(Request $r)
    {
        $branch=Branch::find($r->id);
        $jadwal=$branch->schedule;
        $jadwal->asal="branch";
        $jadwal->nama=$branch->nama;
        foreach ($jadwal as $k => $s) {
            $s->nama_branch=$branch->nama;
            $s->nomor_studio=$s->studio->nama;
            $s->judul_movie=$s->movie->judul;
            $s->durasi=$s->movie->duration;
        }
        $data=new stdClass;
        $data->schedule=$jadwal;
        return json_encode($data);
    }
    public function JadwalMovie(Request $r)
    {
        $movie=Movie::find($r->id);
        $jadwal=$movie->schedule;
        $jadwal->asal="movie";
        $jadwal->nama=$movie->judul;
        foreach ($jadwal as $k => $s) {
            $s->nama_branch=$s->branch->nama;
            $s->nomor_studio=$s->studio->nama;
            $s->judul_movie=$movie->judul;
            $s->durasi=$s->movie->duration;
        }
        $data=new stdClass;
        $data->schedule=$jadwal;
        return json_encode($data);
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
