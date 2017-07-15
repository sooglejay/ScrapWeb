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
$driver->get('http://www.baidu.com/');
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

// submit the form
// close the Firefox
$driver->quit();
