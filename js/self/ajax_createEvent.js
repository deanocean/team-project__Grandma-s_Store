//找到select的物件，註冊select
var boxType = document.getElementById('boxType');
var selected_pic = document.getElementById('selected-pic');
var createBoxImg = [];


function changeImg()  { 

    // select onchange時，圖片的select跟圖片會動

    // select 的value 傳到 後端

    // php用switch判斷活動類型

    // json值傳回前端，放在select和圖片裡面


    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
        createBoxImg = [];
        var path = xhr.responseText.split("|"); //[]
        for (var i in path) {
            createBoxImg.push(JSON.parse(path[i])); //[]
        }
        // console.log("json : " + createBoxImg[0]);
    }

    var url = "php/ajax_createEvent.php";

    //XMLHttpRequest 的方法之一 open('method','url',async)
    //開啟對伺服器的連結
    xhr.open('POST', url, false);

    //XMLHttpRequest 的方法之一 setRequestHeader('head','value')
    //設定HTTP請求的請求標頭，如果使用post 方法 則必續設定!!
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    //XMLHttpRequest 的方法之一 send('content')
    //向伺服器發送請求，並將資料送到伺服器端
    //get方法時:xhr.send(null)
    //post方法時：xhr.send(data_info)　 字串形式
    var data_info = "boxType=" + boxType.value;
    xhr.send(data_info);

}


function changeCreateImg() {
    document.getElementById('user-pic-select').options[0].selected="selected";
    selected_pic.src = createBoxImg[0];
    // console.log("createBoxImg[0]:"+createBoxImg[0]);
    
    var desc_image01_path =  document.getElementById('selected-pic').getAttribute("src");
    
    document.getElementById('hiddenImg').setAttribute("value",desc_image01_path);
    // console.log("desc_image01_path:" + desc_image01_path);
}

function createBoxInit(){
    console.log("boxType.value : "+boxType.value);
    changeImg();
    console.log("createBoxImg[0] : "+createBoxImg[0]);
    changeCreateImg();
    boxType.addEventListener('change',changeImg, false);
    boxType.addEventListener('change',changeCreateImg, false);

    var createType = document.getElementById("createType"); 
    console.log("createType : " + createType);
    createType.addEventListener('change', changeImg, false);
    createType.addEventListener('change', changeCreateImg, false);

}

window.addEventListener("load",createBoxInit);




