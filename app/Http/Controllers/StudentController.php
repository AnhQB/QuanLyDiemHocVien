<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Degree;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

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
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ',$arr);

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

    public function store(StoreStudentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $student = new Student();
        $hashed_random_password = Hash::make($request->password);
        $student = $this -> model -> create([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $hashed_random_password,
            'semester_major' => $request->semester_major,
            'major_id' => $request->major_id,
            'degree_id' => $request->degree_id,
        ]);

        $email = str_replace(' ', '', $student -> name) . $student -> id . '@gmail.com';

        $path = Storage::disk("public")->putFile("avatars/$student->id", $request->file('avatar'));
        $this -> model -> where('id', $student -> id) -> update([
            'avatar' => $path,
            'email' => $email,
        ]);

        return redirect()
            -> route("$this->table.index")
            -> with('success',"Đã thêm tài khoản thành công có email: $email và id: $student->id");
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
