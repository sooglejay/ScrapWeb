<?php
// An example of using php-webdriver.
namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

class ScrapHandle
{
    private $userName;
    private $password;
    private $validateCode;
    public $validateElem;

    private $loginURL = 'http://www.63si.com.cn:8888/lswtqt/toLogin.jhtml';
    private $host = 'http://localhost:4444/wd/hub'; // this is the default
    private $capabilities;
    private $webDriver;
    private $timeOut = 5000;

    private function initWebDriver()
    {
        $this->capabilities= DesiredCapabilities::chrome();
        $this->webDriver = RemoteWebDriver::create($this->host, $this->capabilities, $this->timeOut);
        $this->webDriver->get($this->loginURL);
        $this->webDriver->manage()->deleteAllCookies();
        $cookie = new Cookie('cookie_name', 'cookie_value');
        $this->webDriver->manage()->addCookie($cookie);
    }

    private function getValidateCode()
    {
        $validateCode = null;
        try {
            $this->validateElem = $this->webDriver->findElement(WebDriverBy::id('codeimg'));
        } catch (\Exception $e) {
        } finally {
            if (!is_null($this->validateElem)) {
                $validateCode = $this->validateElem->getText();
            }
        }
        return $validateCode;
    }

    /**
     * ScrapHandle constructor.
     */
    public function __construct()
    {
        $this->initWebDriver();
        $this->getValidateCode();

    }

    private function isGetValidateCodeFromServer()
    {
        if (isset($_POST) && isset($_POST["mock"])) {
            echo 123;
            return true;
        }
        return false;
    }

    private function doLogin()
    {
        if (isset($_POST)) {
            if (isset($_POST["username"])) {
                $this->userName = $_POST["username"];
            }
            if (isset($_POST["password"])) {
                $this->userName = $_POST["password"];
            }
            if (isset($_POST["validateCode"])) {
                $this->userName = $_POST["validateCode"];
            }
        }
        $this->initWebDriver();
    }
}
$handler = new ScrapHandle();

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
                            <img src="<?php $handler->?>">
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




