<?php session_start(); ?>
<?php
    require_once("php/connectCd104g1.php");
    $sql= "select * from member a join member_coupon b on a.member_id = b. member_id join coupon_type as ct on b.coupon_id=ct.coupon_id where a.member_id = 3";
    $coupon = $pdo->prepare($sql);
    $coupon->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("head.html"); ?>
    <title>阿婆柑仔-購物車</title>   
</head>
<body>

<!-- NAV -->
<?php require_once("nav.html"); ?>
<?php require_once("loginBox.html"); ?>


<!-- 背景圖 -->
<div class="rwdbg">
    <img src="./img/section1/h1bg.png" alt="" class="rwdbg1">
</div>

<div id="cart">
    <div class="stepOut">
        <div class="step step1">
            <img src="img/cartImg/cartapo1.png" alt="">
        </div>
        <div class="cartline">
            <img src="./img/faq/right.png" alt="">
        </div>
        <div class="step step2">
            <img src="img/cartImg/cartapo2-1.png" alt="">
        </div>
        <div class="cartline">
            <img src="./img/faq/right.png" alt="">
        </div>
        <div class="step step3">
            <img src="img/cartImg/cartapo3-1.png" alt="">
        </div>
        <div class="cartline">
            <img src="./img/faq/right.png" alt="">
        </div>
        <div class="step step4">
            <img src="img/cartImg/cartapo4-1.png" alt="">
        </div>
    </div>
    <div class="valuationlist">
        <h2>估價單</h2>
        <div class="shopdate">
            <p>台照</p>
            <p>民國<span class="year">106</span>年<span class="month">12</span>月<span class="date">13</span>日</p>
        </div>
        <table class="tableMoney">
            <thead class="head">
                <tr>
                    <th>貨圖</th>
                    <th>貨名</th>
                    <th>數量</th>
                    <th>單價</th>
                    <th>金額</th>
                    <th>修改</th>
                </tr>  
            </thead>
            <tbody class="cartbody">         
            </tbody>
            <tr>
                <th colspan="6" class="totalMoney rwdfonttitle">
                    <span></span>
                    <span>合計新台幣</span>
                    <span class="finalprice">0</span>
                    <span>元</span>
                </th>
            </tr>

        </table>
        <div class="cartbtn">
            <a href="#" class="nextpage">
                <button class="btn nextbtn">下一步</button>
            </a>
        </div>
    </div> 
</div>
<div class="table">
    <div class="money">
        <img src="./img/cartImg/money.png" alt="">
    </div>
    <div class="wood wood1"></div>
    <div class="wood wood2"></div>
    <div class="wood wood3"></div>
    <div class="wood wood4"></div>
</div>

<div class="cart">
    <div id="footer">        
        Copyright&#9400;阿婆柑仔店, all rights reserved
    </div>
</div>
</body>
<?php require_once("selfJs.html"); ?>
<script src="js/self/getProductInfo.js"></script>
<script src="js/self/date.js"></script>
</html>    