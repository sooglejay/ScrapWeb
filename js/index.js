/**
 * Created by jianwei on 2017/7/15.
 */

$(function () {

    $("#btnLogin").click(function () {
        var userName = $("#userName").val();
        var password = $("#password").val();
        if (!userName || userName.length < 1) {
            alert("账户不能为空");
            return false;
        }
        if (!password || password.length < 1) {
            alert("密码不能为空！");
            return false;
        }

        $.post("/ScrapWeb/index.php",{'action': 'Login', 'userName': userName, 'password': password})
            .done(function( data ) {
                alert( "Data Loaded: " + data );
            });

    });
});
