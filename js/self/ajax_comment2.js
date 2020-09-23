
   
    var loginAlert =document.getElementById("loginAlert");
    var contentMsg =document.getElementsByClassName("contentMsg")[0];

    function commentLoad(){

    // 檢查送出留言 登入狀態
    document.getElementById("send").addEventListener('click', checkSend , false);

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

    }//end of commentLoad


    function checkSend() {
        if (loginCheck() == 0) {//無登入
            contentMsg.innerText = "尚未登入，請登入";
        } else { //已登入
            var comment_content = document.getElementById('comment_content');
            if (comment_content.value == '') {
                contentMsg.innerText = "請輸入留言!";
            } else {
                contentMsg.innerText = "留言成功";
                sendToDB();
                this.removeEventListener('click', checkSend);
                setTimeout(() => {
                    window.history.go(0);
                }, 800);

            }
        }
        showLoginAlert(loginAlert);
    };



    function sendToDB(event) {
        // event.preventDefault();
        var form_data = $('#comment_form').serialize();
        $.ajax({
            url: "php/add_comment2.php",
            method: "POST",
            data: form_data,
            dataType: "JSON",
            success: function (data) {
                if (data.error != '') {
                    $('comment_form')[0].reset();
                    $('comment_message').html(data.error);
                    load_comment();
                }
            }
        })
    }; //end of snedToDB


    function load_comment() {
        $.ajax({
            url: "php/fetch_comment2.php",
            method: 'POST',
            success: function (data) {
                $('#display_comment').html(data);

            }
        })
    }//end of load_comment()

