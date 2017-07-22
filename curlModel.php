<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__) . '/../phpspider/core/init.php';

class curlModel
{
    /**
     * 静态成品变量 保存全局实例
     */
    private static $_instance = NULL;


    /**
     * 私有化默认构造方法，保证外界无法直接实例化
     */
    private function __construct()
    {
    }

    /**
     * 静态工厂方法，返还此类的唯一实例
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new curlModel();
        }
        return self::$_instance;
    }


    private $getAAC = "http://www.63si.com.cn:8000/lsapp_server/front/wxlogin/getAAC001";
    private $queryUserInfo = "http://www.63si.com.cn:8000/lsapp_server/front/wxquery/lssi";
    private $aac001 = null;
    private $loginUrl = "http://www.63si.com.cn:8000/lsapp_server/front/wxlogin/login";


    public function doLogin()
    {
        $str = file_get_contents('userInfo.txt');
        $userInfo = unserialize($str);
        $params = array(
            "loginid_type" => "tel",
            "usertype" => "aac001",
            "number" => "userlogin",
            "username" => $userInfo["userName"],
            "password" => $userInfo["password"]
        );
        requests::post($this->loginUrl, $params);

        // 此处要返回一个标志 告诉用户已经登录成功，可以去get一个网页，查看能否get到
        return true;

    }

    /**
     * 获取aac001
     * @return null
     */
    private function getAAC001(){
        try {
            if (is_null($this->aac001)) {
                $this->aac001 = json_decode(requests::get($this->getAAC), true)["aac001"];
            }
        } catch (Exception $e) {

            $this->aac001 = null;
        }
        if (is_null($this->aac001)) {
            return null;
        }
        return $this->aac001;
    }

    /**
     * 用户基本信息查询
     * @return mixed|null|string
     */
    public function getUserBasicInfo()
    {
        // first login
        $this->doLogin();
        if(is_null($this->getAAC001())){
            return null;
        }
        $startrow = 1;
        $endrow = 1;
        $number = "cdsi0000001";
        $userInfo =  requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number));
        return $userInfo;
    }

    /** 参保信息查询
     * @return mixed|null|string
     */
    public function getCanBaoInfo()
    {
        // first login
        $this->doLogin();
        if(is_null($this->getAAC001())){
            return null;
        }
        $startrow = 1;
        $endrow = 6;
        $number = "cdsi0000006";
        return requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number));
    }

    /***
     * 医保信息查询
     *  all、IncomeQuery、PayQuery are the same
     * @return mixed|string
     */
    public function getYiBaoInfo()
    {
        // first login
        $this->doLogin();
        if(is_null($this->getAAC001())){
            return null;
        }
        $startrow = 1;
        $endrow = 10000;
        $number = "cdsi0003007";
        $canBaoInfo = requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number));
        return $canBaoInfo;
    }


    /**
     * 养老缴费账单查询
     * @return mixed|null|string
     */
    public function getYangLaoInfo()
    {
        // first login
        $this->doLogin();
        if(is_null($this->getAAC001())){
            return null;
        }
        $startrow = 1;
        $endrow = 10000;
        $number = "cdsi0001003";
        $info = requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number));
        return $info;
    }

    /**
     * 基本医疗缴费查询
     * @return mixed|null|string
     */
    public function getBasicMedicalInfo()
    {
        // first login
        $this->doLogin();
        if(is_null($this->getAAC001())){
            return null;
        }
        $startrow = 1;
        $endrow = 10000;
        $number = "cdsi0003002";
        $info = requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number));
        return $info;
    }

    /**
     * 生育保险缴费查询
     * @return mixed|null|string
     */
    public function getMaternityInsInfo()
    {
        // first login
        $this->doLogin();
        if(is_null($this->getAAC001())){
            return null;
        }
        $startrow = 1;
        $endrow = 200;
        $number = "cdsi0005002";
        $info = requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number));
        return $info;
    }

    /**
     * 工伤保险缴费查询
     * @return mixed|null|string
     */
    public function getJobInjuryInfo()
    {
        // first login
        $this->doLogin();
        if(is_null($this->getAAC001())){
            return null;
        }
        $startrow = 1;
        $endrow = 10000;
        $number = "cdsi0004002";
        $info = requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number));
        return $info;
    }

    /**
     * 失业保险缴费查询
     * @return mixed|null|string
     */
    public function getLoseJobInfo()
    {
        // first login
        $this->doLogin();
        if(is_null($this->getAAC001())){
            return null;
        }
        $startrow = 1;
        $endrow = 10000;
        $number = "cdsi0002002";
        $info = requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number));
        return $info;
    }

    /**
     * 城居医疗缴费查询
     * @return mixed|null|string
     */
    public function getCityMedicalInfo()
    {
        // first login
        $this->doLogin();
        if(is_null($this->getAAC001())){
            return null;
        }
        $startrow = 1;
        $endrow = 200;
        $number = "cdsi0003014";
        $info = requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number));
        return $info;
    }

    /**
     * 补充医疗缴费查询
     * @return mixed|null|string
     */
    public function getSuperMedicalInfo()
    {
        // first login
        $this->doLogin();
        if(is_null($this->getAAC001())){
            return null;
        }
        $startrow = 1;
        $endrow = 200;
        $number = "cdsi0041002";
        $info = requests::get($this->queryUserInfo, array(
            "aac001" => $this->aac001,
            "startrow" => $startrow,
            "endrow" => $endrow,
            "number" => $number));
        return $info;
    }




}








