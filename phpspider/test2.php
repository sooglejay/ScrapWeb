<?php
/**
 * Created by PhpStorm.
 * User: jianwei
 * Date: 2017/7/16
 * Time: 下午3:11
 */
ini_set("memory_limit", "1024M");
require dirname(__FILE__) . '/core/init.php';

class Test2
{

    public function doScrap()
    {
        // 登录请求url
        $login_url = "http://www.63si.com.cn:8888/lswtqt/toLogin.jhtml";
// 提交的参数
        $params = json_decode(file_get_contents('array.json'), true);
//        var_dump($params);
////// 发送登录请求
        requests::post($login_url, $params);
// 登录成功后本框架会把Cookie保存到www.waduanzi.com域名下，我们可以看看是否是已经收集到Cookie了
        $cookies = requests::get_cookies("www.63si.com");
        var_dump($cookies);  // 可以看到已经输出Cookie数组结构
//
// requests对象自动收集Cookie，访问这个域名下的URL会自动带上
// 接下来我们来访问一个需要登录后才能看到的页面
        $url = "http://www.63si.com.cn:8888/lswtqt/toUsercenter.jhtml";
        $html = requests::get($url);
        echo $html;     // 可以看到登录后的页面，非常棒👍

    }

    public function testOk()
    {
        // 登录请求url
        $login_url = "http://www.63si.com.cn:8000/lsapp_server/front/wxlogin/login";
// 提交的参数
        $params = array(
            "loginid_type" => "tel",
            "usertype" => "aac001",
            "number" => "userlogin",
            "username" => "18784502251",
            "password" => "1"
        );
// 发送登录请求
        requests::post($login_url, $params);
//// 登录成功后本框架会把Cookie保存到www.waduanzi.com域名下，我们可以看看是否是已经收集到Cookie了
//        $cookies = requests::get_cookies("www.waduanzi.com");
//        print_r($cookies);  // 可以看到已经输出Cookie数组结构

// requests对象自动收集Cookie，访问这个域名下的URL会自动带上
// 接下来我们来访问一个需要登录后才能看到的页面
        $url = "http://www.63si.com.cn:8000/lsapp_server/wx/insuredinfo.html";
        $html = requests::get($url);
        echo $html;     // 可以看到登录后的页面，非常棒👍

    }

    /**
     * Test2 constructor.
     */
    public function __construct()
    {
//        $this->doScrap();
        $this->testOk();
    }
}
new Test2();
