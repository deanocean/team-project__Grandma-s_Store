<?php
    session_start();
    $memid=$_SESSION["member_id"];
    require_once("php/connectCd104g1.php");
    $sql= "select * from member a join member_coupon b on a.member_id = b. member_id join coupon_type as ct on b.coupon_id=ct.coupon_id where a.member_id = $memid";
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
            <img src="img/cartImg/cartapo1-1.png" alt="">
        </div>
        <div class="cartline">
            <img src="./img/faq/right.png" alt="">
        </div>
        <div class="step step2">
            <img src="img/cartImg/cartapo2.png" alt="">
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
        <!-- <img src="./img/cartImg/shoppingList.png" alt=""> -->
        <h2>付款方式</h2>
        <div class="shopdate">
        <p class="clientname"><?php echo $_SESSION["name"];?>&nbsp;<span class="titleweight">台照<span></p>
            <p>民國<span class="year">106</span>年<span class="month">12</span>月<span class="date">13</span>日</p>
        </div>
        <table class="tableMoney">
            <tr>
                <th colspan="4" class="rwdfonttitle">請選擇付款方式</th>
                <th class="rwdnoshow">備考</th>
            </tr>
            <tr class="bluecolor middle">
                <th>
                    <label class="select">
                        <input type="radio" name="color" value="信用卡">
                        <span class="color">信用卡</span>  
                    </label>
                </th>
                <th>
                    <label class="select">
                        <input type="radio" name="color" value="貨到付款">
                        <span class="color">貨到付款</span>  
                    </label>
                </th>
                <th>
                    <label class="select">
                        <input type="radio" name="color" value="超商付款">
                        <span class="color">超商付款</span>  
                    </label>
                </th>
                <th>
                    <label class="select">
                        <input type="radio" name="color" value="銀行轉帳">
                        <span class="color">銀行轉帳</span>  
                    </label>
                </th>
                <td rowspan="7" class="rwdnoshow">
                </td>
            </tr>
            <tr>
                <th colspan="4" class="rwdfonttitle">請填寫收件人資料</th>
            </tr>
            <tr class="bluecolor rwd-c-data">
                <th><label for="c-name">姓名</label></th>
                <td colspan="3"><input type="text" name="" id="c-name" value="<?php echo $_SESSION["name"];?>"></td>
            </tr>
            <tr class="bluecolor rwd-c-data">
                <th><label for="c-phone">電話</label></th>
                <td colspan="3"><input type="text" name="" id="c-phone" value="<?php echo $_SESSION["mobile_phone"];?>"></td>
            </tr>
            <tr class="bluecolor rwd-c-data">
                <th><label for="c-address">地址</label></th>
                <td colspan="3"><input type="text" name="" id="c-address" value="<?php echo $_SESSION["address"];?>"></td>
            </tr>
            <tr class="bluecolor rwd-c-data">
                <th>折價券</th>
                <td colspan="3" class="couponcenter">
                    <select id="coupon">
                        <?php while ($responses = $coupon->fetch()){ ?>
                            <option><?php echo $responses["amount"];?></option>
                        <?php }?> 
                    </select>
                    <button id="myTest" class="btn">使用</button>
                    <!-- <p id="selectcoupon"></p>   -->
                </td>
            </tr>
            <tr>
                <th colspan="4" class="totalMoney rwdfonttitle">
                    <span>合計新台幣</span>
                    <!-- <span>萬</span>
                    <span>千</span>
                    <span>百</span> -->
                    <span class="finalprice">0</span>
                    <span>元</span>
                    <!-- <span>角正</span> -->
                </th>
            </tr>
        </table>        
        <div class="cartbtn2">
            <a href="cart.php">
                <!-- <input type="button" value="上一步" class="btn"> -->
                <button class="btn">上一步</button>
            </a>
            <a href="#">
                <!-- <input type="button" value="下一步" class="btn nextbtn"> -->
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
<script src="js/self/cartCustomerInfo.js"></script>
<script src="js/self/date.js"></script>


</html>    