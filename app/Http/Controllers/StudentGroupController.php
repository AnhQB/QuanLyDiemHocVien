<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\Group;
use App\Models\Major;
use App\Http\Requests\StoreStudentGroupRequest;
use App\Http\Requests\UpdateStudentGroupRequest;
use App\Models\StudentGroup;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use PHPUnit\TextUI\XmlConfiguration\Groups;

class StudentGroupController extends Controller
{
    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this->model = (new StudentGroup())->query();
        $this->table = (new StudentGroup())->getTable();

        $routeName = Route::currentRouteName();
        $arr = explode(',', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index(Request $request)
    {
        $degrees = Degree::query()
            ->pluck('name','id')
            ->toArray();

        return view("admin.$this->table.index",[
            'degrees' => $degrees,
        ]);
    }

    public function apiFilter(Request $request){
        $current_degree_id = $request->degree_id;
        $current_major_id = $request->major_id;
        $current_group_id = $request->group_id;
        $current_subject_id = $request->subject_id;
        $current_step = (int) $request->step;

        $data = [];


        //get step choose
        //switch
        switch ($current_step) {
            //1 : after choose degree: current_degree != null
            //get arr majors
            //next
            case 1:

                break;

            //2: choose major: current major != null
            //get arr groups
            case 2:
                dd(2);
                break;
            //3: choose group: current group != null
            //get arr subjects
            case 3:
                dd(3);
                break;
            //4:
            //get list student by group_id, subject_id
            case 4:
                dd(4);
                break;
        }

        $majors = Major::query()
            ->pluck('name', 'id')
            ->toArray();

        $groups = Group::query()
            ->select('id')
            ->distinct()
            ->where([
                ['degree_id', $current_degree_id],
                ['major_id', $current_major_id],
            ]);

        $subjects = Subject::query()
            ->pluck('name', 'id')
            ->toArray();


        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

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
