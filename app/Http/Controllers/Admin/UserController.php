<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function login()
    {
        // $route = Route::current();
        // dump($route);
        // dump(222);
        return view('login');
    }

}
