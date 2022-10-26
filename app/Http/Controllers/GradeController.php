<?php

namespace App\Http\Controllers;

use App\Enums\StatusGradeEnum;
use App\Imports\GradesImport;
use App\Models\Degree;
use App\Models\DegreeMajor;
use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Group;
use App\Models\Major;
use App\Models\MajorSubject;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\Array_;

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
                $degree_id = $request->data['degree_id'];
                $major_id = $request->data['major_id'];
                $subject_id = $request->data['subject_id'];
                $semester_year = $request->data['semester_year'];
                //get arr groups by (semester, subject)
                $groups = Group::query()
                        ->select('id')
                        ->where([
                            ['degree_id', $degree_id],
                            ['major_id', $major_id],
                            ['subject_id', $subject_id],
                            ['semester_year', $semester_year],
                        ])
                        ->get();
                $data['groups'] = $groups;
                break;
            case 5:
                //5: after pick group
                $degree_id = $request->data['degree_id'];
                $major_id = $request->data['major_id'];
                $subject_id = $request->data['subject_id'];
                $semester_year = $request->data['semester_year'];
                $group_id = $request->data['group_id'];
                //get arr student grades by (subject_id, semester_year in grades)
                $listStudentInGroup = StudentGroup::query()
                                    ->select('student_id')
                                    ->where([
                                        ['group_id', $group_id],
                                        ['subject_id', $subject_id],
                                    ])
                                    ->get();

                $list = $this->model
                    ->selectRaw("grades.student_id, GROUP_CONCAT(grades.status SEPARATOR '-') AS status, GROUP_CONCAT(grade SEPARATOR ' | ') AS grade")
                        ->with(['student' => function ($query) use ($major_id, $degree_id) {
                            $query->where([
                               ['major_id', $major_id],
                               ['degree_id', $degree_id],
                            ]);
                        }])
                        ->where([
                            ['subject_id', $subject_id],
                            ['semester_year', $semester_year],
                        ])
                        ->whereIn('student_id', $listStudentInGroup)
                        ->groupBy([
                            'grades.student_id',
                        ])
                        ->get();

                $statusGradeName = StatusGradeEnum::getArrayStatus();

                $data['listStudent'] = $list;
                $data['statusGradeName'] = $statusGradeName;
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

    public function storeCSV(Request $request)
    {
        $file = $request -> file('file');
        $fileName = $file -> getClientOriginalName();
        $import = (new GradesImport()) -> fromFileName($fileName);

        try {
            Excel::import($import, $file);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'data' => $exception->getMessage(),
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'message' => 'Đã thêm file csv thành công',
                'listStudent' => $import -> getDataImported()
            ],
        ]);

    }


    public function viewStudentGrade(Request $request)
    {
        //request include: id student
        //check id in session is student or not
        if(Student::query()
            ->where(
                'id', session()->get('id')
            )
            ->exists()
        ){
        //if student exist: check id(request) != id(session) return back
            if($request->id != session()->get('id')){
                return back();
            }
        }

        $student_id = $request->id;
        //else get data grade
        $semester_years = $this->model
            ->select('semester_year')
            ->distinct()
            ->where('student_id', $student_id)
            ->pluck('semester_year', 'semester_year')
            ->toArray();

        $semester_year = end($semester_years);
        $data_grades = $this->model
            ->select('subject_id')
            ->distinct()
            ->with('subject')
            ->where([
                ['student_id', $student_id],
                ['semester_year', $semester_year],
            ])
            ->get();
        $data_average = [];
        foreach ($data_grades as $index => $subject){
            $subject_id = $subject -> subject_id;

            $grades = (new Grade())->query()
                ->select(['exam_type', 'grade', 'time', 'status'])
                ->where([
                    ['student_id', $student_id],
                    ['subject_id', $subject_id],
                    ['semester_year', $semester_year],
                    ['grade', '!=', null],
                ])
                ->get()
                ->toArray();
            $data_grades[$index][$subject_id] = $grades;


            if(count($grades) === 1){
                if(reset($grades)['grade'] < 5){
                    $data_average[$subject_id]['status'] = "NOT PASSED";
                }else{
                    $data_average[$subject_id]['status'] = "PASSED";
                }
                $data_average[$subject_id]['average'] = reset($grades)['grade'];
            }else{
                $fe = 0;
                $pe = 0;
                $status = '';
                foreach ($grades as $grade){
                    if($grade['exam_type'] ===  1){
                       $fe = $grade['grade'] * 60 / 100;
                    }else{
                        $pe = $grade['grade'] * 40 / 100;
                        if($grade['grade'] < 5){
                            $status = "NOT PASSED";
                        }
                    }
                }
                $average = $fe + $pe;
                if($status != "NOT PASSED"){
                    if($average >= 5){
                        $status = "PASSED";
                    }else{
                        $status = "NOT PASSED";
                    }
                }
                $data_average[$subject_id]['average'] = $average;
                $data_average[$subject_id]['status'] = $status;
            }
        }

        //$item[$item->subject_id] lay diem
        return view('student_grade',[
            'semester_years' => $semester_years,
            'data_grades' => $data_grades,
            'current_semester' => $semester_year,
            'data_average' => $data_average,
        ]);
    }
    //

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
