var square, group, wrap, lotteryLogin, lotteryGet, pad, windowWidth, NavloginBtn, loginAlert, lotResChild;
var moveX = 0;
var moveZ = 0;

function init() {
    square = document.querySelectorAll('.square');
    group = document.querySelector('.group');
    wrap = document.querySelector('.wrap');
    lotteryGet = document.getElementById('lottery-get'); //領取按鈕
    lotteryClose = document.getElementById('lottery-close'); //關閉按鈕
    btnLogin = document.getElementById('btnLogin'); //子登入按鈕
    loginAlert = document.getElementById('loginAlert'); //判斷是否登入的燈箱
    lotResChild = document.querySelector('#loginAlert .contentMsg'); //燈箱內的資訊


    lotteryGet.addEventListener('click', judgeMember);
    // lotteryGet.addEventListener('click', showGet);

    //動態計算螢幕寬度
    windowWidth = window.innerWidth;
    window.onresize = function () {
        windowWidth = window.innerWidth;
    }

    wrap.addEventListener('mouseover', function () {
        drag(this, event);
    }, true);

    assignSquare();
}

//秀出燈箱
function judgeMember(){
    //用ajax判斷會員登入的session是否存在，以得知其是否已登入

    //判斷是否登入
    if (loginCheck() == 0 ){
        lotResChild.innerText = '尚未登入，請先登入';

        //註冊在登入後成功拿到獎券
        btnLogin.addEventListener('click', afterLogin); 
    }else{
        lotResChild.innerText = '已將獎券放進會員中心';
        writeInMember(); //寫入會員中心
    }

    showLoginAlert(loginAlert);
}


function afterLogin(){
    var afterLogInMsg = loginCheck();
    if (afterLogInMsg == 1) {
        lotResChild.innerText = '已將獎券放進會員中心';
        writeInMember(); //寫入會員中心
        showLotRes();
    }
    console.log(afterLogInMsg);
}




function writeInMember(){
    var xhr = new XMLHttpRequest();

    xhr.onload = function(){
        if( xhr.status == 200 ){
            console.log(xhr.responseText);
        }else{
            alert(xhr.status);
        }
    }

    var url = "php/lottery_ajax.php?coupon_id="+sessionStorage["lottery"];
    xhr.open('get', url, true);
    xhr.send(null);
}


//戳戳樂跟著滑鼠做視角移動
function drag(elementToDrag, event) {
    if (windowWidth >= 992) { //大於992時
        var startX = event.clientX, startY = event.clientY;

        document.addEventListener("mousemove", moveHandler, true);
        document.addEventListener("mouseout", upHandler, true);

        if (event.stopPropagetion) event.stopPropagation();
        else event.cancelBubble = true;

        if (event.preventDefault) event.preventDefault();
        else event.returnValue = false;

        function moveHandler(event) {
            theX = event.clientX - startX;
            theY = event.clientY - startY;
            calX = -1 * (theY / 20) + moveX;
            calZ = theX / 20 + moveZ;
            // if( (calX-90) > -110 && (calX-90) < -70 && calZ > -30 && calZ < 30){
            if (calX <= -8) {
                calX = -8;
            }
            if (calX >= 8) {
                calX = 8;
            }
            if (calZ >= 8) {
                calZ = 8;
            }
            if (calZ <= -8) {
                calZ = -8;
            }
            // console.log(`calX : ${calX} | calZ : ${calZ}`);
            group.style.transform = "rotateX(" + (calX - 40) + "deg) rotateY(" + (calZ + 40) + "deg) rotateZ(0deg)";

            if (event.stopPropagation) event.stopPropagation();
            else event.cancelBubble = true;
        }

        function upHandler(event) {
            moveX = calX;
            moveZ = calZ;
            document.removeEventListener("mouseout", upHandler, true);
            document.removeEventListener("mousemove", moveHandler, true);
            if (event.stopPropagation) event.stopPropagation();
            else event.cancelBubble = true;
        }
    } else { //小於992時戳戳樂變正面
        group.style.transform = "rotateX(-90deg) rotateY(0deg) rotateZ(0deg)";
    }
}//戳戳樂跟著滑鼠做視角移動



//註冊點按格子後格子被戳破及顯示獎券
function assignSquare() {
    var i = 0;
    do {
        square[i].addEventListener('click', breakPaper, true);
        square[i].addEventListener('click', showLottery, true);
        i++;
    } while (square[i]);

    function breakPaper() { //格子戳破
        this.style.backgroundPosition = "center center";
        this.style.backgroundSize = "cover";
        this.style.backgroundImage = "url(img/gamebox/broken.png)";
    }

    function showLottery() {  
        //顯示獎券
        lottery = document.getElementById('lottery');
        lottery.style.display = "block";
        lottery.style.animation = "lottery-open 2s ease-in-out";

        //隨機抽出獎券
        var lotArray = [50, 100, 200, 500];
        var lotNum = rand(0, 3);
        var lotImg = document.createElement('img');
        lotImg.src = `img/gamebox/lottery-${lotArray[lotNum]}dollars.png`;
        lotImg.id = `lot-${lotArray[lotNum]}`;
        lottery.appendChild(lotImg);


        //中獎金額寫入session
        if (sessionStorage['lottery'] == null){
            sessionStorage['lottery'] = lotArray[lotNum];
        }else{
            sessionStorage['lottery'] = lotArray[lotNum];
        }


        //顯示領取按鈕
        lotteryGet.style.display = "block";
        lotteryClose.style.display = "block";
        var lotBtn = setInterval(function () {
            lotteryGet.style.opacity = 1;
            lotteryClose.style.opacity = 1;
            clearInterval(lotBtn);
        }, 2000);
        lotteryGet.addEventListener('click', closeIt);


        for (var i = 0; i < square.length; i++) {
            square[i].removeEventListener('click', showLottery, true);
        }

        lotteryClose.addEventListener('click', closeLottery);


    }

    function closeIt() {  //關閉領取按鈕
        lotteryGet.style.opacity = 0;
        lotteryClose.style.opacity = 0;
        lottery.style.display = "none";
        lotteryGet.removeEventListener('click', closeIt);
    }

    function closeLottery() {  //關閉獎券
        lottery.style.animation = 'lottery-close 2s ease-in-out';
        lotteryGet.style.opacity = 0;
        lotteryClose.style.opacity = 0;
        var disnone = setInterval(disNone, 2000);
        function disNone() {
            lottery.style.display = "none";
            lotteryGet.style.display = "none";
            lotteryClose.style.display = "none";
            clearInterval(disnone);
        }
    }
}//註冊點按格子後格子被戳破及顯示獎券




function rand(min, max) {
    return Math.floor(Math.random() * (max + 1 - min)) + min;
}


window.addEventListener('load', init);