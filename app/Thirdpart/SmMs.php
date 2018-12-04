<?php

/**
 * Desc : SmMs
 * User : liupeng21
 * Email: liupeng21@lenovo.com
 * Time : 2018-12-04 14:23
 */

namespace App\Thirdpart;

use GuzzleHttp\Client;

class SmMs
{
    private static $uploadUrl = 'https://sm.ms/api/upload';

    /**
     * 上传图片
     * @param resource $file
     * @param bool     $isSsl  是否强制https,默认否
     * @param string   $format 返回格式，默认json
     * @return mixed
     */
    public static function upload($file, $isSsl = FALSE, $format = 'json')
    {
        if (!is_file($file))
            return FALSE;

        $client    = new Client();
        $uploadRes = $client->post(self::$uploadUrl, [
            'multipart' => [
                [
                    'name'     => 'smfile',
                    'contents' => fopen($file, 'r')
                ],
                [
                    'name'     => 'ssl',
                    'contents' => $isSsl
                ],
                [
                    'name'     => 'format',
                    'contents' => $format
                ],
            ]
        ]);
        return json_decode($uploadRes->getBody(), TRUE);
    }


    /**
     * 删除
     * @param string $deleteUrl 删除链接
     * @return bool|mixed
     */
    public static function delete($deleteUrl)
    {
        if ($deleteUrl) {
            $client = new Client();
            $client->get($deleteUrl);
        }

        return TRUE;
    }
}