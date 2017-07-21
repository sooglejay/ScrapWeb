<?php

class ScrapWeb
{
    /**
     * ScrapHandle constructor.
     */
    public function __construct()
    {
        if (isset($_POST) && isset($_POST['username'])) {
            $userName = $_POST['username'];
            $password = $_POST['password'];
            $html =  shell_exec("php cliScriptScrap.php $userName  $password");
        } else {
            echo "error";
        }
    }
}

$scrapWeb = new ScrapWeb();






