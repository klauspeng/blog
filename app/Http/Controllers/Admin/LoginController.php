<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    public function test()
    {
        // $route = Route::current();
        // dump($route);
        // dump(222);
        return view('child');
    }
}
