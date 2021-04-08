<?php
require __DIR__ . '/Curl.php';
require __DIR__ . '/config.php';
//查询配置文件

$req = array(
    'groupId' => '',//分组ID，可空
    'profileName' => '',//配置文件名称，可空
    'pageSize' => 1000,//每页返回结果数量
    'pageNum' => 1//当前查询页数
);

$curl = new Curl(API_URL . 'getProfileList');

$curl->setHeader(array('content-type:application/json'));
$curl->setPostMethod();
$curl->addPostData(json_encode($req));

$curl->send();

echo $curl->getBody();
