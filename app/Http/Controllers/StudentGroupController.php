<?php

namespace App\Http\Controllers;

use App\Models\StudentGroup;
use App\Http\Requests\StoreStudentGroupRequest;
use App\Http\Requests\UpdateStudentGroupRequest;

class StudentGroupController extends Controller
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
     * @param  \App\Http\Requests\StoreStudentGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentGroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentGroup  $studentGroup
     * @return \Illuminate\Http\Response
     */
    public function show(StudentGroup $studentGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentGroup  $studentGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentGroup $studentGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentGroupRequest  $request
     * @param  \App\Models\StudentGroup  $studentGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentGroupRequest $request, StudentGroup $studentGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentGroup  $studentGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentGroup $studentGroup)
    {
        //
    }
}
