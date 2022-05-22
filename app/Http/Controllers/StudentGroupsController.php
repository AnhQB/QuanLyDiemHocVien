<?php

namespace App\Http\Controllers;

use App\Models\StudentGroups;
use App\Http\Requests\StoreStudentGroupsRequest;
use App\Http\Requests\UpdateStudentGroupsRequest;

class StudentGroupsController extends Controller
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
     * @param  \App\Http\Requests\StoreStudentGroupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentGroupsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentGroups  $studentGroups
     * @return \Illuminate\Http\Response
     */
    public function show(StudentGroups $studentGroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentGroups  $studentGroups
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentGroups $studentGroups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentGroupsRequest  $request
     * @param  \App\Models\StudentGroups  $studentGroups
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentGroupsRequest $request, StudentGroups $studentGroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentGroups  $studentGroups
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentGroups $studentGroups)
    {
        //
    }
}
