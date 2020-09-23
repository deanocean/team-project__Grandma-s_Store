function loginCheck() {
    var checkCode;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) { //server執行完畢
            if (xhr.status == 200) { //正確執行完畢
                //判斷session是否存在
                if (xhr.responseText == "Not logging in") {
                    checkCode = 0; //未登入
                    // console.log(checkCode);
                } else {
                    checkCode = 1; //已登入
                    // console.log(checkCode);
                }
            } else {
                alert(xhr.status);
            } //xhr.status
        }//xhr.readyState
    }

    var url = "php/ajaxLoginCheck.php";
    xhr.open("post", url, false);
    //false同步執行，要等ajax連完php把checkCode拿回來時再繼續執行程式。
    //否則loginCheck傳回去的值會是undefined

    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("");

    return checkCode;
}

//顯示訊息燈箱
function showLoginAlert(loginAlert) {
    loginAlert.style.display = "block";
    setTimeout(function () {
        loginAlert.style.opacity = 1;
    }, 100);

    //點擊本體關閉訊息
    setTimeout(function () {
        loginAlert.style.opacity = 0;
        setTimeout(function(){loginAlert.style.display = "none";},500);
    },1500);
}