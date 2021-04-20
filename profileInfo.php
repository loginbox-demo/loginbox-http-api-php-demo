<?php
require __DIR__ . '/Curl.php';
require __DIR__ . '/config.php';
//查询配置文件

$req = array(
    'profileId' => '201125232530016240'
);

$curl = new Curl(API_URL . 'profileInfo?'.http_build_query($req));
$curl->send();
echo $curl->getBody();
