function showEvent(jsonStr){
    var eventCards = document.querySelectorAll('#event-wrap .event-item');
    var swiperWrapper = document.querySelector('.swiper-wrapper');
    var str;
    var events = [];
    // console.log(jsonStr);
    var jsonStrArr = jsonStr.split("|");
    // console.log(jsonStrArr);
    for (var i in jsonStrArr ){
        events.push(JSON.parse(jsonStrArr[i]));
    }

    for(var i in events){
        i = parseInt(i);
    eventCards[i].innerHTML = `
    <form action="eventInfo.php" class="eventdata">
        <input type="hidden" value="${events[i].activity_id}" name="activity_id">
        <input type="hidden" value="${events[i].activity_type_id}" name="activity_type_id">
        <input type="hidden" value="${events[i].imgPath}" name="desc_image01_path">
        <input type="hidden" value="${events[i].date}" name="hold_date">
        <input type="hidden" value="${events[i].name}" name="name">
        <input type="hidden" value="${events[i].store}" name="storeName">
        <input type="hidden" value="${events[i].max_people}" name="max_people">
    </form>
    <div class="event-title">
        <div class="title-child title-left">
            <h2>${events[i].title}</h2>
            <h3>活動名稱<br>${events[i].name}</h3>
        </div>
        <div class="title-child title-right">
            <img class="mem-img" src="${events[i].imgPath}">
            <p>發起人：<br><span>${events[i].memName}</span></p>
        </div>
    </div>
    <div class="hrline"></div>
    <p class="content">
        地點 : ${events[i].store}<br>
        日期 : ${events[i].date}<br>
        <br>
        ${events[i].desc}
    </p>
    <a class="btn joinEvent rwd-join" href="#">詳情</a>
    <a class="event-btn joinEvent" href="#">
        <span>詳情</span>
        <img src="img/section4-6/event-btn1.png" alt="">
    </a>
    `;
    }

    var joinEvent = document.querySelectorAll('.joinEvent');
    for (var i = 0; i < joinEvent.length ; i++){
        joinEvent[i].addEventListener("click",function(){
            // console.log(this.parentNode.firstElementChild);
            this.parentNode.firstElementChild.submit();
        })
    }


    var eventdatas = document.getElementsByClassName("eventdata");
    for (var i = 0; i < eventdatas.length; i++) {
        eventdatas[i].onclick = function (e) {
            console.log(e.currentTarget.childNodes[1].childNodes[1]);
            // e.currentTarget.childNodes[1].childNodes[1].submit();
        }
    }
}

function eventInit(){
    var xhr = new XMLHttpRequest();

    xhr.onload = function(){
        if(xhr.status == 200){
            // console.log(xhr.responseText);
            showEvent(xhr.responseText);
        }else{
            alert(xhr.status);
        }
    }

    var url = "php/ajaxHomeEvent.php";
    xhr.open("post", url, true);

    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    var data_info = "";
    xhr.send(data_info);
}

window.addEventListener("load", eventInit);