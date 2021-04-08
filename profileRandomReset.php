<?php
require __DIR__ . '/Curl.php';
require __DIR__ . '/config.php';
//调用本接口会将指定环境的指纹信息随机生成新的指纹信息(navigator,硬件指纹，字体指纹，显卡型号，内网IP等)

$req = array(
    'profileId' => '210109154430835001'
);

$curl = new Curl(API_URL . 'profileRandomReset');

$curl->setHeader(array('content-type:application/json'));
$curl->setPostMethod();
$curl->addPostData(json_encode($req));

$curl->send();

echo $curl->getBody();
