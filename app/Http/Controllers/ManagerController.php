<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Models\Manager;
use App\Http\Requests\Manager\StoreManagerRequest;
use App\Http\Requests\Manager\UpdateManagerRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ManagerController extends Controller
{
    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this->model = (new Manager())->query();
        $this->table = (new Manager())->getTable();

        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);

        $genderNameVI = GenderEnum::getArrayGender();

        View::share('title', $title);
        View::share('genderNameVI', $genderNameVI);
    }


    public function index()
    {
        $data = $this->model->paginate(10);

        return view("admin.$this->table.index", [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view("admin.$this->table.create");
    }

    public function store(StoreManagerRequest $request)
    {
        $manager = new Manager();
        $hashed_random_password = Hash::make(Str::random(8));
        $manager = $this -> model -> create([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => md5($hashed_random_password),
        ]);

        $email = str_replace(' ', '', $manager -> name) . $manager -> id . "_manager@gmail.com";

        $this -> model -> where('id', $manager -> id) -> update([
            'email' => $email,
        ]);

        return redirect()
            -> route("$this->table.index")
            -> with('success','Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateManagerRequest  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManagerRequest $request, Manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        //
    }
}
