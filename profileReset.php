<?php
require __DIR__ . '/Curl.php';
require __DIR__ . '/config.php';

//可以通过本接口重置浏览器环境（指纹、配置信息、所有浏览器数据），如果只是更改配置文件参数（比如代理IP），请使用update接口
//本接口字段和profileCreate接口参数相同。
//调用本接口会重置硬件指纹
//可以通过本接口修改指定的环境参数
$req = array(
    'model' => array(
        'profileId' => '210528155354781781',//配置文件ID必传
        'userAgent' => 'new user agent',//如果指定了环境参数，则会进行修改，如果不传则继续使用之前的值
        'proxyFlag' => false
    ),
    'cacheOp' => array(
        'cookie' => 0,//是否删除cookies及其他网站数据(1:是,0:否)
        'form' => 1,//是否删除保存的表单填充数据(1:是,0:否)
        'password' => 1,//是否删除保存的账号密码(1:是,0:否)
        'history' => 1,//是否删除浏览记录(1:是,0:否)
    )
);

$curl = new Curl(API_URL . 'profileReset');

$curl->setHeader(array('content-type:application/json'));
$curl->setPostMethod();
$curl->addPostData(json_encode($req));

$curl->send();

echo $curl->getBody();
