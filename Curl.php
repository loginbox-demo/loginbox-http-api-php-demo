<?php


class Curl
{
    protected  $url;
    protected $responseInfo = array();
    protected $body;
    protected $ch;

    public function __construct($url){
        $this->url = $url;
        $this->ch = curl_init($url);
        $this->init();
    }

    protected function init(){
        $this->setOpt(CURLOPT_RETURNTRANSFER, TRUE);
        $this->setOpt(CURLOPT_SSL_VERIFYPEER, FALSE);
        $this->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
    }

    public function setTimeout($timeout){
        $this->setOpt(CURLOPT_TIMEOUT, $timeout);
        return $this;
    }

    public function setReferer($referer){
        $this->setOpt(CURLOPT_REFERER, $referer);
        return $this;
    }

    /**
     * @param array $headers
     */
    public function setHeader($headers){
        $this->setOpt(CURLOPT_HTTPHEADER, $headers);
    }

    /**
     * curl_setopt — Set an option for a cURL transfer
     * @param $name
     * @param $value
     */
    public function setOpt($name, $value){
        curl_setopt($this->ch, $name, $value);
    }

    /**
     * curl_setopt_array — Set multiple options for a cURL transfer
     * @param array $array
     */
    public function setOptArray($array){
        curl_setopt_array($this->ch, $array);
    }

    public function setPostMethod(){
        curl_setopt($this->ch, CURLOPT_POST, 1);
    }

    public function addPostData($dataArray){
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $dataArray);
    }

    public function getBody(){
        return $this->body;
    }

    public function getStatus(){
        return $this->responseInfo['http_code'];
    }

    public function send(){
        //this function must be excuted before curl_getinfo();
        $this->body = curl_exec($this->ch);
        $this->responseInfo = curl_getinfo($this->ch);
    }


    public function __destruct(){
        curl_close($this->ch);
    }

    public function getInfo(){
        return $this->responseInfo;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}