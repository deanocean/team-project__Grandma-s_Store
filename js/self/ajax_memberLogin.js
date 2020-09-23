var jsonObj;

function memberLogin() { 
    //點擊子登入按鈕，並登入
    //使用ajax 回server端，取回登入者姓名，放到頁面上
    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
        if (xhr.status == 200) {
            if( xhr.responseText == "not found" ){
                alert("帳密錯誤");
            }else if(xhr.responseText == "disable"){
                alert("此帳號已停用");
            }else if(xhr.responseText == "error"){
                alert("系統錯誤");
            }else{ //帳密登入成功  
                jsonObj = JSON.parse(xhr.responseText);
                console.log(jsonObj);
                document.getElementById('navMember').innerText = jsonObj.account;
                document.getElementById('spanLogin').innerText = "登出";
                document.getElementById('memBtn').style.display = "block";
                //關閉燈箱，並將登入表單上的資料清空
                var formLogin = document.getElementById('form_login');
                formLogin.style.display = "none";
                document.getElementById('loginAcount').value = "";
                document.getElementById('loginPass').value = "";
                $('.show_login_light_box_bg').slideToggle();
                //判斷發起活動是否存在此頁面
                if (document.querySelector('#create .event-member')){
                    document.querySelector('#create .event-member img').src = jsonObj.image_path;
                    document.querySelector('#create .event-member span').innerText = jsonObj.name;
                }
            }
        } else {
            alert(xhr.status);
        }
    }

    var url = "php/ajaxLogin.php";
    xhr.open("post", url, false);

    var account = document.getElementById("loginAcount");
    var password = document.getElementById("loginPass");

    var data_info = `account=${account.value}&password=${password.value}`;

    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send(data_info);

}


//20181226
function resetPassword() { 
    var xhr = new XMLHttpRequest();  
    xhr.onload = function () {
        if (xhr.status == 200) {
            if( xhr.responseText.startsWith("訊息") ){
                alert(xhr.responseText);
            }else{  
                alert(xhr.responseText);
                //將登入表單上的資料清空
                document.getElementById('loginAcount').value = "";
                document.getElementById('loginPass').value = "";        
                document.getElementById('recoverPsw').value = "";
                document.getElementById('recoverEmail').value = "";
                document.getElementById('recoverPswConfirm').value = "";
                var formContainer = $('#formContainer');
                formContainer.toggleClass('flipped');
            }
        }else{
            alert(xhr.status);
        }
    }
   
    var url = "php/ajaxResetPassword.php";
    xhr.open("post", url, false);
   
    var account = document.getElementById("loginAcount");
    var password = document.getElementById("recoverPsw");
    var email = document.getElementById("recoverEmail");
   
    var data_info = `account=${account.value}&password=${password.value}&email=${email.value}`;
   
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send(data_info);
}


function showLoginBox(visit=0) { //點擊登入按鈕，顯示燈箱
    //檢查session是否存在
    //如果不存在，代表未登入，那就顯示登入用燈箱
    //如果存在，代表已登入
    //將登入bar面板上，登入者資料清空
    //spanLogin的字改成登入
    //將使用者資料的session清掉
    //將input裡的使用者資料清掉
    //從loginCheck.php取得sessoin存在的證據
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){ //server執行完畢
            if(xhr.status == 200){ //正確執行完畢
                judgeLogin(xhr.responseText,visit);//判斷session是否存在
            }else{
            alert(xhr.status);
            } //xhr.status
        }//xhr.readyState
    }

    var url = "php/ajaxLoginCheck.php";
    xhr.open("post", url, true);

    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send("");

}

function judgeLogin(xhrText,visit) { //判斷session是否存在
    if (xhrText != "Not logging in"){ //已登入，所以要登出
        if (visit == "first_visit"){ 
            //已登入過，所以一loading進來時就顯示 會員名字+登出 & 會員發起活動的資訊
            jsonObj = JSON.parse(xhrText);
            console.log(jsonObj.image_path);
            document.getElementById('navMember').innerText = jsonObj.account;
            document.getElementById('spanLogin').innerText = "登出";
            document.getElementById('memBtn').style.display = "block";

            //判斷發起活動是否存在此頁面
            if (document.querySelector('#create .event-member')) {
                document.querySelector('#create .event-member img').src = jsonObj.image_path;
                document.querySelector('#create .event-member span').innerText = jsonObj.name;
            }
        }else{ //做登出的動作
            var xhr = new XMLHttpRequest();

            xhr.onload = function () {
                document.getElementById('navMember').innerHTML = "&nbsp";
                document.getElementById('spanLogin').innerText = "登入";
                document.getElementById('memBtn').style.display = "none";
            }
            var url = "php/ajaxLogout.php";
            xhr.open("post", url, true);

            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhr.send("");


            //判斷發起活動是否存在此頁面
            if (document.querySelector('#create .event-member')) {
                document.querySelector('#create .event-member img').src = 'img/guest.jpg';
                document.querySelector('#create .event-member span').innerText = "訪客";
            }

            //20190105
            if (location.pathname.indexOf('member.php')!=-1) {
                document.location.href="homepage.php"
            }

        }
    }else{ //未登入
        //打開燈箱
        if (visit != "first_visit"){
            var formLogin = document.getElementById('form_login');
            formLogin.style.display = "block";
        }
    }
}

function cancelLogin(){
    //將登入表單上的資料清空，並將燈箱隱藏起來
    document.getElementById('form_login').style.display = "none";
    document.getElementById('loginAcount').value = "";
    document.getElementById('loginPass').value = "";
}

function CloseRegister(){
    //將登入表單上的資料清空，並將燈箱隱藏起來
    var formRegister = document.getElementById('form_register');
    formRegister.style.display = "none";
    document.getElementById('txtAccount').value = "";
    document.getElementById('txtPassword').value = "";        
    document.getElementById('txtConfirmPassword').value = "";
    document.getElementById('txtEmail').value = "";
}

//20181227
function showRegisterBox() {
    cancelLogin();
    var formRegister = document.getElementById('form_register');
    formRegister.style.display = "block";
}

function $id(id){
    return document.getElementById(id);
}  

function MemRegDataValidate(){
   
    var account = $id("txtAccount");
    var password = $id("txtPassword");
    var confirmPsw = $id("txtConfirmPassword");
    var email = $id("txtEmail");
  
    if( account.value==""){
        alert("請填寫帳號");
        account.focus();
        return;
    }
  
    //檢查帳號不得低於2碼
    if( account.value.length<2){
        alert("帳號不得低於2碼");
        account.focus();
        return;
    }

    if( password.value==""){
        alert("請填寫密碼");
        password.select();
        return;
    }

    //檢查密碼不得低於4碼
    if( password.value.length<4){
        alert("密碼不得低於4碼");
        password.select();
        return;
    }

    if( confirmPsw.value==""){
        alert("請填寫確認密碼");
        confirmPsw.select();
        return;
    }

    if( confirmPsw.value.length<4){
        alert("確認密碼不得低於4碼");
        confirmPsw.select();
        return;
    }

    if( password.value!=confirmPsw.value){
        alert("密碼與確認密碼不符");
        confirmPsw.select();
        return;
    }

    if( email.value==""){
        alert("請填寫email");
        email.focus();
        return;
    }

    if( !validateEmail(email.value)){
        alert("請填寫正確的email格式");
        email.focus();
        return;
    }

    //正確就寫入資料庫
    add_member();

}

function validateEmail(str_email) {
    var emailRule = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
    return emailRule.test(String(str_email).toLowerCase());
}

function add_member(){
    var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){    
            if(xhr.responseText.startsWith("訊息:")){
                alert(xhr.responseText);
            }
            else{
                alert(xhr.responseText);
                //關閉燈箱，並將註冊表單上的資料清空
                var formRegister = document.getElementById('form_register');
                formRegister.style.display = "none";
                document.getElementById('txtAccount').value = "";
                document.getElementById('txtPassword').value = "";        
                document.getElementById('txtConfirmPassword').value = "";
                document.getElementById('txtEmail').value = "";
                $('.show_register_light_box_bg').slideToggle();
            }
           
        }else{
            alert( xhr.status );
        }
    }
    var account=document.getElementById("txtAccount").value;
    var password=document.getElementById("txtPassword").value;
    var email=document.getElementById("txtEmail").value;
    
    var url = "php/add_member.php?account=" + account+"&password="+password+"&email="+email;
    xhr.open("Get", url, true);
    xhr.send( null );
}

function init(){
    //loading進來時就先判斷session是否存在，
    //以決定spanLogin上要顯示登入或是登出
    showLoginBox("first_visit");
    
    // 點擊登入按鈕，顯示燈箱
    var NavloginBtn = document.getElementById('NavloginBtn');
    NavloginBtn.addEventListener('click', showLoginBox);

    //點擊子登入按鈕，並登入
    var btnLogin = document.getElementById('btnLogin');
    btnLogin.addEventListener('click', memberLogin);


    $('#NavloginBtn').click(function () {
        let login_state=document.getElementById('spanLogin').innerHTML;
        if(login_state=='登入'){
            $('.show_login_light_box_bg').stop().slideToggle();
            $('#form_login').slideToggle();
        }  
    })

    $('.show_login_light_box_bg').click(function () {
        $('#form_login').slideToggle();
        $('.show_login_light_box_bg').slideToggle();
    })

    $('#btnCancel').click(function () {
        $('#form_login').slideToggle();
        $('.show_login_light_box_bg').slideToggle();
    })
    $('#btnCancel2').click(function () {
        $('#form_login').slideToggle();
        $('.show_login_light_box_bg').slideToggle();
    })
    // ----------------------------------------------------
  
    $('#ShowMemberRegister').click(function () {
        $('#form_login').slideToggle();
        $('.show_login_light_box_bg').slideToggle();
        $('#form_register').slideToggle();
        $('.show_register_light_box_bg').slideToggle();
    })
    $('.show_register_light_box_bg').click(function () {
        $('#form_register').slideToggle();
        $('.show_register_light_box_bg').slideToggle();
    })
    $('#btnCloseRegister').click(function () {
        $('#form_register').slideToggle();
        $('.show_register_light_box_bg').slideToggle();
    })

    

    //20181231
    var keyboard_login = document.getElementById("loginPass");
    keyboard_login.addEventListener("keyup", 
        function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.getElementById("btnLogin").click();
            }
        }
    );

    //20181231
    var keyboard_register = document.getElementById("txtEmail");
    keyboard_register.addEventListener("keyup", 
        function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.getElementById("btnSendMemRegData").click();
            }
        }
    );



    //點擊取消按鈕，關閉燈箱
    // var btnCancel = document.getElementById('btnCancel');
    // btnCancel.addEventListener('click', cancelLogin);
    // var btnCancel2 = document.getElementById('btnCancel2');
    // btnCancel2.addEventListener('click', cancelLogin);


    //點擊取消按鈕，關閉燈箱
    var btnCloseRegister = document.querySelector('#btnCloseRegister');
    btnCloseRegister.addEventListener('click', CloseRegister);

    //20181227
    //點擊重設密碼的「驗證更新」按鈕，進行帳號&E-mail驗證並更新密碼
    var btnResetPassword = document.getElementById('pswEma');
    btnResetPassword.addEventListener('click', resetPassword);

    //20181227
    var btnMemberRegister = document.getElementById('ShowMemberRegister');
    btnMemberRegister.addEventListener('click', showRegisterBox);
    var btnSendMemRegData = document.getElementById('btnSendMemRegData');
    btnSendMemRegData.addEventListener('click', MemRegDataValidate);
}

window.addEventListener("load", init);