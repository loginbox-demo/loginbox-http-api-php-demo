<?php
require __DIR__ . '/Curl.php';
require __DIR__ . '/config.php';
//查询配置文件

$req = array(
    'groupId' => '',//分组ID，可空
    'profileName' => '',//配置文件名称，可空
    'pageSize' => 10,//每页返回结果数量
    'pageNum' => 1//当前查询页数
);

$curl = new Curl(API_URL . 'profileList?'.http_build_query($req));


$curl->send();

echo $curl->getBody();
