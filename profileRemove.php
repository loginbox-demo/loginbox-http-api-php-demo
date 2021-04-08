<?php
require __DIR__ . '/Curl.php';
require __DIR__ . '/config.php';
//删除配置文件

$req = array(
    'profileId' => '210408153106758377'
);

$curl = new Curl(API_URL . 'profileRemove');

$curl->setHeader(array('content-type:application/json'));
$curl->setPostMethod();
$curl->addPostData(json_encode($req));

$curl->send();

echo $curl->getBody();
