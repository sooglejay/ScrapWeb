<?php
require dirname(__FILE__) . '/../Communication/ComHandler.php';

/**
 * Created by PhpStorm.
 * User: jianwei
 * Date: 2017/7/16
 * Time: 下午2:52
 */
class Test
{
    private $html = <<< EOT


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=8; IE=9; IE=10">
</head>
<body>
<input type="hidden" value="" id="netysku">
<link rel="stylesheet" href="http://www.63si.com.cn:8888/lswtqt/resource/sys/plugins/validform/css/validform.css">
<link rel="stylesheet" href="http://www.63si.com.cn:8888/lswtqt/resource/sys/plugins/fancybox/new.fancybox.css">
<script type="text/javascript" src="http://www.63si.com.cn:8888/lswtqt/resource/sys/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript"
        src="http://www.63si.com.cn:8888/lswtqt/resource/sys/plugins/date/WdatePicker.js"></script>
<script>
    /**
     * 浏览器支持
     * @module jqueryExt
     * @depends jquery
     */
    jQuery.browser = {};
    jQuery.browser.mozilla = /firefox/.test(navigator.userAgent.toLowerCase());
    jQuery.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
    jQuery.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
    jQuery.browser.msie11 = /rv:11.0/.test(navigator.userAgent.toLowerCase());
    jQuery.browser.msie = /msie/.test(navigator.userAgent.toLowerCase()) || jQuery.browser.msie11;


    /**
     * Created by Administrator on 2016/3/30.
     */
    var Netof = new Object();
    var rootpath = "http://www.63si.com.cn:8888/lswtqt";
    var BasePath = "http://www.63si.com.cn:8888/lswtqt/resource/sys";
    var resPath = "http://www.63si.com.cn:8888/lswtqt/resource/ls";
</script>
<script src="http://www.63si.com.cn:8888/lswtqt/resource/sys/js/wtall.min.js"></script>
<!-- 上传 -->
<script type="text/javascript"
        src="http://www.63si.com.cn:8888/lswtqt/resource/sys/plugins/plupload/plupload.full.min.js"></script>
<!-- 登录弹框 -->
<script src="http://www.63si.com.cn:8888/lswtqt/resource/ls/js/login_window.js" type="text/javascript"></script>
<!-- 公共方法 -->
<script src="http://www.63si.com.cn:8888/lswtqt/resource/ls/js/common.js" type="text/javascript"></script>
<!-- 数据校验公共方法 -->
<script src="http://www.63si.com.cn:8888/lswtqt/resource/ls/js/validate.js" type="text/javascript"></script>
<!-- css皮肤 -->
<link rel="stylesheet" href="http://www.63si.com.cn:8888/lswtqt/resource/ls/skin/base.css">
<link rel="stylesheet" href="http://www.63si.com.cn:8888/lswtqt/resource/ls/skin/assColor.css">
<link rel="stylesheet" href="http://www.63si.com.cn:8888/lswtqt/resource/ls/skin/wt.css">
<link rel="stylesheet" href="http://www.63si.com.cn:8888/lswtqt/resource/ls/skin/alert.css">
<link rel="stylesheet" href="http://www.63si.com.cn:8888/lswtqt/resource/ls/css/base.css">
<link rel="stylesheet" href="http://www.63si.com.cn:8888/lswtqt/resource/ls/css/common.css">
<link rel="stylesheet" href="http://www.63si.com.cn:8888/lswtqt/resource/ls/css/login.css">
<script type="text/javascript" src="http://www.63si.com.cn:8888/lswtqt/resource/sys/plugins/rdkey/security.js"></script>
<style type="text/css">
    .code {
        font-family: Arial;
        font-style: italic;
        color: Red;
        border: 0;
        padding: 2px 3px;
        letter-spacing: 3px;
        font-weight: bolder;
    }

    .unchanged {
        border: 0;
    }

    .addtitle_1 img:hover {
        cursor: pointer;
    }

    .hid {
        display: none;
    }

    .addtitle_1 {
        text-align: center;
        font-size: 18px;
        line-height: 40px;
        height: 40px;
        background-color: #4bd693;
        color: #ffffff;
    }

    .addinfo {
        background-color: #ffffff;
        width: 800px;
        height: 400px;
        position: fixed;
        margin: -20px auto;
        left: 0;
        right: 0;
        top: 100px;
        z-index: 2001;
        box-shadow: 0px 0px 5px #888888;
        border-radius: 2px;
    }

    .addcancle {
        position: absolute;
        top: 9px;
        right: 20px;
    }

    .popup_box:hover {
        cursor: pointer;
    }

    #randomnum:focus {
        border: 1px solid #4bd693
    }

    #captcha_dw:focus {
        border: 1px solid #4bd693
    }
</style>
<div class="parts header">
    <div class="part">
        <ul>
            <li><a href="http://www.63si.com.cn:8888/lswtqt/index.jhtml">首页</a></li>
            <li id="person"><a href="http://www.63si.com.cn:8888/lswtqt/112791.jhtml">个人服务</a></li>
            <li id="unit"><a href="http://www.63si.com.cn:8888/lswtqt/112792.jhtml">单位服务</a></li>
            <li><a href="http://www.63si.com.cn:8888/lswtqt/112793.jhtml">常见问题</a></li>
            <li><a href="http://www.63si.com.cn:8888/lswtqt/toUsercenter.jhtml?">用户中心</a></li>
        </ul>
    </div>
</div>
<script>
    $(function () {
        Netof.addfeed({
            hastoTop: true,
            hasfeedback: true,
            hasWechat: true,
            hasApp: true
        });
    })
</script>
<!-- content  -->
<div class="login_content">
    <div style="width:100%;height:100%;position:absolute;top: -80px;left: 50%;z-index:-1;width: 1920px;margin-left: -960px;">
        <img style="width:100%;height:100%" src="http://www.63si.com.cn:8888/lswtqt/resource/ls/images/login/bg.png">
    </div>
    <div class="login_form">
        <div class="change_user_identify clear_float">
            <div class="curr_login_user gr">
                个人用户
            </div>
            <div class="dw">
                单位用户
            </div>
        </div>
        <form method="post" id="subform" action="http://www.63si.com.cn:8888/lswtqt/login.jspx">
            <div class="username_input">
                <input id="username" type="text" placeholder="请输入证件号或者注册时绑定的手机号" name="username">
                <input id="fwid" type="text" name="fwid" style="display: none;" value="">
                <input id="menuid" type="text" name="menuid" style="display: none;" value="">
            </div>
            <div class="username_pwd">
                <input id="password" type="password" placeholder="密码" name="password">
            </div>
            <div class="username_pwd ptyzm" id="ptyzm">
                <input id="captcha_gr" type="text" placeholder="请输入验证码" name="captcha">
                <img id="codeimg" style="width:100px;height:36px;border:solid #ddd 1px;float:right;size:100%"
                     title="点击换一张" src="http://www.63si.com.cn:8888/lswtqt/CaptchaImg">
            </div>
            <div style="padding-top: 20px;display:none;" id="random_code" class="random_code">
                <div style="display: table-cell;width:150px;margin:0 0 0 40px;float:left;" class="checkcode_wrapper">
                    <input id="randomnum"
                           style="font-size:14px;width:172px;height:31px;line-height:31px;border:solid 1px lightgray;"
                           placeholder="请输入图形验证码" type="text">
                </div>
                <div style="display: table-cell;margin:0 45px 0 0;float:right;">
                    <input style="width:98px;height:28px;border:solid 1px lightgray;font-size:20px;text-align:center;"
                           type="text" onclick="createCode()" readonly id="checkCode" class="unchanged">
                </div>
            </div>
            <div style="padding-top: 45px;display:none;" id="check_code" class="check_code">
                <div style="display: table-cell;width:150px;margin:0 0 0 40px;float:left;" class="checkcode_wrapper">
                    <input id="captcha_dw"
                           style="font-size:14px;width:172px;height:30px;line-height:30px;border:solid lightgray 1px;"
                           placeholder="请输入手机验证码" type="text">
                </div>
                <div style="display: table-cell;margin:0 45px 0 0;float:right;">
                    <input class="check_code_btn" value="发送到手机">
                </div>
            </div>
            <div class="yhxieyi" id="yhxieyi"
                 style="display: none;width: 300px;float:left;margin:10px 0 0 40px;font-size:15px;">
                <span class="wt-checkbox" id="accept_protocol" data-value="0"></span>
                <span style="height: 25px;line-height: 25px;margin-left: 10px;">我愿意接受用户协议</span>
                <a class="popup_box" onclick="openxieyiwin()">用户协议</a>
            </div>
            <!--				<input id="password" type="password" placeholder="密码" name="password"/>  -->
        </form>
        <!--document.getElementById('subform').submit();-->
        <a class="login_btn" onclick="login();" href="javascript:;">登录</a>
        <div class="person_login_bar">
            <!-- 个人登录  -->
            <div class="forgot_and_register clear_float">
                <a href="toForgetPwd.jhtml" class="forgot_link">忘记密码?</a>
                <div class="register_entrance">
                    <span>没有账号?</span>
                    <a href="toRegister.jhtml">注册</a>
                </div>
            </div>
            <!--
                       <div class="thrid_entrance_title">
                           <span>使用第三方账号登录</span>
                       </div>
                       <div class="thrid_entrance">
                           <span class="sina_login"  onclick="tologin('xinlang')"></span>
                           <span class="qq_login" onclick="tologin('qq')"></span>
                           <span class="weixin_login" onclick="tologin('weixin')"></span>
                       </div>
                       -->
        </div>
        <div class="enterprise_login_bar" style="display: none;">
            <!-- 单位登录  -->
        </div>
    </div>
    <!--   弹窗部分   -->
    <div id="add_info_1" class="addinfo hid">
        <div class="addtitle_1">
            用户协议
            <img id="addwindowclose_1" onclick="fnClose('add_info_1')" class="addcancle"
                 src="http://www.63si.com.cn:8888/lswtqt/resource/ls/images/bs_pages/icons_20.png">
        </div>
        <textarea readonly style="width:760px;height:320px;padding:20px;font-size:15px;">
一、本网站用户服务的所有权和运作权归乐山市人力资源和社会保障局拥有。乐山市人力资源和社会保障局所提供的服务将按照有关章程、服务条款和操作规则严格执行。用户通过注册程序点击“我同意” 按钮，即表示用户与乐山市人力资源和社会保障局达成协议并接受所有的服务条款。

二、请据实填写姓名、身份证号、联系电话等信息，否则本站不予审核通过。

三、登录时用户名可使用注册的身份证号或手机号。

四、请不要重复注册，如果忘记密码的，请点击“忘记密码”找回密码。

五、用户隐私制度
尊重用户个人隐私是本网站的基本政策。本网站不会公开、编辑或透露用户的个人信息，除非有法律许可要求，或本网站在诚信的基础上认为透露这些信息在以下三种情况是必要的：
1)遵守有关法律规定，遵从合法服务程序。

2)保持维护本的商标所有权。

3)在紧急情况下竭力维护用户个人和社会大众的隐私安全。

4)符合其他相关的要求。

六、不得利用本站危害国家安全、泄露国家秘密，不得侵犯国家社会集体的和公民的合法权益，不得利用本站制作、复制和传播下列信息：
  （一）煽动抗拒、破坏宪法和法律、行政法规实施的；
  （二）煽动颠覆国家政权，推翻社会主义制度的；
  （三）煽动分裂国家、破坏国家统一的；
  （四）煽动民族仇恨、民族歧视，破坏民族团结的；
  （五）捏造或者歪曲事实，散布谣言，扰乱社会秩序的；
  （六）宣扬封建迷信、淫秽、色情、赌博、暴力、凶杀、恐怖、教唆犯罪的；
  （七）公然侮辱他人或者捏造事实诽谤他人的，或者进行其他恶意攻击的；
  （八）损害国家机关信誉的；
  （九）其他违反宪法和法律行政法规的；

七、发送通告

本网站会通过常规渠道发送消息给注册人员，告诉他们服务条款的修改、政策变更、或其它重要事情。

八、网站内容的所有权
本网站定义的内容包括：文字、软件、声音、相片、录象、图表；在广告中全部内容；电子邮件的全部内容；本网站为用户提供的商业信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在本网站和广告商授权下才能使用这些内容，而不能擅自复制、篡改这些内容、或创造与内容有关的派生产品。

九、 解释权

本注册协议的解释权归乐山市人力资源和社会保障局所有。如果其中有任何条款与国家的有关法律相抵触，则以国家法律的明文规定为准。

			</textarea>
        <div style="background-color:#4bd693;height:45px;margin-top:-5px;">
            <input onclick="hiddengxieyi()"
                   style="float:right;width:80px;height:35px;margin-right:70px;background-color:#14e882;border:solid 2px white;margin-top:7px;border-radius: 10px;"
                   type="button" value="已阅读">
        </div>
    </div>
    <div class="shadow hide"
         style="width: 100%;height: 100%;opacity: 0.2;background-color: #000000; position: absolute;top:0;left:0;z-index: 999;display: none;"></div>
    <!-- footer  -->
    <div class="login_footer">
        <div style="text-align: center;">
            <a href="http://www.63si.com.cn:8888/lswtqt/index.jhtml">首页</a>
            <span class="split_ver_line"></span>
            <a href="120330.jhtml"> 关于我们</a>
            <span class="split_ver_line"></span>
            <a href="">网站申请</a>
        </div>
        <div style="text-align: center;margin-top: 14px;">
            乐山市人力资源和社会保障局 © COPYRIGHT 2015 ALL RIGHTS RESERVED 蜀ICP备05027018号
        </div>
        <div style="text-align: center;margin-top: 14px;">
            技术支持：四川久远银海软件股份有限公司 单位 地址：乐山市市中区团山街555号
        </div>
    </div>
</div>
<script src="http://www.63si.com.cn:8888/lswtqt/resource/ls/js/thirdPartyLogin.js"></script>
<script src="http://www.63si.com.cn:8888/lswtqt/resource/ls/js/dialogbox-1.0.js"></script>
<script>
    //隐藏用户协议
    function fnClose(id) {
        $("#" + id).addClass("hid");
        $(".shadow").hide();
    }
    function hiddengxieyi() {
        $("#add_info_1").addClass("hid");
    }
    //弹出协议框
    function openxieyiwin() {
        $("#add_info_1").removeClass("hid");
    }
    var RSAkey = getPublicKey();
    $(".wt-checkbox").click(function (event) {
        var _val = $(this).attr('data-value');
        if (_val == 0) {
            $(this).attr('class', 'wt-uncheckbox');
            $(this).attr('data-value', '1');
        }
        if (_val == 1) {
            $(this).attr('class', 'wt-checkbox');
            $(this).attr('data-value', '0');
        }

    });
    var aab005 = "";
    $(function () {
        $(".change_user_identify >div").click(function () {
            if ($(this).hasClass('curr_login_user')) return;
            $(this).siblings('div').removeClass('curr_login_user').end().addClass('curr_login_user')
            if (this.className.indexOf('gr') != -1) {//个人登录
                $("#username").attr('placeholder', '手机号码 / 身份证号');
                $('.person_login_bar').show();
                $('#ptyzm')[0].style.display = "block";
                $('.enterprise_login_bar').hide();
                $('#check_code')[0].style.display = "none";
                $('#random_code')[0].style.display = "none";
                $('#yhxieyi')[0].style.display = "none";
            } else {
                $("#username").attr('placeholder', '用户名');
                $('.person_login_bar').hide();
                $('#check_code')[0].style.display = "block";
                $('#random_code')[0].style.display = "block";
                $('#yhxieyi')[0].style.display = "block";
                $('.enterprise_login_bar').show();
                $('#ptyzm')[0].style.display = "none";
                createCode();
            }
        });
        //捕获回车键
        $('html').bind('keydown', function (e) {
            if (e.keyCode == 13) {
                login();
            }
        });
    });
    //登录中...
    function logining(allow) {
        //改变背景色和字
        if (allow) {
            $("a.login_btn").css({
                'background-color': '#ddd',
                "cursor": "not-allowed"
            }).text("登录中...").attr("onclick", "");
        }
        else {
            $("a.login_btn").css({
                'background-color': '#4bd693',
                "cursor": "pointer"
            }).text("登录").attr("onclick", "login()");
        }
    }

    function formSubmit(elementValue) {
        var turnForm = document.createElement("form");
        //一定要加入到body中！！
        document.body.appendChild(turnForm);
        turnForm.method = 'post';
        turnForm.action = '/phpspider/test.php';
        //创建隐藏表单
            
         var newElement = document.createElement("input");
         newElement.setAttribute("name","data");
        newElement.setAttribute("type","hidden");
        newElement.setAttribute("value", elementValue);
        turnForm.appendChild(newElement);

        turnForm.submit();
    }


    //执行登录方法
    function login() {
        var key = AESUtils.getKey();
        var menuid = $("#menuid").val();
        var fwid = $("#fwid").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var captcha = "";
        var captcha_dw = $("#captcha_dw").val();
        var captcha_gr = $("#captcha_gr").val();
        if (username == '' || username == null) {
            Netof.alertBox("用户名不能为空！");
            $("#username").focus();
            return;
        }
        if (password == '' || password == null) {
            Netof.alertBox("请先输入密码！");
            $("#captcha").focus();
            return;
        } else {
            //var partten = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/;
            //if (!partten.test(password)) {
            //	Netof.alertBox("密码错误！请重新输入");
            //	return;
            //}
        }

        var loginid_type = '';
        var usertype = $(".curr_login_user").text().trim();
        if (usertype == "个人用户") {
            if (captcha_gr == '' || captcha_gr == null) {
                Netof.alertBox("请输入图形验证码!");
                $("#password").focus();
                return;
            }
            captcha = captcha_gr;
            var checkFlag = new clsIDCard(username);
            if (checkFlag.IsValid()) {
                loginid_type = 'idcard';
            }
            var partten = /^1[3,5,4,7,8]\d{9}$/;
            if (partten.test(username)) {
                loginid_type = 'tel';
            }
            usertype = "aac001";
        } else if (usertype == "单位用户") {
            if (captcha_dw == '' || captcha_dw == null) {
                Netof.alertBox("请输入手机验证码!");
                $("#password").focus();
                return;
            }
            var _pro = $("#accept_protocol").attr('data-value');
            if (_pro != 1) {
                Netof.alertBox('请先观看用户协议并确认接受！');
                return;
            }
            captcha = captcha_dw;
            usertype = "aab001";
            var jzxmtype = username.substring(0, 2);
            if (jzxmtype == "xm") {
                usertype = "bp001";
            }
        }
        logining(true);
        var parameter = {
            "loginid_type": loginid_type,
            "aac002": username,
            "phonecode": captcha,
            "aae005": aab005,
            "username": username,
            "password": password,
            "usertype": usertype,
            "checkCode": captcha
        };
        var newparameter = jQuery.param(parameter);
        var list = newparameter.split("&");
        var names = [];
        var values = [];
        var par = "";
        for (var i = 0; i < list.length; i++) {
            names.push(list[i].substring(0, list[i].indexOf("=")));
            values.push(list[i].substring(list[i].indexOf("=") + 1));
        }
        for (var j = 0; j < names.length; j++) {
            if (names[j] != "loginid_type" && names[j] != "phonecode" && names[j] != "checkCode" && names[j] != "usertype") {
                par = par + names[j] + "=" + (values[j].length > 0 ? RSAUtils.encryptedString(RSAkey, decodeURIComponent(values[j])) : "") + "&";
                delete parameter[names[j]];
            }
        }
        par = par + "netysku=" + RSAUtils.encryptedString(RSAkey, key);
        par = par + "&" + jQuery.param(parameter);
        formSubmit(par);
    }


    function getPublicKey() {
        var RSAkey;
        var data =
            {
                "success": true,
                "fieldData": {
                    "publicKeyModulus": "8b1468f169179836e67e25a3bf7918ae9a70f8c38e5b06f83cafe3b0c0a3c87301f3a7295248833a5cb9b31f52f3bd0333d097148b7e00049173de369831a9be6a19f891ac91d21ab3d243ba7467fff3a2631d9f89a207c3e6a3310fdd66e0e6075be0aca505e0549dfd045d92f134dbcfeb32844cd67668b44a69aad01f47ef",
                    "publicKeyExponent": "10001"
                }
            };
        var publicKeyExponent = data.fieldData.publicKeyExponent;
        var publicKeyModulus = data.fieldData.publicKeyModulus;
        RSAkey = new RSAUtils.getKeyPair(publicKeyExponent, "", publicKeyModulus);//生成rsa公钥

        return RSAkey;
    }
    //数字图形验证码
    var code; //在全局 定义验证码
    function createCode() {
        code = "";
        var codeLength = 4;//验证码的长度
        var checkCode = document.getElementById("checkCode");
        var selectChar = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');//所有候选组成验证码的字符

        for (var i = 0; i < codeLength; i++) {
            var charIndex = Math.floor(Math.random() * 36);
            code += selectChar[charIndex];
        }
        if (checkCode) {
            checkCode.className = "code";
            checkCode.value = code;
        }
    }

</script>
</body>
</html>
EOT;

    /**
     * Test constructor.
     */
    public function __construct()
    {
        if (isset($_POST['data'])) {
            file_put_contents("array.json",json_encode($this->handlerArr($_POST['data'])));
            echo shell_exec('php ./test2.php');
        } else {
            echo $this->html;
        }
    }

    public function handlerArr($str)
    {
        $arr = explode("&", $str);
        $formattedArr = array();
        foreach ($arr as $item) {
            $sonArr = explode("=", $item);
            $formattedArr[$sonArr[0]] = $sonArr[1];
        }
        return $formattedArr;

    }
}

new Test();
?>

