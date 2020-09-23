
var loginAlert =document.getElementById("loginAlert");
var contentMsg =document.getElementsByClassName("contentMsg")[0];

function commentLoad() {
    
    // 檢查送出留言 登入狀態
    document.getElementById("send").addEventListener('click', function () {
        if (loginCheck() == 0) {//無登入
            contentMsg.innerText = "尚未登入，請登入";
        } else { //已登入
            contentMsg.innerText = "留言成功";
        }
        showLoginAlert(loginAlert);
    }, false);

    var reportCmt = document.getElementsByClassName("report");
    // 檢查送出留言 登入狀態
    for(i=0; i<reportCmt.length;i++){
    reportCmt[i].addEventListener('click', function () {

            if (loginCheck() == 0) {//無登入
                contentMsg.innerText = "尚未登入，請登入";
            } else { //已登入
                contentMsg.innerText = "檢舉成功";
            }
            showLoginAlert(loginAlert);
        
        }, false);
    };//end of for 迴圈




}
        
        
window.addEventListener('load', commentLoad, false);