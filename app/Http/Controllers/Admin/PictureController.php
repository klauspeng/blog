<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use App\Thirdpart\SmMs;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * 列表
     */
    public function getList()
    {
        // 分页
        $pictures = Picture::paginate(15);
        // var_dump($pictures);
        return view('picture.list', ['pictures' => $pictures]);
    }

    /**
     * 上传
     */
    public function upload(Request $request)
    {
        if ($request->isMethod('post')) {
            $pic    = $request->file('smfile');
            $upload = SmMs::upload($pic->getPathname());
            if (isset($upload['data'])) {
                $pic = new Picture($upload['data']);
                $pic->save();
            }
        }
        return view('picture.add');
    }

    /**
     * 删除
     */
    public function delete($id)
    {
        $data = [
            'code'    => 200,
            'message' => 'success'
        ];

        if ($id) {
            $delete = Picture::find($id);
            if ($delete) {
                SmMs::delete($delete->delete);
                $delete->delete();
            }
        }

        return response()->json($data);
    }
}
