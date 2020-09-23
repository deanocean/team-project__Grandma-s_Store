<?php
    session_start();
	require_once("php/connectCd104g1.php");
    $sql = "select * from product_order order by order_id DESC limit 1";
    $ordernum = $pdo->prepare($sql);
    $ordernum->execute();
    $responses = $ordernum->fetch();
    
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
            <img src="img/cartImg/cartapo3-1.png" alt="">
        </div>
        <div class="cartline">
            <img src="./img/faq/right.png" alt="">
        </div>
        <div class="step step4">
            <img src="img/cartImg/cartapo4.png" alt="">
        </div>
    </div>
    <div class="valuationlist">
        <h2>完成購買</h2>
        <div class="shopdate">
        <p class="clientname"><?php echo $_SESSION["name"];?>&nbsp;<span class="titleweight">台照<span></p>
            <p>民國<span class="year">106</span>年<span class="month">12</span>月<span class="date">13</span>日</p>
        </div>
        <table class="tableMoney">
            <tr>
                <th colspan="1" class="rwdfonttitle">請確認訂單明細及收件人資料</th>
                <th class="rwdnoshow">備考</th>
            </tr>
            <tr>
                <th colspan="1" class="finalinfo">
                    <p>訂購成功</p>
                    <p>您的訂單編號為:<span><?php echo "APOSHOP".$responses['order_id'];?></span></p>
                    <p>下單日期</p>
                    <p class="buydate"><?php echo date("Y/m/d")?></p>
                </th>
                <td rowspan="2" class="rwdnoshow">

                </td>
            </tr>
            <tr>
                <th colspan="1" class="totalMoney rwdfonttitle">
                    <span>合計新台幣</span>
                    <!-- <span>萬</span>
                    <span>千</span>
                    <span>百</span> -->
                    <span class="finalprice">
                        <?php echo $responses['amount'];?>
                    </span>
                    <span>元</span>
                    <!-- <span>角正</span> -->
                </th>
            </tr>
        </table>          
        <div class="cartbtn2">
            <a href="products-main.php?tab_btn=tab2">
                <!-- <input type="button" value="繼續選購" class="btn"> -->
                <button class="btn">繼續選購</button>
            </a>
            <a href="member.php">
                <!-- <input type="button" value="會員中心" class="btn"> -->
                <button class="btn">會員中心</button>
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
<!-- <script src="js/self/completebuy.js"></script> -->
<script src="js/self/date.js"></script>
</html>    