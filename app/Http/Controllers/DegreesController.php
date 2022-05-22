<?php

namespace App\Http\Controllers;

use App\Models\Degrees;
use App\Http\Requests\StoreDegreesRequest;
use App\Http\Requests\UpdateDegreesRequest;

class DegreesController extends Controller
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
     * @param  \App\Http\Requests\StoreDegreesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDegreesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Degrees  $degrees
     * @return \Illuminate\Http\Response
     */
    public function show(Degrees $degrees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Degrees  $degrees
     * @return \Illuminate\Http\Response
     */
    public function edit(Degrees $degrees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDegreesRequest  $request
     * @param  \App\Models\Degrees  $degrees
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDegreesRequest $request, Degrees $degrees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Degrees  $degrees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Degrees $degrees)
    {
        //
    }
}
