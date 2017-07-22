<?php
require_once 'curlModel.php';

class App{

    /**
     * App constructor.
     */
    public function __construct()
    {

        if(isset($_POST['action'])){
            echo 12;


        }else{
            $loginHtml = file_get_contents("./web/login.html");

            echo $loginHtml;
        }

    }
}

new App();
