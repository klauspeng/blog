<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('POST')){
            // todo 登录验证
            $username = $request->get('username');
            $password = $request->get('password');
            return redirect()->route('home');
        }

        return view('login');
    }

}
