
var reportBtns = [];
var member_id;
// 先找物件



// ajax更新
function updateReport(message_id) {
//    alert(reportBtns[i]);
    if (loginCheck()==0){
        contentMsg.innerText = "尚未登入，請登入"; 
        // alert('請登入!');
        showLoginAlert(loginAlert);
        return;   
    }
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        //console.log("onload : ", xhr.readyState);

        if (xhr.status == 200) {
            // console.log(xhr.responseText);
            contentMsg.innerText = xhr.responseText;
            showLoginAlert(loginAlert);
        } else {
            alert(xhr.responseText);
        }
    }
 

    xhr.open("post", "php/addReport2.php", false);//設定好要連結的程式
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");

    
    var addReport_info = "message_id=" + message_id; //欄位名稱+值
    xhr.send(addReport_info);//資料 送去php
    console.log(addReport_info);

}



