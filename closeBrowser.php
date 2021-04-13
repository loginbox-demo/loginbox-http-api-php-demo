<?php
require __DIR__ . '/Curl.php';
require __DIR__ . '/config.php';

//关闭指定的环境
$req = array(
    'profileId' => '210406144528544013',//配置文件ID必传
);

$curl = new Curl(API_URL . 'closeBrowser');

$curl->setHeader(array('content-type:application/json'));
$curl->setPostMethod();
$curl->addPostData(json_encode($req));

$curl->send();

echo $curl->getBody();
