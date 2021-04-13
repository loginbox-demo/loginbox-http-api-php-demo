<?php
require __DIR__ . '/Curl.php';
require __DIR__ . '/config.php';

//可以通过本接口修改环境配置
//本接口字段和profileCreate接口参数相同，只需要传入需要修改的参数，不需要修改的参数不传即可。
$req = array(
    'model' => array(
        'profileId' => '210406144528544013',//配置文件ID必传
        'proxyHost' => '127.0.0.1',//如果指定了环境参数，则会进行修改，如果不传则继续使用之前的值
        'proxyPort' => '9000',
        'proxyFlag' => false,
        'proxyFetchFlag' => false
    ),
);

$curl = new Curl(API_URL . 'profileUpdate');

$curl->setHeader(array('content-type:application/json'));
$curl->setPostMethod();
$curl->addPostData(json_encode($req));

$curl->send();

echo $curl->getBody();
