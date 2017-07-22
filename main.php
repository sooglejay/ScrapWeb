<?php
require_once 'curlModel.php';

/**
 * Created by PhpStorm.
 * User: jianwei
 * Date: 2017/7/22
 * Time: 下午2:00
 */
class MainApp
{
    public $userInfo;
    /**
     * main constructor.
     */
    public function __construct()
    {
        $this->doLogin();
    }

    public function doLogin()
    {
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        curlModel::getInstance()->doLogin($userName, $password);
        $this->userInfo = curlModel::getInstance()->getUserBasicInfo();
    }
}
$main = new MainApp();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页</title>
    <style type="text/css">
        body{
            background-color: #eeeeee;
        }
        .servicehead img{
            width:100%;
            height:36%;
        }
        .servicehead span{
            margin:-1rem 0 0 0 ;
            font-size:3.5rem;
            font-weight:bold;
        }
        .menulist div a{
            text-decoration: none;
        }
        .row{
            height:9rem;
            padding:8rem 0 0 0;
        }
        .row img{
            margin:0 0 0 15%;
        }
        .textone{
            font-size:2.6rem;
            margin:1% 3rem 0 7.9%;
        }
        .text2{
            margin:0 0 0 0.9%;
        }
        .text3{
            margin:0 0 0 0.4%;
        }
    </style>
    <script src="/ScrapWeb/lib/jquery.min.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<div class="servicehead">
    <img src="http://www.63si.com.cn:8000/lsapp_server/image/head.png" alt="head" style=""/>
</div>
<div class="menulist">
    <div class="row">
        <a href="basic.php">
            <img src="http://www.63si.com.cn:8000/lsapp_server/image/basicinfo.png"/>
        </a>
        <a href="insuredinfo.html">
            <img src="http://www.63si.com.cn:8000/lsapp_server/image/insureinfo.png"/>
        </a>
        <a href="medicalpay.html">
            <img src="http://www.63si.com.cn:8000/lsapp_server/image/medicalaccount.png"/>
        </a>
    </div>
    <div class="textone">
        <span class="text1">基本信息查询</span>
        <span class="text2">参保信息查询</span>
        <span class="text3">医保账户查询</span>
    </div>
    <div class="row">
        <a href="payinfoindex.html">
            <img src="http://www.63si.com.cn:8000/lsapp_server/image/payinfo.png"/>
        </a>
        <a href="treatmentindex.html">
            <img src="http://www.63si.com.cn:8000/lsapp_server/image/treatment.png"/>
        </a>
    </div>
    <div class="textone">
        <span class="text1">缴费信息查询</span>
        <span class="text2">待遇信息查询</span>
    </div>




</div>

</body>
<script>

</script>

</html>