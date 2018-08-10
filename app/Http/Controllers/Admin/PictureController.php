<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Qiniu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * 列表
     */
    public function getList()
    {

    }

    /**
     * 上传
     */
    public function upload(Request $request)
    {
        if ($request->isMethod('post')) {
            $pic       = $request->file('picture');
            $qiniu     = new Qiniu();
            $uploadPic = $qiniu->upload($pic->getRealPath(), $pic->getClientOriginalName());

            return response()->json($uploadPic);
        }
        return view('picture');
    }

    /**
     * 删除
     */
    public function delete()
    {

    }
}
