<?php
require 'curlModel.php';

class WebController
{
    /**
     * Login constructor.
     */
    public function __construct()
    {
        if (isset($_POST) && isset($_POST["action"])) {
            $func = "do" . $_POST["action"];
            $this->$func();
        } else {
            // default to login
            $loginHtml = file_get_contents("./web/login.html");
            echo $loginHtml;
        }
    }

    private function doLogin()
    {
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        curlModel::getInstance()->doLogin($userName, $password);
        curlModel::getInstance()->getCanBaoInfo();
//        $curlHandler->getCanBaoInfo();

    }
}

new WebController();
?>
