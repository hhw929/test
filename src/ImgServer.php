<?php
/**
 * Created by PhpStorm.
 * User: yalin
 * Date: 2018/12/19
 * Time: 下午1:42
 */
namespace ImgServer;

class ImgServer
{

    private $http = null;

    public function __construct($appId, $secretKey, $imgServerUrl)
    {
        if (is_null($this->http)) {
            $this->http = new HttpBuild(["method" => "POST", "url" => $imgServerUrl, "setHeader" => ["APP_ID:" . $appId, "KEY:" . $secretKey]]);
        }
    }

    /**
     * 上传文件
     * @param $file string 需要上传的文件
     * @param $path string 上传到哪个目录
     * @param $name string 文件名称
     * @return bool|mixed
     */
    public function upload($file, $path, $name){
        $contents = file_get_contents($file);
        return $this->http->sendRequest(["file" => $contents, "path" => $path, "fileName" => $name, "type" => "upload"]);
    }

    /**
     * @param $fileName
     * @param $path
     */
    public function getFile($fileName, $path){

    }


}