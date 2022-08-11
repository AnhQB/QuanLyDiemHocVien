<?php

namespace App\Http\Controllers;

use App\Http\Requests\Major\StoreMajorRequest;
use App\Http\Requests\Major\UpdateMajorRequest;
use App\Models\Major;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class MajorController extends Controller
{
    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this->model = (new Major())->query();
        $this->table = (new Major())->getTable();

        $routename = Route::currentRouteName();
        $arr = explode('.', $routename);
        $arr = array_map('ucfirst',$arr);
        $title = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model
                ->paginate(5);
        return view("admin.$this->table.index",[
            'data'=>$data
        ]);
    }

    public function create()
    {
        return view("admin.$this->table.create");
    }


    public function store(StoreMajorRequest $request)
    {
        $this->model->create($request->except('_token'));
        return redirect()
            ->route("$this->table.index")
            -> with('success','Đã thêm thành công');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMajorRequest  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMajorRequest $request, Major $major)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        //
    }
}
