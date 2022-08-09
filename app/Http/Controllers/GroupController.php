<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Models\Degree;
use App\Models\Group;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class GroupController extends Controller
{
    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this->model = (new Group())->query();
        $this->table = (new Group())->getTable();

        $routeName = Route::currentRouteName();
        $arr = explode('.',$routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model
            ->selectRaw('id,GROUP_CONCAT(subject_id) AS subject, degree_id, major_id')
            ->with([
                'degree',
                'major',
                ])
            ->groupBy([
                'id',
                'degree_id',
                'major_id',
                ])
            ->paginate(10);

        return view("admin.$this->table.index",[
            'data' => $data,
        ]);
    }

    public function create()
    {
        $subjects = Subject::query()->pluck('name','id')->toArray();
        $degrees = Degree::query()->pluck('name','id')->toArray();
        $majors = Major::query()->pluck('name','id')->toArray();

        return view("admin.$this->table.create", [
            'subjects' => $subjects,
            'degrees' => $degrees,
            'majors' => $majors,
        ]);
    }

    public function store(StoreGroupRequest $request)
    {
        $this->model -> create($request -> except('_token'));
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
