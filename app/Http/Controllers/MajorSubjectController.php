<?php

namespace App\Http\Controllers;

use App\Models\MajorSubject;
use App\Http\Requests\StoreMajorSubjectRequest;
use App\Http\Requests\UpdateMajorSubjectRequest;
use Illuminate\Database\Eloquent\Builder;
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

    public function index()
    {

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
