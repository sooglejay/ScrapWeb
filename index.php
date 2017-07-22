<?php
require_once 'WebCurlModel.php';

class WebController
{
    private $curlHandler;

    /**
     * Login constructor.
     */
    public function __construct()
    {
        if (isset($_POST) && isset($_POST['username'])) {
            $userName = $_POST['username'];
            $password = $_POST['password'];
            $this->curlHandler = new WebCurlModel();
            $this->curlHandler->doLogin($userName, $password);
            $indexHtml = file_get_contents("./web/index.html");
            echo $indexHtml;
        } else {
            $loginHtml = file_get_contents("./web/login.html");
            echo $loginHtml;
        }
    }

    private function doLogin($username, $password)
    {

    }
}

new WebController();
?>
