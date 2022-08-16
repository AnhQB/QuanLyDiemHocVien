<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\DegreeMajor;
use App\Http\Requests\StoreDegreeMajorRequest;
use App\Http\Requests\UpdateDegreeMajorRequest;
use App\Models\Major;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class DegreeMajorController extends Controller
{

    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this->model = (new DegreeMajor())->query();
        $this->table = (new DegreeMajor())->getTable();

        $routeName = Route::currentRouteName();

        $arr = explode(',', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = $this->model
            ->with('degree')
            ->with('major')
            ->get();

        $degrees = Degree::query()->paginate(5);

        return view("admin.$this->table.index", [
            'data' => $data,
            'degrees' => $degrees,
        ]);
    }

    public function create(Request $request)
    {
        $degree_id = $request->degree_id;
        if($degree_id === null){
            $degree_id = Degree::query()->max('id');
        }

        $majors_added = $this->model->where('degree_id', $degree_id)
                        ->pluck('major_id')->toArray();

        $degrees = Degree::query()->pluck('name','id');
        $majors = Major::query()->whereNotIn('id', $majors_added)
            ->pluck('name', 'id');
        return view("admin.$this->table.create",[
            'degrees' => $degrees,
            'majors' => $majors,
            'degree_id' => $degree_id,
        ]);
    }

    public function store(Request $request)
    {
        $data = [];
        foreach($request->major_id as $item){
            $data[]= [
                'degree_id' => $request->degree_id,
                'major_id' => $item,
            ];
        }
        $this->model->insert($data);
        return redirect()
            ->route("$this->table.index")
            ->with('success','Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DegreeMajor  $degreeMajor
     * @return \Illuminate\Http\Response
     */
    public function show(DegreeMajor $degreeMajor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DegreeMajor  $degreeMajor
     * @return \Illuminate\Http\Response
     */
    public function edit(DegreeMajor $degreeMajor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDegreeMajorRequest  $request
     * @param  \App\Models\DegreeMajor  $degreeMajor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDegreeMajorRequest $request, DegreeMajor $degreeMajor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DegreeMajor  $degreeMajor
     * @return \Illuminate\Http\Response
     */
    public function destroy(DegreeMajor $degreeMajor)
    {
        //
    }
}
