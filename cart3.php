<?php  session_start();?>
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
            <img src="img/cartImg/cartapo1-1.png" alt="">
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
            <img src="img/cartImg/cartapo3.png" alt="">
        </div>
        <div class="cartline">
            <img src="./img/faq/right.png" alt="">
        </div>
        <div class="step step4">
            <img src="img/cartImg/cartapo4-1.png" alt="">
        </div>
    </div>
    <div class="valuationlist">
        <h2>確認購買</h2>
        <div class="shopdate">
        <p class="clientname"><?php echo $_SESSION["name"];?>&nbsp;<span class="titleweight">台照<span></p>
            <p>民國<span class="year">106</span>年<span class="month">12</span>月<span class="date">13</span>日</p>
        </div>
        <table class="tableMoney">
            <tr>
                <th colspan="4" class="rwdfonttitle">請確認訂單明細及收件人資料</th>
                <th class="rwdnoshow">備考</th>
            </tr>
            <tr class="bluecolor rwd-c-data">
                <th>總金額</th>
                <td colspan="3" class="checkinfo totalprice ">88888</td>
                <td rowspan="6" class="rwdnoshow"></td>
            </tr>
            <tr class="bluecolor rwd-c-data">
                <th>付款方式</th>
                <td colspan="3" class="checkinfo payment">貨到付款</td>
            </tr>
            <tr class="bluecolor rwd-c-data">
                <th>姓名</th>
                <td colspan="3" class="checkinfo cname">阿婆柑仔店</td>
            </tr>
            <tr class="bluecolor rwd-c-data">
                <th>電話</th>
                <td colspan="3" class="checkinfo cphone">0916816816</td>
            </tr>
            <tr class="bluecolor rwd-c-data">
                <th>地址</th>
                <td colspan="3" class="checkinfo caddress">台北市信義區信義路五段7號</td>
            </tr>
            <tr>
                <th colspan="4" class="totalMoney rwdfonttitle">
                    <span>合計新台幣</span>
                    <span class="finalprice">0</span>
                    <span>元</span>
                </th>
            </tr>
        </table>            
        <div class="cartbtn2">
            <a href="cart2.php">
                <button class="btn Previousbtn">上一步</button>
            </a>
            <a href="cart4.php">
                <button class="btn nextbtn" id="nextbtn">下一步</button>
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
<script src="js/self/getcartInfo.js"></script>
<script src="js/self/date.js"></script>
</html>    