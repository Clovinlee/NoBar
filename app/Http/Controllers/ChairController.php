<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Http\Requests\StoreChairRequest;
use App\Http\Requests\UpdateChairRequest;

class ChairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Http\Requests\StoreChairRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChairRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chair  $chair
     * @return \Illuminate\Http\Response
     */
    public function show(Chair $chair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chair  $chair
     * @return \Illuminate\Http\Response
     */
    public function edit(Chair $chair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChairRequest  $request
     * @param  \App\Models\Chair  $chair
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChairRequest $request, Chair $chair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chair  $chair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chair $chair)
    {
        //
    }
}
