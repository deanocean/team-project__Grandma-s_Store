window.addEventListener('load', init);
let designReady = false;
let addToCart = false;

// var subtotal = 100;

function init() {

    var storage = localStorage;
    packagePrice = 100;
    subtotal = 100;
    storage.setItem("packagePrice", packagePrice);
    storage.setItem("custCart", subtotal);

    if (storage['addItemList'] == null) {
        storage['addItemList']="";
    }
    var smallimgs = document.querySelectorAll(".threeBag img");
    for (var i = 0; i < smallimgs.length; i++) {
        smallimgs[i].addEventListener("click", showLarge, false);
    }
    // subtotal += parseInt(storage["packagePrice"]);
    // document.getElementById('subtotal').innerText = subtotal;

    var cust=document.querySelector('.cust');
    cust.style.color="#d53e23";

    cust.style.cssText =
        `color:#d53e23;
    background-image:url(img/member/nav-hover.png);
    background-size:110%;
    background-repeat:no-repeat;
    background-position:50%;
    `;




    tempCart();
    addClassFlex();
    displayBlock();
}

//loading時先消失
function displayBlock() {
    var preloading = document.getElementById('preloading');
    preloading.style.opacity = "1";
}

// 第一步驟:點小圖換大圖
function showLarge(e) {
    var small = e.target;
    document.getElementById("large").src = small.src;
    document.getElementById("large2").src = small.src;
    document.getElementById("large3").src = small.src;
    //手機
    document.getElementById("large4").src = small.src;
    
    //將包包的錢寫進總額
    var packagePrice = parseInt(small.nextElementSibling.innerText);
    document.getElementById("bagmoney").innerText = packagePrice;
    document.getElementById("subtotal").innerText = packagePrice;
    // 將包包的錢丟進session裡
    var storage = localStorage;
    storage.setItem("packagePrice", packagePrice);
    storage.setItem("custCart", packagePrice);

    subtotal = parseInt(storage["packagePrice"]);
    document.getElementById('subtotal2').innerText=subtotal;
    // storage.setItem("custCart", packagePrice);
}


//遮罩功能，動態替換遮罩
_index = 0;
$('.smallThreeBag').click(function () {
    _index = $(this).index();
    $('.forClip').removeClass().addClass('forClip clip' + _index);
    
});


//第二步:將文字丟進右邊
let putWords = document.querySelectorAll('.putWord');
for (let i = 0; i < putWords.length; i++) {
    putWords[i].addEventListener('click', function () {
        putText();
    });
}

function putText() {
    //電腦
    dropzoneContentimage1 = document.getElementById("dropzoneContentimage1");
    dropzoneContentimage1.innerText = document.getElementById("myWord").value;
    //手機
    // mobdropzoneContentimage1 = document.getElementById("mobdropzoneContentimage1");
    // mobdropzoneContentimage1.innerText = document.getElementById("mobmyWord").value;

}


// 點擊圖進去右邊/////////////////////////
$('.custChoose img').click(function () {
    var N = $(this).attr("class").substring(2, 3);
    //電腦
    $('#dropzoneContentimage2').attr("src", "img/custImg/custTatto/custTatto" + N + ".png");
    dropzoneContentimage2.style.maxHeight = '100px';
    dropzoneContentimage2.style.maxWidth = '100px';

    //手機
    $('#mobdropzoneContentimage2').attr("src", "img/custImg/custTatto/custTatto" + N + ".png");
    mobdropzoneContentimage2.style.maxHeight = '100px';
    mobdropzoneContentimage2.style.maxWidth = '100px';
})

//上傳功能
document.getElementById('fileUpload').onchange = fileChange;
function fileChange() {
    var file = document.getElementById('fileUpload').files[0];

    //new
    var readFile = new FileReader();
    
    readFile.addEventListener('load', function () {
        // 
        var image = document.getElementById('dropzoneContentimage3');
        image.src = readFile.result;
        image.style.maxHeight = '100px';
        image.style.maxWidth = '100px';
        
    });
    readFile.readAsDataURL(file);
}

document.getElementById('mobfileUpload').onchange = fileChange2;
function fileChange2() {
    var file = document.getElementById('mobfileUpload').files[0];

    //new
    var readFile = new FileReader();
    readFile.readAsDataURL(file);
    readFile.addEventListener('load', function () {
        var image = document.getElementById('mobdropzoneContentimage3');
        image.src = this.result;
        image.style.maxHeight = '100px';
        image.style.maxWidth = '100px';
    });
}


//拖進去 放大縮小旋轉
var rotY1 = 0;
var sclY1 = 1;
var rotY2 = 0;
var sclY2 = 1;
var rotY3 = 0;
var sclY3 = 1;

//抓左邊欄位
let putWord = document.getElementById('putWord');
let fileUpload = document.getElementById('fileUpload');
let tattoosss = document.querySelectorAll('.tattooss');

let mobputWord = document.getElementById('mobputWord');
let mobfileUpload = document.getElementById('mobfileUpload');
let mobtattoosss = document.querySelectorAll('.mobtattooss');

//抓右邊欄位
let dropzoneContent1 = document.getElementById('dropzoneContent1');
let dropzoneContent2 = document.getElementById('dropzoneContent2');
let dropzoneContent3 = document.getElementById('dropzoneContent3');
//左邊1
putWord.addEventListener('click', function () {
    scaleClockwiseRemove('dropzoneContentimage1')
})
// mobputWord.addEventListener('click', function () {
//     scaleClockwiseRemove('mobdropzoneContentimage1')
// })
//左邊2
dropzoneContent1.addEventListener('click', function (e) {
    scaleClockwiseRemove(e.target.id)
});
mobdropzoneContent1.addEventListener('click', function (e) {
    scaleClockwiseRemove(e.target.id)
});
//左邊3
for (let i = 0; i < tattoosss.length; i++) {
    tattoosss[i].addEventListener('click', function () {
        scaleClockwiseRemove('dropzoneContentimage2');
    });
}
for (let i = 0; i < mobtattoosss.length; i++) {
    mobtattoosss[i].addEventListener('click', function () {
        scaleClockwiseRemove('mobdropzoneContentimage2');
    });
}

//右邊1
dropzoneContent2.addEventListener('click', function (e) {
    scaleClockwiseRemove(e.target.id)
});

mobdropzoneContent2.addEventListener('click', function (e) {
    scaleClockwiseRemove(e.target.id)
});
//右邊2
fileUpload.addEventListener('change', function (e) {
    scaleClockwiseRemove('dropzoneContentimage3')
});
mobfileUpload.addEventListener('change', function (e) {
    scaleClockwiseRemove('mobdropzoneContentimage3')
});
//右邊3
dropzoneContent3.addEventListener('click', function (e) {
    scaleClockwiseRemove(e.target.id)
});
mobdropzoneContent3.addEventListener('click', function (e) {
    scaleClockwiseRemove(e.target.id)
});


//確認後會跑canvas跟存圖進資料庫
var confirmCustResult = document.getElementById('confirmCustResult');
confirmCustResult.addEventListener('mousedown', docanvas,false);
confirmCustResult.addEventListener('click', saveImage, false);

var step2Button = document.getElementById('step2Button');
step2Button.addEventListener('mousedown', docanvas, false);
step2Button.addEventListener('click', saveImage, false);

// confirmCustResult.addEventListener('click',  , false);
// confirmCustResult.onclick = function () {
//     docanvas;
//     saveImage;
// };


function scaleClockwiseRemove(id) {
    //電腦
    document.getElementById('scaleSmall').onclick = function () {
        scaleSmall(id);
    }
    document.getElementById('scaleBig').onclick = function () {
        scaleBig(id);
    }
    document.getElementById('clockwise').onclick = function () {
        clockwise(id);
    }
    document.getElementById('clockwiseReverse').onclick = function () {
        clockwiseReverse(id);
    }
    document.getElementById('removeImg').onclick = function () {
        removeImg(id);
    }
    //手機
    document.getElementById('mobscaleSmall').onclick = function () {
        scaleSmall(id);
    }
    document.getElementById('mobscaleBig').onclick = function () {
        scaleBig(id);
    }
    document.getElementById('mobclockwise').onclick = function () {
        clockwise(id);
    }
    document.getElementById('mobclockwiseReverse').onclick = function () {
        clockwiseReverse(id);
    }
    document.getElementById('mobremoveImg').onclick = function () {
        removeImg(id);
    }

    addClearClass(id);
}

function scaleBig(id) {


    if (id.endsWith('2')) {
        sclY2 = sclY2 + .1;
        document.getElementById(id).style.transform = "rotate(" + rotY2 + "deg)" + "scale(" + sclY2 + ")";
    } else if (id.endsWith('3')){
        sclY3 = sclY3 + .1;
        document.getElementById(id).style.transform = "rotate(" + rotY3 + "deg)" + "scale(" + sclY3 + ")";
    }else{
        sclY1 = sclY1 + .1;
        document.getElementById(id).style.transform = "rotate(" + rotY1 + "deg)" + "scale(" + sclY1 + ")";
    }
    
}
function scaleSmall(id) {
    if (id.endsWith('2')) {
        if (sclY2 > 0.2) {
            sclY2 = sclY2 - .1;
        } else {
            sclY2 = sclY2;
        }
        document.getElementById(id).style.transform = "rotate(" + rotY2 + "deg)" + "scale(" + sclY2 + ")";
    } else if (id.endsWith('3')){
        if (sclY3 > 0.2) {
            sclY3 = sclY3 - .1;
        } else {
            sclY3 = sclY3;
        }
        document.getElementById(id).style.transform = "rotate(" + rotY3 + "deg)" + "scale(" + sclY3 + ")";
    } else {
        if (sclY1 > 0.2) {
            sclY1 = sclY1 - .1;
        } else {
            sclY1 = sclY1;
        }
        document.getElementById(id).style.transform = "rotate(" + rotY1 + "deg)" + "scale(" + sclY1 + ")";
    }
}
function clockwise(id) {
    if (id.endsWith('2')) {
        rotY2 = rotY2 - 10;
        document.getElementById(id).style.transform = "rotate(" + rotY2 + "deg)" + "scale(" + sclY2 + ")";
    } else if (id.endsWith('3')){
        rotY3 = rotY3 - 10;
        document.getElementById(id).style.transform = "rotate(" + rotY3 + "deg)" + "scale(" + sclY3 + ")";
    } else {
        rotY1 = rotY1 - 10;
        document.getElementById(id).style.transform = "rotate(" + rotY1 + "deg)" + "scale(" + sclY1 + ")";
    }
}
function clockwiseReverse(id) {
    if (id.endsWith('2')) {
        rotY2 = rotY2 + 10;
        document.getElementById(id).style.transform = "rotate(" + rotY2 + "deg)" + "scale(" + sclY2 + ")";
    } else if (id.endsWith('3')){
        rotY3 = rotY3 + 10;
        document.getElementById(id).style.transform = "rotate(" + rotY3 + "deg)" + "scale(" + sclY3 + ")";
    } else if (id.endsWith('1')) {
        rotY1 = rotY1 + 10;
        document.getElementById(id).style.transform = "rotate(" + rotY1 + "deg)" + "scale(" + sclY1 + ")";
    }
}

function removeImg(id) {
    // document.getElementById(id).src = "";
    if (id.endsWith('2')) {
        rotY2 = 0;
        sclY2 = 1;
        document.getElementById(id).style.transform = "rotate(" + rotY2 + "deg)" + "scale(" + sclY2 + ")";
        document.getElementById(id).src = "";
    } else if (id.endsWith('3')){
        rotY3 = 0;
        sclY3 = 1;
        document.getElementById(id).style.transform = "rotate(" + rotY3 + "deg)" + "scale(" + sclY3 + ")";
        document.getElementById(id).src = "";
    } else {
        rotY1 = 0;
        sclY1 = 1;
        document.getElementById(id).style.transform = "rotate(" + rotY1 + "deg)" + "scale(" + sclY1 + ")";
        document.getElementById(id).innerText="" ;
    }
}
function addClearClass(id) {
    document.getElementById(id).classList.add('addClearClass');
}



//canvas
function docanvas() {
    //先跟HTML畫面產生關聯(尋找物件)
    //開始畫canvas
    designReady = true;
    var canvas = document.getElementById('bagcanvas');
    var context = canvas.getContext('2d');
    //遮罩 _index為全域變數
    var forClips = document.getElementById('dropzone').firstElementChild.className;
    var mobforClips = document.getElementById('mobdropzone').firstElementChild.className;

    var svgStr1 = (new XMLSerializer()).serializeToString(document.getElementById("svg" + _index));
    var canvasBlock = new fabric.Canvas('bagcanvas');
    var path = fabric.loadSVGFromString(svgStr1, function (objects, options) {
        var obj = fabric.util.groupSVGElements(objects, options);
        canvasBlock.add(obj).renderAll();
    })


    var large2 = new Image();//包包
    // var dropzoneContentimage1 = new Image();//文字
    var dropzoneContentimage2 = new Image();//官方貼圖
    var dropzoneContentimage3 = new Image();//自己上傳圖片

    var mobdropzoneContentimage1 = new Image();//文字
    var mobdropzoneContentimage2 = new Image();//官方貼圖
    var mobdropzoneContentimage3 = new Image();//自己上傳圖片
    




    large2.src = document.getElementById("large2").src;
    dropzoneContentimage1.value= document.getElementById("dropzoneContentimage1").innerHTML;
    dropzoneContentimage2.src = document.getElementById("dropzoneContentimage2").src;
    dropzoneContentimage3.src = document.getElementById("dropzoneContentimage3").src;

    large4.src = document.getElementById("large4").src;
    mobdropzoneContentimage2.src = document.getElementById("mobdropzoneContentimage2").src;
    mobdropzoneContentimage3.src = document.getElementById("mobdropzoneContentimage3").src;
   


    var ah = document.querySelectorAll(".dropzoneContent")[0].offsetHeight;
    var aw = document.querySelectorAll(".dropzoneContent")[0].offsetWidth;

    var ah2 = document.querySelectorAll(".dropzoneContent")[1].offsetHeight;
    var aw2 = document.querySelectorAll(".dropzoneContent")[1].offsetWidth;




    let th = dropzoneContentimage1.getBoundingClientRect().height;
    let tw = dropzoneContentimage1.getBoundingClientRect().width;
    
    // var th = document.getElementById("dropzoneContent1").offsetHeight;
    // var tw = document.getElementById("dropzoneContent1").offsetWidth;
    //手機
    var mobth = document.getElementById("mobdropzoneContent1").offsetHeight;
    var mobtw = document.getElementById("mobdropzoneContent1").offsetWidth;


    var eh = document.getElementById("dropzoneContent2").offsetHeight;
    var ew = document.getElementById("dropzoneContent2").offsetWidth;
    //手機
    var mobeh = document.getElementById("mobdropzoneContent2").offsetHeight;
    var mobew = document.getElementById("mobdropzoneContent2").offsetWidth;



    var mh = document.getElementById("dropzoneContent3").offsetHeight;
    var mw = document.getElementById("dropzoneContent3").offsetWidth;
    //手機
    var mobmh = document.getElementById("mobdropzoneContent3").offsetHeight;
    var mobmw = document.getElementById("mobdropzoneContent3").offsetWidth;




    stc = sclY1;
    rtc = rotY1;
    const tangle = rtc * Math.PI / 180; 

    sec = sclY2;
    rec = rotY2;
    const eangle = rec * Math.PI / 180; 

    smc = sclY3;
    rmc = rotY3;
    const mangle = rmc * Math.PI / 180; 

    var cth = th / ah * 400;
    var ctw = tw / aw * 400;
    var ceh = eh / ah * 400 * sec;
    var cew = ew / aw * 400 * sec;
    var cmh = mh / ah * 400 * smc;
    var cmw = mw / aw * 400 * smc;

    var mobcth = mobth / ah2 * 400 * stc;
    var mobctw = mobtw / aw2 * 400 * stc;
    var mobceh = mobeh / ah2 * 400 * sec;
    var mobcew = mobew / aw2 * 400 * sec;
    var mobcmh = mobmh / ah2 * 400 * smc;
    var mobcmw = mobmw / aw2 * 400 * smc;

    
    
    


    let tl = dropzoneContentimage1.getBoundingClientRect().left - document.querySelectorAll(".dropzoneContent")[0].getBoundingClientRect().left;
    let tt = dropzoneContentimage1.getBoundingClientRect().top - document.querySelectorAll(".dropzoneContent")[0].getBoundingClientRect().top;
    // var tt = document.querySelector("#dropzoneContent1").offsetTop;
    // var tl = document.querySelector("#dropzoneContent1").offsetLeft;

    var mobtt = document.querySelector("#mobdropzoneContent1").offsetTop;
    var mobtl = document.querySelector("#mobdropzoneContent1").offsetLeft;





    var et = document.querySelector("#dropzoneContent2").offsetTop;
    var el = document.querySelector("#dropzoneContent2").offsetLeft;

    var mobet = document.querySelector("#mobdropzoneContent2").offsetTop;
    var mobel = document.querySelector("#mobdropzoneContent2").offsetLeft;




    var mt = document.querySelector("#dropzoneContent3").offsetTop;
    var ml = document.querySelector("#dropzoneContent3").offsetLeft;

    var mobmt = document.querySelector("#mobdropzoneContent3").offsetTop;
    var mobml = document.querySelector("#mobdropzoneContent3").offsetLeft;


    // var ctt = (tt + (th / 2)) * (400 / ah) - (cth / 2);
    // var ctl = (tl + (tw / 2)) * (400 / aw) - (ctw / 2);

    
    var ctt = (tt + (th / 2)) * (400 / ah);
    var ctl = (tl + (tw / 2)) * (400 / aw);
    var cet = (et + (eh / 2)) * (400 / ah) - (ceh / 2);
    var cel = (el + (ew / 2)) * (400 / aw) - (cew / 2);
    var cmt = (mt + (mh / 2)) * (400 / ah) - (cmh / 2);
    var cml = (ml + (mw / 2)) * (400 / aw) - (cmw / 2);


    var mobctt = (mobtt + (mobth / 2)) * (400 / ah2) - (mobcth / 2);
    var mobctl = (mobtl + (mobtw / 2)) * (400 / aw2) - (mobctw / 2);
    var mobcet = (mobet + (mobeh / 2)) * (400 / ah2) - (mobceh / 2);
    var mobcel = (mobel + (mobew / 2)) * (400 / aw2) - (mobcew / 2);
    var mobcmt = (mobmt + (mobmh / 2)) * (400 / ah2) - (mobcmh / 2);
    var mobcml = (mobml + (mobmw / 2)) * (400 / aw2) - (mobcmw / 2);
    // var ah=document.querySelectorAll()


    // var mobcel = (mobel + (mobew / 2)) / aw2 * 400;
    // var mobcet = (mobet + (mobeh / 2)) / ah2 * 400;


    // dropzoneContentimage1.addEventListener('load', contextCanvas);
    dropzoneContentimage2.addEventListener('load', contextCanvas);
    dropzoneContentimage3.addEventListener('load', contextCanvas);
    
    mobdropzoneContentimage2.addEventListener('load', contextCanvas);
    mobdropzoneContentimage3.addEventListener('load', contextCanvas);

    contextCanvas();

    function contextCanvas() {
        // alert();
        context.clip();
        //先畫包包
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.drawImage(large2, 0, 0, canvas.width, canvas.height);
        // context.drawImage(large4, 0, 0, canvas.width, canvas.height);
        // context.drawImage(dropzoneContentimage3, 0, 0,cew, ceh);

        //先畫文字
        context.translate((ctl + ctw / 2), (ctt + cth / 1.2));
        context.rotate(tangle);
           context.font = `${36 * sclY1}px 微軟正黑體`;
        context.fillText(dropzoneContentimage1.value, -ctw / 2, -cth / 2);
        context.rotate(-tangle);
        context.translate(-(ctl + ctw / 2), -(ctt + cth / 1.2));
       //在畫官方貼圖
        context.translate((cel + cew / 2), (cet + ceh / 2));
        context.rotate(eangle);
        context.drawImage(dropzoneContentimage2, -cew / 2, -ceh / 2, cew, ceh);
        context.rotate(-eangle);
        context.translate(-(cel + cew / 2), -(cet + ceh / 2));
        //最後畫自己上傳的圖
        context.translate((cml + cmw / 2), (cmt + cmh / 2));
        context.rotate(mangle);
        context.drawImage(dropzoneContentimage3, -cmw / 2, -cmh / 2, cmw, cmh);
        context.rotate(-mangle);
        context.translate(-(cml + cmw / 2), -(cmt + cmh / 2));
  



        context.translate((mobcel + mobcew / 2), (mobcet + mobceh / 2));
        // context.translate(mobcel, mobcet);
        context.rotate(eangle);
        context.drawImage(mobdropzoneContentimage2, -mobcew / 2, -mobceh / 2, mobcew, mobceh);
        context.rotate(-eangle);
        context.translate(-(mobcel + mobcew / 2), -(mobcet + mobceh / 2));
        // context.translate(-mobcel, -mobcet);

        context.translate((mobcml + mobcmw / 2), (mobcmt + mobcmh / 2));
        context.rotate(mangle);
        context.drawImage(mobdropzoneContentimage3, -mobcmw / 2, -mobcmh / 2, mobcmw, mobcmh);
        context.rotate(-mangle);
        context.translate(-(mobcml + mobcmw / 2), -(mobcmt + mobcmh / 2));        

    }
}

//拖曳功能
$(function() {
    $("#dropzoneContent1").draggable({ containment: "parent", scroll: false });
    $("#dropzoneContent2").draggable({ containment: "parent", scroll: false });
    $("#dropzoneContent3").draggable({ containment: "parent", scroll: false });

    $("#mobdropzoneContent1").draggable({ containment: "parent", scroll: false });
    $("#mobdropzoneContent2").draggable({ containment: "parent", scroll: false });
    $("#mobdropzoneContent3").draggable({ containment: "parent", scroll: false });
    $("#mobimage").draggable({ containment: "parent", scroll: false });
});

function saveImage() {
    var canvas = document.getElementById("bagcanvas");
    var dataURL = canvas.toDataURL("image/png");
    document.getElementById('hidden_data').value = dataURL;
    var formData = new FormData(document.forms["form1"]);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'canvas_load_save.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                picname=xhr.responseText;
                document.getElementById("custImgDownload").href = picname;
                document.getElementById("mobcustImgDownload").href = picname;

                document.getElementById("large3").src = picname;
                document.getElementById("largefinall").src = picname;

                
                // alert('存取圖片成功~');
            } else {
                alert(xhr.status);
            }
        }
    };
    xhr.send(formData);
    var contentMsg = document.getElementsByClassName('contentMsg')[0];
    contentMsg.innerText = '您的包包製作完畢';
    showLoginAlert(loginAlert);
    var addClearClasss = document.querySelectorAll('.addClearClass');
    for (let k = addClearClasss.length-1; k >= 0 ; k--) {
        addClearClasss[k].classList.remove('addClearClass');
    }
    var custProduct = document.querySelector('.custProduct');
    custProduct.classList.add('onlyForBlock');
}





//我是電腦板的頁籤//////////////////////
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "flex";
    evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();


// 我是手機板的頁籤
$(document).ready(function () {
    $('.accordion').click(function () {
        var change = $(this).index('.accordion');
        $('.bookmark').eq(change).slideToggle().siblings('.bookmark').hide();
    });
});



//臨時購物車
var storage = localStorage;
//抓取被click的商品
function tempCart() {
    if (storage['addItemListForCust'] == null) {
        storage['addItemListForCust'] = '';	
        	//storage.setItem('addItemListForCust','');
    }
    //幫每個Add Cart建事件聆聽的功能
    var list = document.querySelectorAll('.addpro');	//list是陣列
    let itemQty = storage['addItemListForCust'].split(',').length;
    for (var i = 0; i < list.length; i++) {
        list[i].addEventListener('click', function (e) {
            
            
            

            

            var productInfo = document.querySelector('#'+this.id+' input').value;
            if (storage['addItemListForCust'] == null) {
                storage['addItemListForCust'] = '';		//storage.setItem('addItemListForCust','');
            }
            addItem(this.id,productInfo);






            if (itemQty <= 4 && !e.target.closest('.flex').classList.contains('flexBright')) {
                e.target.closest('.flex').classList.add('flexBright');
                itemQty++;
            } else if (itemQty <= 5 && e.target.closest('.flex').classList.contains('flexBright')) {
                e.target.closest('.flex').classList.remove('flexBright');
                itemQty--;
            } 

        });
    }
}

//將商品資訊丟入上方
function addItem(itemId, itemValue) {
    //計算購買數量和小計
    var itemString = storage.getItem('addItemListForCust');
    var items = itemString.substr(0, itemString.length - 2).split(', ');

    // alert(itemId+' : '+itemValue);
    var image = document.createElement('img');
    image.src = '' + itemValue.split('|')[1];

    var title = document.createElement('span');
    title.innerText = itemValue.split('|')[0];

    var price = document.createElement('span');
    price.innerText = itemValue.split('|')[2];

    var newItem = document.getElementById('newItem');

    //先判斷此處是否已有物件，如果有要先刪除
    if (newItem.hasChildNodes()) {
        while (newItem.childNodes.length >= 1) {
            newItem.removeChild(newItem.firstChild);
        }
    }

    //再顯示新物件
    newItem.appendChild(image);
    newItem.appendChild(title);
    newItem.appendChild(price);

    //存入storage
    if (storage[itemId]) {
        storage.removeItem(itemId);
        storage['addItemListForCust'] = storage['addItemListForCust'].replace(itemId + ', ', '');

        var newItem = document.getElementById('newItem');
        newItem.removeChild(newItem.firstChild);
        newItem.removeChild(newItem.firstChild);
        newItem.removeChild(newItem.firstChild);



        // alert('你已加入購物車~');
    } else {
        if (items.length == 4) {
            // alert("too many");
            // for(let i=0; i<newItem.childNodes.length;i++){
            //     newItem.removeChild(newItem.firstChild);
            // }
            var contentMsg = document.getElementsByClassName('contentMsg')[0];
            contentMsg.innerText = '你買超過四樣囉';
            showLoginAlert(loginAlert);

            for (let i = newItem.childNodes.length - 1; i >= 0; i--) {
                newItem.removeChild(newItem.firstChild);
            }
            return;
        }
        storage[itemId] = itemValue;
        storage['addItemListForCust'] += itemId + ', ';
    }

    // //計算購買數量和小計
    itemString = storage.getItem('addItemListForCust');
    items = itemString.substr(0, itemString.length - 2).split(', ');

    //不讓商品價錢累加
    subtotal = parseInt(storage['packagePrice']);
    // document.getElementById('subtotal2').innerText = subtotal;


    if (storage['addItemListForCust'] != '') {
        for (var key in items) {		//use items[key]
            var itemInfo = storage.getItem(items[key]);

            subtotal += parseInt(itemInfo.split('|')[2]);
            document.getElementById('subtotal2').innerText = subtotal;


        }
    }

    if (storage['addItemListForCust'] == "") {
        document.getElementById('itemCount').innerText = 0;

    } else {
        document.getElementById('itemCount').innerText = items.length;

    }
    // subtotal += parseInt(storage["packagePrice"]);
    
    
    // subtotal += storage["custCart"];
    document.getElementById('subtotal').innerText = subtotal;


    // storage['custCart'] = storage['custCart'].replace(dropzoneContentimage1.innerText + ', ', '');
    // storage['custCart'] += subtotal.toString();

}

var custBagName1 = document.getElementsByClassName('custBagName1')[0];
var custBagName2 = document.getElementsByClassName('custBagName2')[0];

var custBagName3 = document.getElementsByClassName('custBagName1')[1];
var custBagName4 = document.getElementsByClassName('custBagName2')[2];

custBagName2.innerText = "您選擇的包包";
custBagName4.innerText = "您選擇的包包";

// custBagName1.addEventListener('keyup', custBagNameChange);
// custBagName3.addEventListener('keyup', custBagNameChange);


//包包名字若沒填寫時給予初值
function custBagNameChange() {
    var custBagName1 = document.getElementsByClassName('custBagName1')[0];
    var custBagName2 = document.getElementsByClassName('custBagName2')[0];

    // var custBagName3 = document.getElementsByClassName('custBagName1')[1];
    // var custBagName4 = document.getElementsByClassName('custBagName2')[1];

    custBagName2.innerText = custBagName1.value;
    // custBagName4.innerText = custBagName3.value;

    custBagName2.toString();
    // custBagName4.toString();

    
    if (custBagName1.value==0){
        custBagName2.innerText ="您選擇的包包";
    }
    document.getElementById('custBagName3').innerText = custBagName2.innerText;
}

var mobputWord2 = document.getElementById('mobputWord2');
mobputWord2.addEventListener('click',textToName,false);

var putWord3 = document.getElementById('putWord3');
putWord3.addEventListener('click', textToName, false);

function textToName() {
    var custBagName1 = document.getElementsByClassName('custBagName1')[0];
    var custBagName2 = document.getElementsByClassName('custBagName2')[0];
    //手機
    var custBagName3 = document.getElementsByClassName('custBagName1')[1];
    var custBagName4 = document.getElementsByClassName('custBagName2')[2];
    var custBagName5 = document.getElementsByClassName('custBagName2')[1];

    custBagName2.innerText = custBagName1.value;
    custBagName5.innerText = custBagName1.value;
    custBagName4.innerText = custBagName3.value;
    if (custBagName3.value==""){
        custBagName4.innerText=="您的包包";
    }
    // if (custBagName1.value == "") {
    //     custBagName2.innerText == "您的包包";
    // }
}


// 滾動效果左
function slideLine2(box, stf, delay, speed, h, h2)//多了第6個參數h2 是裡面各元素的高度
{
    var slideBox = document.getElementById(box);
    var speed = speed || 20, h = h || 20, h2 = h2 || 20;//h2也加個預設值
    var tid = null, pause = false;
    var s = function () { tid = setInterval(slide, speed); }
    var slide = function () {
        if (pause) return;

        slideBox.scrollTop += 1;
        if (slideBox.scrollTop % h == 0) {
            clearInterval(tid);

            for (var j = 0; j < h; j += h2) {//依據外面包住的div高度 跟裡面各元素的高度 判斷一次要移幾個到後面
                slideBox.appendChild(slideBox.getElementsByTagName(stf)[0]);
            }

            slideBox.scrollTop = 0;
            setTimeout(s, 0);
        }
    }
    slideBox.onmouseover = function () { pause = true; }
    slideBox.onmouseout = function () { pause = false; }
    setTimeout(s, 1000);
}
slideLine2('ann_box3', 'div', 2000, 20, 1000, 250);



// 滾動效果右
function slideLine2(box, stf, delay, speed, h, h2)//多了第6個參數h2 是裡面各元素的高度
{
    var slideBox = document.getElementById(box);
    var speed = speed || 20, h = h || 20, h2 = h2 || 20;//h2也加個預設值
    var tid = null, pause = false;
    var s = function () { tid = setInterval(slide, speed); }
    var slide = function () {
        if (pause) return;

        slideBox.scrollTop += 1;
        if (slideBox.scrollTop % h == 0) {
            clearInterval(tid);

            for (var j = 0; j < h; j += h2) {//依據外面包住的div高度 跟裡面各元素的高度 判斷一次要移幾個到後面
                slideBox.appendChild(slideBox.getElementsByTagName(stf)[0]);
            }

            slideBox.scrollTop = 0;
            setTimeout(s, 0);
        }
    }
    slideBox.onmouseover = function () { pause = true; }
    slideBox.onmouseout = function () { pause = false; }
    setTimeout(s, 1000);
}
slideLine2('ann_aox3', 'div', 2000, 20, 1000, 250);


//點擊商品時給遮罩
// $('.flex').click(function () {
//     $(this).toggleClass('flexBright');

// })

$('.btnsmall').click(function () {
    $('.flexBright2').removeClass('flexBright2');
    $(this).addClass('flexBright2');
})



//重新刷新時應給予遮罩
function addClassFlex() {
    //存入storage
    if (storage['addItemListForCust'] != '') {
        // storage.addclass('flexBright');
        var list = document.querySelectorAll('.addpro');	//list是陣列
        for (var i = 0; i < list.length; i++) {

                if (storage['addItemListForCust'].indexOf(list[i].id)!=-1) {
                    
                    list[i].parentNode.classList.toggle('flexBright');
                }
        }        
    } 
}



//會員檢查
function checkMember () {
    putInfoToDB = document.getElementById('putInfoToDB');
    step3Button = document.getElementById('step3Button');
    
    
    var contentMsg = document.getElementsByClassName('contentMsg')[0];
    if (loginCheck()==0) {
        contentMsg.innerText = '尚未登入， 請先登入';
         showLoginAlert(loginAlert);
    }else{
        if (designReady == false){
            // alert("你忘了按設計完成囉");
            contentMsg.innerText = '你忘了按設計完成囉';
            showLoginAlert(loginAlert);

            return;
        }
        var xhr2 = new XMLHttpRequest();
        xhr2.onload = function () {
            if (xhr2.status == 200) {
                
                custProductId = xhr2.responseText;
                
                contentMsg.innerText = '已加入購物車';
                showLoginAlert(loginAlert);
                // storage['custCart'] = custBagName2.innerText+'|' + parseInt(subtotal) + '|' + picname + '|'+storage['addItemListForCust'];
                storage['custProductId'] = custBagName2.innerText + '|' + parseInt(subtotal) + '|' + picname + '|' + custProductId;
                storage['cust_'+custProductId] = custBagName2.innerText + '|' + parseInt(subtotal) + '|' + picname + '|' + custProductId;
                storage['addItemList'] += 'cust_'+custProductId+', ';
                
                // storage.removeItem(itemId);
                let list = storage['addItemListForCust'].split(', ');
                console.log(list);
                console.log(list.length);
                for (let i = 0; i < list.length; i++) {
                    storage.removeItem(list[i]);
                }
                storage['addItemListForCust']="";

                // cartPlus();  

            } else {
                alert(xhr2.status);
            }
        }
        //抓包包名稱，價錢
         if (window.matchMedia("(min-width: 1200px)").matches) {
            var custProName = document.getElementById("custBagName2").innerText;
        } else {
            var custProName = document.getElementById("mobcustBagName2").innerText;
        }
        // var custProName = document.getElementById("custBagName2").innerHTML;
        
        // var bagmoney = document.getElementById("subtotal").innerHTML;
        // var _index2=_index+1;
        var url = "php/creatCustProduct.php?name=" + custProName + "&price=" + subtotal + "&bag_id=" + 1 + "&image_path=" + picname ;
        
        xhr2.open("Get", url, true);
        xhr2.send(null);

        var step3s = document.getElementsByClassName('step3');
        var step4s = document.getElementsByClassName('step4');
        step3s[0].style.display = 'none';
        step4s[0].style.display = 'block';
        addToCart = true;


    }        
    // }
} 

putInfoToDB.addEventListener('click', checkMember, false);
step3Button.addEventListener('click', checkMember, false);



//更改上下架
function updateCustProduct() {

    var contentMsg = document.querySelector('.contentMsg'); 
    if (addToCart == false) {
        contentMsg.innerText = '還沒加入購物車啦!';
        showLoginAlert(loginAlert);        
    } else if (addToCart == true) {
        var xhr = new XMLHttpRequest();
        xhr.onload=function () {
            if (xhr.status == 200) {
                contentMsg.innerText = '分享成功';
                showLoginAlert(loginAlert);
                // alert("分享成功");
            }else{
                alert(xhr.status);
            }
        }
        var url="php/updateCustProduct.php";
        xhr.open("GET",url,true);
        xhr.send(null);
        setTimeout(function(){location.href = "products-main.php?tab_btn=0#custedProd";},1000);
    }

} 
var updateButton = document.getElementById('updateButton');
updateButton.addEventListener('click', updateCustProduct);


// $(document).ready(function () {
//     $('#dropzone').mousemove(function (e) {
//         $('#theDiv').text()('X: '+e.pageX+' |Y: '+e.pageY);
//     });
// })

// $(document).ready(function () {
//     $('.flex').slick({
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         arrows: false,
//         fade: true,
//         asNavFor: '.slider-nav'
//   });
// });

$(".owl-carousel").each(function(){
    $(this).owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })

    $(this).parent().siblings().find('.next').click(function () {
        $(this).parent().siblings().find('.owl-carousel').trigger('next.owl.carousel');
    });
    $(this).parent().siblings().find('.prev').click(function () {
        $(this).parent().siblings().find('.owl-carousel').trigger('prev.owl.carousel');
    });
})


