<?php
require_once 'curlModel.php';

/**
 * Created by PhpStorm.
 * User: jianwei
 * Date: 2017/7/22
 * Time: 下午2:00
 */
class BasicInfoApp
{
    public $userInfo;
//var IDNo = data.output.resultset[0].aac002;
//var name = data.output.resultset[0].aac003;
//var sex = data.output.resultset[0].aac004;
//var phoneNo = data.output.resultset[0].aae005;
//var birthtime = data.output.resultset[0].aac006;
//var worktime = data.output.resultset[0].aac007;
//var zhuzhi = data.output.resultset[0].aae006;
//var postcode = data.output.resultset[0].aae007;
//var bankNo = data.output.resultset[0].aae010;
//var accountName = data.output.resultset[0].aae009;
//var banktype = data.output.resultset[0].aaf002;

    /**
     * main constructor.
     */
    public function __construct()
    {

        $this->getBasicInfo();
    }

    public function getBasicInfo()
    {
        $this->userInfo = curlModel::getInstance()->getUserBasicInfo()["output"]["resultset"][0];
    }
}
$main = new BasicInfoApp();
?>

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
        <tr><td>身份证号:</td><td><?php $main->userInfo["aac002"]?></td></tr>
        <tr><td>姓名:</td><td><?php $main->userInfo["aac003"]?></td></tr>
        <tr><td>性别:</td><td><?php $main->userInfo["aac004"]?></td></tr>
        <tr><td>电话:</td><td><?php $main->userInfo["aac005"]?></td></tr>
        <tr><td>出生时间:</td><td><?php $main->userInfo["aac006"]?></td></tr>
        <tr><td>参工时间:</td><td><?php $main->userInfo["aac007"]?></td></tr>
        <tr><td>住址:</td><td><?php $main->userInfo["aae006"]?></td></tr>
        <tr><td>户名:</td><td><?php $main->userInfo["aae009"]?></td></tr>
        <tr><td>银行类别:</td><td><?php $main->userInfo["aaf002"]?></td></tr>
        <tr><td>银行卡号:</td><td><?php $main->userInfo["aae010"]?></td></tr>
        <tr><td>邮编:</td><td><?php $main->userInfo["aae007"]?></td></tr>
    </table>
</div>

<script type="text/javascript" src="/ScrapWeb/lib/jquery.min.js"></script>
<script type="text/javascript" src="/ScrapWeb/lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>
</html>
