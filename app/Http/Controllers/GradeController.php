<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\DegreeMajor;
use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Major;
use App\Models\MajorSubject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class GradeController extends Controller
{
    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this->model = (new Grade())->query();
        $this->table = (new Grade())->getTable();

        $routeName = Route::currentRouteName();
        $arr = explode(',', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $degrees = Degree::query()
                ->pluck('name', 'id');
        return view("admin.$this->table.index",[
            'degrees' => $degrees,
        ]);
    }

    public function apiFilter(Request $request){
        $step = (int) $request->data['step'];
        $data = [];
        //switch request->step
        switch ($step){
            case 1:
                //1: after pick degree :
                //get degree_id
                $degree_id = $request->data['degree_id'];
                //get arr major by degree_id
                $majors = DegreeMajor::query()
                        ->select('major_id')
                        ->with('major')
                        ->where('degree_id', $degree_id)
                        ->get();
                $data['majors'] = $majors;
                break;
            case 2:
                //2: after pick major
                //get major_id
                $major_id = $request->data['major_id'];
                //get arr subject by ( major)
                $subjects = MajorSubject::query()
                        ->select('subject_id')
                        ->with('subject')
                        ->where('major_id', $major_id)
                        ->get();
                $data['subjects'] = $subjects;
                break;
            case 3:
                //3: after pick subject
                $subject_id = $request->data['subject_id'];
                $degree_id = $request->data['degree_id'];
                $degree = Degree::query()
                            ->where('id', $degree_id)
                            ->first();

                //get arr semester_year by (subject in grades table)
                $semester_years = Grade::query()
                                ->select('semester_year')
                                ->distinct()
                                ->where('subject_id' , $subject_id)
                                ->whereYear('created_at', '<=', $degree->end_year)
                                ->whereYear('created_at', '>=', $degree->start_year)
                                ->get();
                $data['semester_years'] = $semester_years;
                break;
            case 4:
                //4: after pick semester
                //get arr groups by (semester, subject)
                break;
            case 5:
                //5: after pick group
                //get arr student grades by (subject_id)
                break;
        }

        return response()
            ->json([
                'success' => true,
                'data' => $data
            ]);
    }

    public function importGrade()
    {
        return view("admin.$this->table.importGrade");
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
     * @param  \App\Http\Requests\StoreGradeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGradeRequest  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
