<?php
require_once 'curlModel.php';

class WebController
{
    private $curlHandler;

    /**
     * Login constructor.
     */
    public function __construct()
    {
        if (isset($_POST["action"])) {
            $func = "do" . $_POST["action"];
            $this->$func();
            return;
        }

        // default to login
        $loginHtml = file_get_contents("./web/login.html");
        echo $loginHtml;

    }

    private function doLogin()
    {
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $this->curlHandler = new curlModel();
        $this->curlHandler->doLogin();
//        $indexHtml = file_get_contents("/ScrapWeb/web/index.html");
//        echo $indexHtml;
//        echo "1";
    }
}

new WebController();
?>
