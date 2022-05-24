<?php

namespace App\Http\Controllers;

use App\Models\DegreeMajor;
use App\Http\Requests\StoreDegreeMajorRequest;
use App\Http\Requests\UpdateDegreeMajorRequest;

class DegreeMajorController extends Controller
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
     * @param  \App\Http\Requests\StoreDegreeMajorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDegreeMajorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DegreeMajor  $degreeMajor
     * @return \Illuminate\Http\Response
     */
    public function show(DegreeMajor $degreeMajor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DegreeMajor  $degreeMajor
     * @return \Illuminate\Http\Response
     */
    public function edit(DegreeMajor $degreeMajor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDegreeMajorRequest  $request
     * @param  \App\Models\DegreeMajor  $degreeMajor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDegreeMajorRequest $request, DegreeMajor $degreeMajor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DegreeMajor  $degreeMajor
     * @return \Illuminate\Http\Response
     */
    public function destroy(DegreeMajor $degreeMajor)
    {
        //
    }
}
