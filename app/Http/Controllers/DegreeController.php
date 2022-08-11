<?php

namespace App\Http\Controllers;

use App\Http\Requests\Degree\StoreDegreeRequest;
use App\Models\Degree;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class DegreeController extends Controller
{
    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this->model = (new Degree())->query();
        $this->table = (new Degree())->getTable();
        $routeName=Route::currentRouteName();
        $arr = explode('.',$routeName);
        $arr=array_map('ucfirst', $arr);
        $title=implode(' - ',$arr);
        //dd($title);

        View::share('title', $title);
    }


    public function index()
    {
        $data = Degree::paginate(2);
        return view("admin.$this->table.index",[
           'data'=>$data,
        ]);
    }

    public function create()
    {
        $currentYear = date('Y');

        return view("admin.$this->table.create", [
            'currentYear' => $currentYear,
        ]);
    }

    public function store(StoreDegreeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->model->create($request->except('_token'));
        return redirect()
            ->route("$this->table.index")
            -> with('success','Đã thêm thành công');;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function edit(Degree $degree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDegreeRequest  $request
     * @param  \App\Models\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Degree $degree)
    {
        //
    }
}
