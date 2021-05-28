<?php
require __DIR__ . '/Curl.php';
require __DIR__ . '/config.php';
//调用本接口会将指定环境的指纹信息随机生成新的指纹信息(navigator,硬件指纹，字体指纹，显卡型号，内网IP等)

$req = array(
    'profileId' => '210528155354781781',
    'cacheOp' => array(
        'cookie' => 0,//是否删除cookies及其他网站数据(1:是,0:否)
        'form' => 1,//是否删除保存的表单填充数据(1:是,0:否)
        'password' => 1,//是否删除保存的账号密码(1:是,0:否)
        'history' => 1,//是否删除浏览记录(1:是,0:否)
    )
);

$curl = new Curl(API_URL . 'profileRandomReset');

$curl->setHeader(array('content-type:application/json'));
$curl->setPostMethod();
$curl->addPostData(json_encode($req));

$curl->send();

echo $curl->getBody();
