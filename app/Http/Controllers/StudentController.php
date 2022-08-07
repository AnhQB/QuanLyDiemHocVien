<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\Major;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this->model = (new Student()) -> query();
        $this->table = (new Student())->getTable();

        $routeName = Route::currentRouteName();
        $arr = explode('.',$routeName);
        $arr=array_map('ucfirst', $arr);
        $title=implode(' - ',$arr);

        View::share('title', $title);

    }

    public function index()
    {
        $data = Student::paginate(10);
        return view("admin.$this->table.index",[
           'data' => $data
        ]);
    }

    public function create()
    {
        $majors = Major::query()->pluck('name','id')->toArray();
        $degrees = Degree::query()->pluck('name','id')->toArray();
        return view("admin.$this->table.create",[
            'majors' => $majors,
            'degrees' => $degrees
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        //

    }


    public function show(string $id)
    {
        $student = $this->model
            ->with('major')
            ->with('degree')
            ->where('id', $id)
            ->first();
        return view("admin.$this->table.show",[
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
