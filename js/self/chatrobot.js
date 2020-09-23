// $(window).on("load", function () {

    //打開客服機器人
    $('#Apo').click(function(){
        $('.chatrobot').fadeIn(500).css("display","block");
        
        
    });
    $('.closebtn').click(function(){
        $('.chatrobot').css("display","none");
    });

    //送出資料，滑鼠點擊送出
    var chatbtn = document.querySelector('.chatbtn');
    var message = document.querySelector(".messagebox");

    chatbtn.addEventListener('click',say);
    function say(e){
        if (message.value == "") {  //未輸入內容，無法發送
            e.preventDefault();
        }else {
            append("<div class='customMessage'>" + message.value + "</div>");
            answer(say);
        }
    }
    //當按下 enter 鍵時，會呼叫此函數進行回答
    message.onkeydown = keyin;
    function keyin(e) {
    var keyCode = e.which; // 取出按下的鍵
        if (keyCode == 13 && !event.shiftKey == 1) { //shift+enter，換行
            e.returnValue = false;  //停止textarea本身enter換行功能
            if (message.value == "") {  //未輸入內容，無法發送
                e.preventDefault();
            } else {
                say();
            }
        }
    }

    
    // 回答問題 
    function answer(say){     
        // alert(message.value);
        console.log(message.value);
        var xhr = new XMLHttpRequest();

        xhr.open("post", "php/robot.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function(){
            if(xhr.readyState ==4){
                if(xhr.status == 200){
                    append( "<div class='avatar'><p class='avatar__text'>" + xhr.responseText + "</p></div>")
                }else{
                    alert("資訊錯誤");
                }
            }
        }
        var say = "saymessage=" + message.value;
        xhr.send(say);
        message.value = '';
    }


    // chatbox 加入對話
    function append(line){
        var messageContent = document.querySelector(".chatbox"); // 取出對話框
        messageContent.innerHTML += line;
        // document.querySelector(".messagebox").value = '';

        var scrollHeight = $('.chatbox').prop("scrollHeight"); //scrollbar自動在最下方
        $('.chatbox').scrollTop(scrollHeight);

    }



// });




