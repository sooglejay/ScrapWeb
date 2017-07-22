<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__) . '/../phpspider/core/init.php';

class curlModel
{
    /**
     * 静态成品变量 保存全局实例
     */
    private static  $_instance = NULL;

    /**
     * 私有化默认构造方法，保证外界无法直接实例化
     */
    private function __construct() {
    }

    /**
     * 静态工厂方法，返还此类的唯一实例
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new curlModel();
        }
        return self::$_instance;
    }


    private $getAAC = "http://www.63si.com.cn:8000/lsapp_server/front/wxlogin/getAAC001";
    private $queryUserInfo = "http://www.63si.com.cn:8000/lsapp_server/front/wxquery/lssi";
    private $aac001 = null;
    private $loginUrl = "http://www.63si.com.cn:8000/lsapp_server/front/wxlogin/login";


    public function doLogin($userName = "18784502251", $password = "1")
    {
        $params = array(
            "loginid_type" => "tel",
            "usertype" => "aac001",
            "number" => "userlogin",
            "username" => $userName,
            "password" => $password
        );
        requests::post($this->loginUrl, $params);

        // 此处要返回一个标志 告诉用户已经登录成功，可以去get一个网页，查看能否get到

    }

    public function getUserBasicInfo()
    {

//1. 基本信息查询
// 首先获取aac001 的值
        try {
            if (is_null($this->aac001)) {
                $this->aac001 = json_decode(requests::get($this->getAAC), true)["aac001"];
            }
        } catch (Exception $e) {
            $this->aac001 = null;
        }
        if (is_null($this->aac001)) {
            echo "ERROR";
            return "Not Login!";
        } else {
            echo $this->aac001;
        }
        echo "\n";
// 然后就开始查询
        $startrow = 1;
        $endrow = 1;
        $number = "cdsi0000001";
        $userInfo = json_decode(requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number)), true);
        print_r($userInfo);
        return $userInfo;

    }

    public function getCanBaoInfo()
    {

//2. 参保信息查询
// 首先获取aac001 的值
        try {
            if (is_null($this->aac001)) {
                $this->aac001 = json_decode(requests::get($this->getAAC), true)["aac001"];
            }
        } catch (Exception $e) {
            $this->aac001 = null;
        }
        if (is_null($this->aac001)) {
            echo "ERROR";
            return "Not Login!";
        } else {
            echo $this->aac001;
        }
        echo "\n";
// 然后就开始查询
        $startrow = 1;
        $endrow = 6;
        $number = "cdsi0000006";
        $canBaoInfo = json_decode(requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number)), true);
        print_r($canBaoInfo);
        return $canBaoInfo;
    }

    /***
     *  all、IncomeQuery、PayQuery are the same
     * @return mixed|string
     */
    public function getYiBaoInfo()
    {

//2. 参保信息查询
// 首先获取aac001 的值
        try {
            if (is_null($this->aac001)) {
                $this->aac001 = json_decode(requests::get($this->getAAC), true)["aac001"];
            }
        } catch (Exception $e) {
            $this->aac001 = null;
        }
        if (is_null($this->aac001)) {
            echo "ERROR";
            return "Not Login!";
        } else {
            echo $this->aac001;
        }
        echo "\n";
// 然后就开始查询
        $startrow = 1;
        $endrow = 10000;
        $number = "cdsi0003007";
        $canBaoInfo = json_decode(requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number)), true);
        print_r($canBaoInfo);
        return $canBaoInfo;
    }
}








