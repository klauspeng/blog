<?php
/**
 * Created by PhpStorm.
 * User: Liupeng
 * Date: 2018-08-09
 * Time: 11:38
 */

namespace App\Helpers;


use Qiniu\Auth;
use Qiniu\Config;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class Qiniu
{
    private $auth = null;
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

    }

    /**
     * 上传图片
     *
     * @param string $path 上传文件路径
     * @param string $name 文件名-key
     *
     * @return array
     */
    public function upload($path, $name)
    {
        if (!$name) {
            $name = time();
        }
        // 生成上传 Token
        $token = $this->auth->uploadToken($this->bucket);

        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();

        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $name, $path);

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

    /**
     * 删除附件
     *
     * @param string $key 上传时传的文件名
     *
     * @return array
     */
    public function delete($key)
    {
        $config        = new Config();
        $bucketManager = new BucketManager($this->auth, $config);

        $err = $bucketManager->delete($this->bucket, $key);
        if ($err) {
            return [
                'status' => FALSE,
                'msg'    => $err,
            ];
        }

        return [
            'status' => TRUE,
            'msg'    => '删除成功！',
        ];
    }
}