<?php
/**
 * Created by PhpStorm.
 * User: Liupeng
 * Date: 2018-08-09
 * Time: 11:38
 */

namespace App\Helpers;


use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Qiniu
{
    private $auth = null;
    private $uploadMgr = null;
    private $bucket = null;

    /**
     * Qiniu constructor.
     */
    public function __construct()
    {
        $accessKey = env('QINIU_ACCESS_KEY', '');
        $secretKey = env('QINIU_SECRET_KEY', '');
        $bucket    = env('QINIU_BUCKET', '');

        if (!$accessKey || !$accessKey) {
            throw new \Exception('未设置七牛参数，请联系管理员！');
        }
        // 构建鉴权对象
        $this->auth = new Auth($accessKey, $secretKey);

        $this->bucket = $bucket;

        // 初始化 UploadManager 对象并进行文件的上传。
        $this->uploadMgr = new UploadManager();
    }

    public function upload($path, $name)
    {
        if (!$name) {
            $name = time();
        }
        // 生成上传 Token
        $token = $this->auth->uploadToken($this->bucket);

        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $this->uploadMgr->putFile($token, $name, $path);

        if ($err) {
            return [
                'status' => FALSE,
                'msg'    => $err,
            ];
        }

        return [
            'status' => TRUE,
            'msg'    => env('QINIU_DOMAIN', '') . $name,
        ];
    }
}