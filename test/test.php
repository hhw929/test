<?php
/**
 * Created by PhpStorm.
 * User: yalin
 * Date: 2018/12/19
 * Time: 下午5:38
 */
require_once '../vendor/autoload.php';

use ImgServer\ImgServer;

$img = "";//图片路劲



$server = new ImgServer("", "", "");

var_dump($server->upload($img, "upload", "b.jpg"));