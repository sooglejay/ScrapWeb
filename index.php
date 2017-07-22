<?php
require_once 'curlModel.php';

class App
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
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function actionHandler()
    {
        if (isset($_REQUEST['action'])) {
            $this->$_REQUEST['action']();
        } else {
            $loginHtml = file_get_contents("./web/login.html");
            echo $loginHtml;
        }
    }

    public function writeUserInfoToFile($userInfo)
    {
        $string = serialize($userInfo);
        $fn = "userInfo.txt";
        $fh = fopen($fn, 'w');
        fwrite($fh, $string);
        fclose($fh);
    }

    public function doLogin()
    {
        $userName = $_REQUEST['userName'];
        $password = $_REQUEST['password'];

        $userInfo = array("userName" => $userName, "password" => $password);
        $this->writeUserInfoToFile($userInfo);

        if (curlModel::getInstance()->doLogin()) {
            // login success
            $htmlStr = file_get_contents("./web/index.html");
            echo $htmlStr;
        } else {
            echo "Login Error!";
        }
    }
    public function doBasicInfoQueryAction()
    {
        $info = curlModel::getInstance()->getUserBasicInfo();
        echo $info;
    }
    public function doCanBaoInfoQueryAction()
    {
        $info = curlModel::getInstance()->getCanBaoInfo();
        echo $info;
    }
   public function doYiBaoInfoQueryAction()
    {
        $info = curlModel::getInstance()->getYiBaoInfo();
        echo  $info;
    }
   public function doYangLaoQueryAction()
    {
        $info = curlModel::getInstance()->getYangLaoInfo();
        echo  $info;
    }


}


App::getInstance()->actionHandler();