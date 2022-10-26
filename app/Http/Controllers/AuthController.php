<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Manager;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast\Object_;

class AuthController extends Controller
{
    public function login(){
        if(session()->has('level')){
            return back();
        }
        return view("login");
    }

    public function processLogin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $email = $request->email;
        $password = $request->password;

        //"_admin@gmail.com" - _manager@gmail.com
        $emailAdmin = "_admin@gmail.com";
        $emailManager = "_manager@gmail.com";

        // $offsetAd = strlen($email) - strlen($emailAdmin);
        // $offsetManager = strlen($email) - strlen($emailManager);
        $offsetAd = strpos($email, $emailAdmin);
        $offsetManager = strpos($email, $emailManager);
        if(strpos($email, $emailAdmin, $offsetAd-1) !== false){
            $level = 2; // is admin
        }elseif (strpos($email, $emailManager, $offsetManager-1) !== false){
            $level = 1; //is manager
        }else{
            $level = 0; //is student
        }

        try {
            $account = null;
            $error = 1;
            switch ($level){
                case 0://student
                    $account = Student::query()
                        ->where([
                            ['email', $email],
                        ])
                        ->firstOrFail();
                    break;
                case 1: //manager
                    $account = Manager::query()
                        ->where([
                            ['email', $email],
                        ])
                        ->firstOrFail();
                    break;
                case 2: //admin
                    $account = Admin::query()
                        ->where([
                            ['email', $email],
                        ])
                        ->firstOrFail();

            }
            if(strlen($password) !== 60 && !preg_match('/^\$2y\$/', $password )){
                if(Hash::check($password, $account->password)){
                    $error = 0;
                }
            }

            if($error !== 0){
                return redirect()
                    ->route('login')
                    ->with([
                        'error' => 'Mật khẩu không chính xác',
                        'email' => $email
                    ]);
            }

            session()->put('id', $account->id);
            session()->put('name', $account->name);
            session()->put('level', $level);
        }catch (\Exception $e){
            return redirect()
                ->route('login')
                ->with([
                    'error' => 'Tài khoản không tồn tại mà',
                    'email' => $email
                ]);
        }
        return redirect()
            ->route('home');
    }

    public function logout(){
        session()->invalidate();
        return redirect()
            ->route('login');
    }
}
