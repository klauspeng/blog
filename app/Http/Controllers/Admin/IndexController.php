<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/25
 * Time: 22:38
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\MenuService;

class IndexController extends Controller
{
    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tree = MenuService::getMenuTree();
        // dump($tree);
        return view('index');
    }
}