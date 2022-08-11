<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    private Builder $model;
    private string $table;

    public function __construct()
    {
        $this->model = (new Admin())->query();
        $this->table = (new Admin())->getTable();

        $routeName = Route::currentRouteName();
        $arr = explode('.',$routeName);
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
            'data' => $data
        ]);
    }

    public function create()
    {
        return view("admin.$this->table.create");
    }

    public function store(Request $request)
    {
        $hashed_random_password = Hash::make(Str::random(8));
        $admin = $this -> model -> create([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'password' => md5($hashed_random_password),
        ]);

        $email = str_replace(' ', '', $admin -> name) . $admin -> id . "_admin@gmail.com";

        $this -> model -> where('id', $admin -> id) -> update([
            'email' => $email,
        ]);

        return redirect()
            -> route("$this->table.index")
            -> with('success','Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
