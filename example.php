<?php
// An example of using php-webdriver.
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
require_once('vendor/autoload.php');
// start Firefox with 5 second timeout
$host = 'http://localhost:4444/wd/hub'; // this is the default
//System.setProperty("webdriver.chrome.driver", "/Users/jianwei/Downloads/chromedriver");
$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities, 5000);
// navigate to 'http://www.baidu.com/'
$driver->get('http://www.63si.com.cn:8888/lswtqt/toLogin.jhtml');
// adding cookie
$driver->manage()->deleteAllCookies();
$cookie = new Cookie('cookie_name', 'cookie_value');
$driver->manage()->addCookie($cookie);
$cookies = $driver->manage()->getCookies();
print_r($cookies);
// wait until the page is loaded
// print the title of the current page
echo "The title is '" . $driver->getTitle() . "'\n";
// print the URI of the current page
echo "The current URI is '" . $driver->getCurrentURL() . "'\n";
$isLogin = false;
$userNameElem = null;
$passwordElem = null;
try{
    $userNameElem = $driver->findElement(WebDriverBy::id('username'));
    $passwordElem = $driver->findElement(WebDriverBy::id('password'));
}catch (\Exception $e){
    $isLogin = true;
}
finally{
    if($isLogin){
        echo "Logined!";
    }else{
        $headerText = $userNameElem->getText();
        $passwordText = $passwordElem->getText();
        echo "No Logined!--".$headerText." -- ".$passwordText;
    }
}
// $element will be instance of RemoteWebElement

// submit the form
// close the Firefox
//$driver->quit();
