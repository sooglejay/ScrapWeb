<?php
class ScarpWeb
{
    public $validateCodeImgLink;

    public function getValidateLinkFromScrap(){
        if(isset($_POST)&& isset($_POST['validateCodeImgLink'])){
            $this->validateCodeImgLink = $_POST['validateCodeImgLink'];
        }
    }
    /**
     * ScrapHandle constructor.
     */
    public function __construct()
    {
        $this->getValidateLinkFromScrap();
    }
}
$scrapWeb = new ScarpWeb();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link type="text/css" rel="stylesheet" href="lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="span12">
            <form class="form-horizontal" action='/index.php' method="POST">
                <fieldset>
                    <div id="legend">
                        <legend class="">登录</legend>
                    </div>
                    <div class="control-group">
                        <!-- Username -->
                        <label class="control-label" for="username">账号</label>
                        <div class="controls">
                            <input type="number" id="username" name="username" placeholder="请输入手机号"
                                   class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">密码</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="请输入密码"
                                   class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">验证码</label>
                        <div class="controls">
                            <input type="text" id="validateCode" name="validateCode" placeholder="请输入验证码"
                                   class="input-xlarge">
                            <img src="<?php $scrapWeb->validateCodeImgLink?>">
                        </div>
                    </div>

                    <div class="control-group" style="margin-top: 12px">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success">Login</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>

</body>
</html>



