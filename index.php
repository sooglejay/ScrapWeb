<?php
class LoginApp
{
}
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

    <form class="form-horizontal" action="main.php" method="post">
        <div class="control-group">
            <label class="control-label" for="userName">用户名</label>
            <div class="controls">
                <input type="text" id="userName" name="userName" placeholder="请输入手机号码">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">密码</label>
            <div class="controls">
                <input type="password" id="password"  name="password" placeholder="请输入密码">
            </div>
        </div>
        <div class="control-group" style="margin-top: 12px">
            <div class="controls">
                <button type="submit" class="btn btn-success" >登录</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="/ScrapWeb/lib/jquery.min.js"></script>
<script type="text/javascript" src="/ScrapWeb/lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>
</html>
