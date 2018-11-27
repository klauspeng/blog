<?php

/**
 * Desc : MenuService
 * User : liupeng21
 * Email: liupeng21@lenovo.com
 * Time : 2018-11-26 11:12
 */

namespace App\Services;

use Illuminate\Support\Facades\DB;

class MenuService
{

    /**
     * 获取菜单 组件
     * @return array
     */
    public static function getMenuTree()
    {
        $menus = DB::table('blog_menu')->where('status', 1)->get();
        return self::getTree($menus);
    }

    /**
     * 递归组装菜单数据
     * @param mixed $data 数组
     * @param int   $pid  菜单父级ID
     * @return array
     */
    private static function getTree($data, $pid = 0)
    {
        $tree = array();
        foreach ($data as $k => $v) {
            if ($v->pid == $pid) {
                $v->child = self::getTree($data, $v->id);
                $tree[]   = $v;
            }
        }
        return $tree;
    }
}