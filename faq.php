<!DOCTYPE html>
<html>
<head>    
    <?php require_once("head.html"); ?>
    <title>阿婆柑仔店-常見問題</title>
</head>
<style>
body{
    min-width: 100%;
    height:750px;
    /* overflow: hidden; */
}
</style>
<body>

<?php require_once("nav.html"); ?>
<?php require_once("loginBox.html"); ?>

<!-- 網頁背景圖 -->
<div class="rwdbg">
    <img src="./img/section1/h1bg.png" alt="" class="rwdbg1">
</div>


<div class="slider3d">
    <div class="slider3d_wrap">
        <div class="blackboard">
            <div class="FAQ">
                <h1>會員登入/密碼</h1>
                <div id="QAcontent">
                    <div class="QA-answer">
                        <ul>
                            <li>
                                <h3>1.如何成為阿婆柑仔店的會員？</h3>
                                <p>請點選首頁右上方的『登入』，並輸入所需的資訊，進行註冊手續。</p>
                            </li>
                            <li>
                                <h3>2.如何變更您的密碼？</h3>
                                <p>請點選『我的帳戶』中的『變更您的個人資料』即可重新設定，密碼更改完畢後，請再重新登入。</p>
                            </li>
                            <li>
                                <h3>3.忘記密碼該怎麼辦？</h3>
                                <p>請點選『會員登入』中的『忘記密碼』，並依指示進行操作，密碼更改完畢後，請再重新登入。</p>
                            </li>
                        </ul>
                    </div>                  
                </div>
            </div>
        </div>
        <div class="blackboard">
            <div class="FAQ">
                <h1>購物常見問題</h1>
                <div id="QAcontent">
                    <div class="QA-answer">
                        <ul>
                            <li>
                                <h3>1.如何付款？</h3>
                                <p>貨到付款、銀行轉帳／ATM、信用卡（支援國內外Visa, Master, JCB）。</p>
                            </li>
                            <li>
                                <h3>2.訂單成立後多久會收到商品？</h3>
                                <p>確認訂單後，將在7個工作天內出貨。通知出貨後1-3日會配送到指定地址。（除預購與特定商品以外）</p>
                            </li>
                            <li>
                                <h3>3.如何修改配送地址？</h3>
                                <p>請與客服中心聯絡，如商品還未出貨，服務人員可協助您更改配送地址。</p>
                            </li>
                        </ul>
                    </div>                  
                </div>
            </div>
        </div>
        <div class="blackboard">
            <div class="FAQ">
                <h1>商品常見問題</h1>
                <div id="QAcontent">
                    <div class="QA-answer">
                        <ul>
                            <li>
                                <h3>1.網路商店與實體店舖的價格是否相同？</h3>
                                <p>基本上價格將與實體店舖相同。</p>
                            </li>
                            <li>
                                <h3>2.如何辦理退換貨？</h3>
                                <p>當您收到貨品之後，因本商城沒提供換貨服務（只有退貨服務），您可以利用退貨的方式，重新於線上訂貨，謝謝！</p>
                            </li>
                            <li>
                                <h3>3.商品訂錯，可以直接換購其他商品嗎？</h3>
                                <p>受限營運機制，無法直接以退補差額方式來換購其它商品，建議可考慮採退貨後重新訂購方式。</p>
                            </li>
                        </ul>
                    </div>                  
                </div>
            </div>
        </div>
        <div class="blackboard">
            <div class="FAQ">
                <h1>商品常見問題</h1>
                <div id="QAcontent">
                    <div class="QA-answer">
                        <ul>
                            <li>
                                <h3>4.收到商品有破損、瑕疵 怎麼辦？</h3>
                                <p>請在收貨3日內通知，將盡快安排更換。</p>
                            </li>
                            <li>
                                <h3>5.如何計算運費?</h3>
                                <p>單筆購買金額在1500元以下，酌收運費80元;單筆1500元以上即可享有免運優惠。</p>
                            </li>
                            <li>
                                <h3>6.否可送至郵局內租用信箱？</h3>
                                <p>因台灣郵局的郵政信箱僅接受郵局包裹，所以目前台灣官網沒有提供此項服務。</p>
                            </li>
                        </ul>
                    </div>                  
                </div>
            </div>
        </div>

     </div>
</div>

<!-- 左右按鈕 -->
<div class="slider3d_left"><img src="./img/faq/left.png" alt=""></div>
<div class="slider3d_right"><img src="./img/faq/right.png" alt=""></div>


 <!-- mailbox -->
 <div class="mailbox">
        <!-- <img src="./img/faq/mailto.png" alt="" class="mailto"> -->
        <img src="./img/faq/mailbox.png" alt="" class="mailimg">
        <!-- <img src="./img/faq/mailbox.gif" alt=""> -->
        <!-- <img src="./img/faq/mailbox.png" alt=""> -->
    <div class="mailbutton">
        寄信給我
    </div>
</div>
<!-- mailbox 燈箱 -->
<div class="sendmail">
        <ul>
            <li class="close-right">
               <span class="close"><i class="fas fa-times-circle btnCancel" class="btnCancel"></i></span>
            </li>
            <li class="label-mg"><label for="name">姓名</label></li>
            <li>
                <input type="text" placeholder="請輸入姓名" id="name">
            </li>
            <li class="label-mg"><label for="phone">手機</label></li>
            <li>
                <input type="email" placeholder="請輸入手機號碼" id="phone">
            </li>
            <li class="label-mg"><label for="mail">E-mail</label></li>
            <li>
                <input type="email" placeholder="請輸入e-mail" id="mail">
            </li>
            <li class="label-mg"><label for="mailcontent">內容</label></li>
            <li>
                <textarea name="" id="mailcontent" cols="30" rows="10"></textarea>
            </li>
            <li class="mailbtn">
            <!-- <input type="button" value="確認送出" class="btn"> -->
            <div class="btn">確認送出</div>
            </li>
        </ul> 
    </div> 
    
    <div class="faqfooter">
        <div id="footer">        
                Copyright&#9400;阿婆柑仔店, all rights reserved
        </div>
    </div>

    
</body>
<?php require_once("selfJs.html"); ?>

<script>
    const mail=document.querySelector('.mailbox');
    mail.addEventListener('click',mailtobox);
    function mailtobox(){  
        const box = document.querySelector('.sendmail');
        box.style.display = "block";   
        box.addEventListener('click',function(e){
            if(e.target.className == 'sendmail'){
                box.style.display = "none";
            }
        });
        const btn = document.querySelector('.mailbtn');
        btn.addEventListener('click',function(){
            box.style.display = "none";
            var contentMsg =document.querySelector('.contentMsg');
            contentMsg.style.textAlign='center';
            contentMsg.innerHTML=`已傳送mail。`;
            showLoginAlert(loginAlert); 

        });    
        const close = document.querySelector('.close');
        close.addEventListener('click',function(){
                box.style.display = "none";
        });
    }
    $('.mailimg').mouseover(function(){
        $(this).attr('src','img/faq/mailbox1.gif');
    });
    $('.mailimg').mouseout(function(){
        $(this).attr('src','img/faq/mailbox.png');
    });
</script>
<script src="js/self/faq.js"></script>
</html>