/**
 * Created by jianwei on 2017/7/15.
 */

$(function () {
    startToMock();
});
function startToMock() {
    $.ajax({
        url:'./../index.php',
        method:'POST',
        data:{mock:'yes'},
        success:function (data) {
            console.log(data);
        },
        error:function (data) {
            console.log(data);
        }
    });
}