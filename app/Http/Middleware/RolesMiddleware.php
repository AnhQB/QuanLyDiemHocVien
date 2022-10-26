<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolesMiddleware
{
    private function checkRole($role): bool
    {
        switch ($role){
            case 'student':
                if(session()->get('level') === 0){
                    return true;
                }
                break;
            case 'manager':
                if(session()->get('level') === 1){
                    return true;
                }
                break;
            case 'admin':
                if(session()->get('level') === 2){
                    return true;
                }
                break;
        }
        return false;
    }

    public function handle(Request $request, Closure $next, ...$roles)
    {
        foreach($roles as $role){
            if($this->checkRole($role)){
                return $next($request);
            }
        }
        return back()
        -> with('error','Bạn không có quyền truy cập vào đây');
        // \Redirect::back()->with('error', 'Bạn không có quyền truy cập vào đây');
    }
}
