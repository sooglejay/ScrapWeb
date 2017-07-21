<?php
class Login{

    private $notLoginHtml = <<<EOT
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
            <form class="form-horizontal" action='./login.php' method="POST">
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

                    <div class="control-group" style="margin-top: 12px">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success" id="btnLogin">Login</button>
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





EOT;

    /**
     * Login constructor.
     */
    public function __construct()
    {
        if(isset($_POST)&&isset($_POST['username'])){

        }else{
            echo $this->notLoginHtml;
        }
    }
    private function doLogin($username,$password){
        $curl = curl_init();
        $cookie_jar = tempnam('./tmp','cookie');
        curl_setopt($curl, CURLOPT_URL,'http://www.63si.com.cn:8000/lsapp_server/index.html');//这里写上处理登录的界面
        curl_setopt($curl, CURLOPT_POST, 1);
        $request = "loginid_type=tel&usertype=aac001&number=userlogin&username=$username&password=$password";
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request);//传递数据
        curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie_jar);// 把返回来的cookie信息保存在$cookie_jar文件中
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//设定返回 的数据是否自动显示
        curl_setopt($curl, CURLOPT_HEADER, false);//设定是否显示头信息
        curl_setopt($curl, CURLOPT_NOBODY, false);//设定是否输出页面内容
        curl_exec($curl);//返回结果
        curl_close($curl); //关闭

        $curl2 = curl_init();
        curl_setopt($curl2, CURLOPT_URL, 'http://www.63si.com.cn:8000/lsapp_server/wx/serviceindex.html');//登陆后要从哪个页面获取信息
        curl_setopt($curl2, CURLOPT_HEADER, false);
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl2, CURLOPT_COOKIEFILE, $cookie_jar);
        $content = curl_exec($curl2);

        echo $content;
    }
}

?>
