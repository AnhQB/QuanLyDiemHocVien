<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\DegreeMajor;
use App\Models\Major;
use App\Models\MajorSubject;
use App\Http\Requests\StoreMajorSubjectRequest;
use App\Http\Requests\UpdateMajorSubjectRequest;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class MajorSubjectController extends Controller
{
    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this->model = (new MajorSubject())->query();


        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $this->table = $arr[0];
        $title = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index(Request $request)
    {
        $degree_id = $request->degree_id;
        $major_id = $request->major_id;
        if($degree_id === null || $major_id === null){
            $degree_id = Degree::query()->max('id');
            $major_id = Major::query()->max('id');
        }

        $degrees = Degree::query()->pluck('name', 'id');
        //get
        $majorIds_follow_degreeId = DegreeMajor::query()
                                    ->where('degree_id', $degree_id)
                                    ->pluck('major_id')
                                    ->toArray();

        $majors = Major::query()
                ->whereIn('id', $majorIds_follow_degreeId)
                ->pluck('name', 'id')
                ->toArray();

        if(in_array($major_id, $majorIds_follow_degreeId) === false){
            $major_id = end($majorIds_follow_degreeId);
        }

        $currentDegree = Degree::query()->where('id', $degree_id)->first();
        $currentMajor = Major::query()->where('id', $major_id)->first();

        $subject_added = $this->model
                        ->where('major_id', $major_id)
                        ->pluck('subject_id')->toArray();

        $subjects = Subject::query()
                    ->whereNotIn('id', $subject_added)
                    ->pluck('name', 'id');

        $data = $this->model
                ->with('subject')
                ->select('subject_id','semester_major')
                ->where('major_id', $major_id)
                ->paginate(10)
                ;

        return view("admin.$this->table.index",[
            'degrees' => $degrees,
            'majors' => $majors,
            'subjects' => $subjects,
            'currentDegree' => $currentDegree,
            'currentMajor' => $currentMajor,
            'data' => $data,
        ]);
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
     * @param  \App\Http\Requests\StoreMajorSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMajorSubjectRequest $request)
    {
        //
    }

    public function show( $majorSubject)
    {
        $data = $this->model
                ->where('major_id',$majorSubject)
                ->get();

        return view("admin.$this->table.show", [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MajorSubject  $majorSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(MajorSubject $majorSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMajorSubjectRequest  $request
     * @param  \App\Models\MajorSubject  $majorSubject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMajorSubjectRequest $request, MajorSubject $majorSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MajorSubject  $majorSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(MajorSubject $majorSubject)
    {
        //
    }
}
