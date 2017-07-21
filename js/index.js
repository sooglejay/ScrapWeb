/**
 * Created by jianwei on 2017/7/15.
 */

$(function () {
   $("#btnLogin").click(function () {
       startToMock();
   });
   setTimeout(function () {
       readTextFile("ScrapWeb/readme.txt");
   },5000);
});
function startToMock() {
    $.ajax({
        url:'/ScrapHandler/index.php',
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
function readTextFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                alert(allText);
            }
        }
    };
    rawFile.send(null);
}