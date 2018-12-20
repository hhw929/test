<?php
/**
 * Created by PhpStorm.
 * User: yalin
 * Date: 2018/12/19
 * Time: 下午4:25
 */

namespace ImgServer;


class HttpBuild
{
    private $method = "GET";

    private $url = "";

    private $setHeader = [];

    private $returntransfer = 1;

    private $header = 0;


    /**
     * HttpBuild constructor.
     * @param array $array
     */
    public function __construct($array = [])
    {
        if (!empty($array)){
            $attributes = array_keys($array);
            foreach ($attributes as $value) {
                $this->$value = $array[$value];
            }
        }
    }

    /**
     * 发送方法
     * @return bool|mixed
     */
    public function sendRequest($data = []){
        // 1. 初始化
        $curl = curl_init();


        if ($this->method == "POST") {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        if (!empty($this->setHeader)){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->setHeader);
        }


        // 2. 设置选项，包括URL
        curl_setopt($curl,CURLOPT_URL,$this->url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,$this->returntransfer);
        curl_setopt($curl,CURLOPT_HEADER,$this->header);
        // 3. 执行并获取HTML文档内容
        $output = curl_exec($curl);
        if($output === FALSE ){
            return false;
        }
        // 4. 释放curl句柄
        curl_close($curl);
        return $output;
    }
}