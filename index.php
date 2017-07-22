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
            $indexHtml = file_get_contents("./web/index.html");
            echo $indexHtml;
        } else {
            echo "Login Error!";
        }
    }

    public function doBasicInfoQuery()
    {
        $userInfo = curlModel::getInstance()->getUserBasicInfo()["output"]["resultset"][0];

        $header = <<<ET
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Bootstrap 101 Template</title>
                <link type="text/css" rel="stylesheet" href="/ScrapWeb/lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
            </head>
            <body>
            
            <div class="container">
                <table class="table">
                    <caption><span>个人基本信息</span></caption>
ET;

        $footer = <<<ET
                </table>
            </div>

                <script type="text/javascript" src="/ScrapWeb/lib/jquery.min.js"></script>
                <script type="text/javascript" src="/ScrapWeb/lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
            </body>
            </html>
ET;
        $response = "<tr><td>身份证号:</td><td>" . $userInfo['aac002'] . "</td></tr>" .
            "<tr><td>姓名:</td><td> " . $userInfo['aac003'] . "</td></tr>" .
            "<tr><td>性别:</td><td> " . $userInfo['aac004'] . "</td></tr>" .
            "<tr><td>电话:</td><td> " . $userInfo['aae005'] . "</td></tr>" .
            "<tr><td>出生时间:</td><td> " . $userInfo['aac006'] . "</td></tr>" .
            "<tr><td>参工时间:</td><td> " . $userInfo['aac007'] . "</td></tr>" .
            "<tr><td>住址:</td><td> " . $userInfo['aae006'] . "</td></tr>" .
            "<tr><td>户名:</td><td> " . $userInfo['aae009'] . "</td></tr>" .
            "<tr><td>银行类别:</td><td> " . $userInfo['aaf002'] . "</td></tr>" .
            "<tr><td>银行卡号:</td><td> " . $userInfo['aae010'] . "</td></tr>" .
            "<tr><td>邮编:</td><td> " . $userInfo['aae007'] . "</td></tr>";
        $response = $header . $response . $footer;
        echo $response;
    }


    public function doCanBaoInfoQuery()
    {
        $canBaoInfo = curlModel::getInstance()->getCanBaoInfo()['output']['resultset'];
        $header = <<<ET
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Bootstrap 101 Template</title>
                <link type="text/css" rel="stylesheet" href="/ScrapWeb/lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
            </head>
            <body>
            
            <div class="container">
                <table class="table">
                    <caption><span>参保信息查询</span></caption>
                    <tr>
                        <th>险种类型</th>
                        <th>缴费期号</th>
                        <th>参保状态</th>
                        <th>参保单位</th>
                        <th>缴费月数</th>
                    </tr>
ET;

        $footer = <<<ET
                </table>
            </div>

                <script type="text/javascript" src="/ScrapWeb/lib/jquery.min.js"></script>
                <script type="text/javascript" src="/ScrapWeb/lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
            </body>
            </html>
ET;

        $response = "";
        foreach ($canBaoInfo as $item) {
            $itemStr = "<tr>
                         <td> " . $item['aae140'] . "</td>
                         <td> " . $item['yac033'] . "</td>
                         <td> " . $item['aac031'] . "</td>
                         <td> " . $item['aab004'] . "</td>
                         <td> " . $item['jfys'] . "</td>
                     </tr>";
            $response .= $itemStr;
        }
        $response = $header . $response . $footer;
        echo $response;
    }


}


App::getInstance()->actionHandler();