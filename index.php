<?php
require_once 'curlModel.php';

class App{

    /**
     * App constructor.
     */
    public function __construct()
    {

        if(isset($_POST['action'])){
            $this->$_POST['action']();
        }else{
            $loginHtml = file_get_contents("./web/login.html");
            echo $loginHtml;
        }

    }
    public function doLogin(){
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        if(curlModel::getInstance()->doLogin($userName, $password)){
            $indexHtml = file_get_contents("./web/index.html");
            echo $indexHtml;
        }else{
            echo "Login Error!";
        }
    }
}

new App();
