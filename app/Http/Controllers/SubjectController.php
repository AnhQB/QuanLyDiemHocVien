<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class SubjectController extends Controller
{
    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this -> model = (new Subject())->query();
        $this -> table = (new Subject())->getTable();

        $routeName=Route::currentRouteName();
        $arr = explode('.',$routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ',$arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model->paginate(10);
        return view("admin.$this->table.index",[
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view("admin.$this->table.create");
    }

    public function store(StoreSubjectRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->model->create($request->except('_token'));
        return redirect()
            ->route("$this->table.index")
            -> with('success','Đã thêm thành công');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
