<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use Authenticatable;
    protected $guard = 'admin';
    protected $redirectTo = '/admin/';
    public function showLoginForm()
    {
        return view('adminlte::auth.login');
    }
    protected function guard()
    {
        return Auth::guard($this->guard);
    }
}
