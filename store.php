<?php 
$errMsg = "";
try {
    require_once("php/connectCd104g1.php");
    $sql = "select * from store where store_id=:id";
    $store = $pdo -> prepare( $sql );
} catch (PDOException $e) {
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php require_once("head.html"); ?>
    <link rel="stylesheet" href="css/store.css">
    <!-- <script src="node_modules\gsap\src\minified\TweenMax.min.js"></script>
	<script src="node_modules\scrollmagic\scrollmagic\minified\ScrollMagic.min.js"></script>
    <script src="node_modules/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js"></script>
	<script src="node_modules/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js"></script>
    <script src="node_modules\jquery\dist\jquery.min.js"></script>
    <script src="node_modules/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script> -->

    <script src="js/plugin/TweenMax.min.js"></script>
	<script src="js/plugin/ScrollMagic.min.js"></script>
    <script src="js/plugin/animation.gsap.min.js"></script>
	<script src="js/plugin/debug.addIndicators.min.js"></script>
    <script src="js/plugin/ScrollToPlugin.min.js"></script>
    


    <title>阿婆柑仔店</title>
</head>
<body>
<?php require_once("loginBox.html")?> 
<?php require_once("nav.html")?>

<div id="bgFull">      <!--背景滿版-->            
<div id="stores">
    <div id="lightBoxFull"></div>
<?php
$store->bindValue(':id',1);
$store->execute();
while($prodRow = $store->fetchObject()){
?>
    <div id="lightBox">
        <span id="close" class="fas fa-times-circle btnCancel"></span>
        <img src="img/store/JaXypbTStTtuwlySsltwmTSleY.jpg" alt="">
        <p><?php echo $prodRow->description?></p>
    </div>
<?php
}
?>
<?php
$store->bindValue(':id',2);
$store->execute();
while($prodRow = $store->fetchObject()){
?>
    <div id="lightBox2">
        <span id="close2" class="fas fa-times-circle btnCancel"></span>
        <img src="img/store/JaXypbTStTtuwlySsltwmTSleY.jpg" alt="">
        <p><?php echo $prodRow->description?></p>
    </div>
<?php
}
?>
<?php
$store->bindValue(':id',3);
$store->execute();
while($prodRow = $store->fetchObject()){
?>
    <div id="lightBox3">
        <span id="close3" class="fas fa-times-circle btnCancel"></span>
        <img src="img/store/JaXypbTStTtuwlySsltwmTSleY.jpg" alt="">
        <p><?php echo $prodRow->description?></p>
    </div>
<?php
}
?>
<?php
$store->bindValue(':id',4);
$store->execute();
while($prodRow = $store->fetchObject()){
?>
    <div id="lightBox4">
        <span id="close4" class="fas fa-times-circle btnCancel"></span>
        <img src="img/store/JaXypbTStTtuwlySsltwmTSleY.jpg" alt="">
        <p><?php echo $prodRow->description?></p>
    </div>
<?php
}
?>
<?php
$store->bindValue(':id',5);
$store->execute();
while($prodRow = $store->fetchObject()){
?>   
    <div id="lightBox5">
        <span id="close5" class="fas fa-times-circle btnCancel"></span>
        <img src="img/store/JaXypbTStTtuwlySsltwmTSleY.jpg" alt="">
        <p><?php echo $prodRow->description?></p>
    </div>
<?php
}
?>
    <div id="trigger"></div>
    <div id="apo">
        <img class="apo" src="img/store/apo.png" alt="apo">
        <img class="wheel" id="w1" src="img/store/wheel.png" alt="wheel">
        <img class="wheel" id="w2" src="img/store/wheel.png" alt="wheel">
    </div>
    <!-- 毛點 -->
    <div id="archor">
        <div class="archor active" id="archor1">逢甲</div>
        <div class="archor" id="archor2">北港</div>
        <div class="archor" id="archor3">鹿港</div>
        <div class="archor" id="archor4">新港</div>
        <div class="archor" id="archor5">中央</div>
    </div>
<?php
$store->bindValue(':id',1);
$store->execute();
while($prodRow = $store->fetchObject()){
?>

    <!-- 店鋪一 -->
    <div class="store1" id="store1">
        <div class="img1"></div>
        <!-- <img class="img img1" src="img/store/2013051415214945300.jpg" alt=""> -->
        <div class="banner">
            <h2><?php echo $prodRow->name;?></h2>
        </div>
        <div class="content1">
            <div class="box1">
                <p><span class="bold">店鋪地址:</span><br><?php echo $prodRow->address?></p>
                <p><span class="bold">連絡電話:</span><br><?php echo $prodRow->phone?></p>
                <p><span class="bold">營業時間:</span><br><?php echo $prodRow->business_hours?></p>
                <button type="button" class="btn" id="btn">店鋪簡介</button>
            </div>
            <div class="image">
                <a href="http://www.google.com/maps">
                    <img class="map1" src="img/store/map1.png" alt="">
                </a>
            </div>
        </div>
            <!-- <div class="wordbox">
                <p>已經有百年歷史的阿婆柑仔店，位於郊區
                的一間柑仔店，避開了繁華的都市與人潮，在
                一個不起眼的巷仔弄，有著傳統的百年老店”
                阿婆柑仔店   ”。
                這裡還會不定期舉辦親朋好友逗陣來活動，
                適合老女老幼一起來趴踢的好去處！</p>
            </div> -->

        <!-- <button type="button" class="btn">店鋪簡介</button> -->
        <div class="tag">
            <a href="products-main.php?tab_btn=tab1">
                <img src="img/store/store-banner.png" alt="">
            </a>
        </div>
<?php
}
?>

    </div>
    <!-- 小狗出現 -->
    <div class="range">
        <div class="item">
            <img id="dog" onmouseover="textWord()" src="img/store/dog.png" alt="dogImg">
            <p id="word"></p>
        </div>
    </div>
<?php
$store->bindValue(':id',2);
$store->execute();
while($prodRow = $store->fetchObject()){
?>
    <!-- 店鋪二 -->
    <div class="store2" id="store2">
        <div class="img2"></div>
        <!-- <img class="img img2" src="img/store/store2.jpg" alt=""> -->
        <div class="banner2">
            <h2><?php echo $prodRow->name;?></h2>
        </div>
        <div class="content2">
            <div class="box2">
                <p><span class="bold">店鋪地址:</span><br><?php echo $prodRow->address?></p>
                <p><span class="bold">連絡電話:</span><br><?php echo $prodRow->phone?></p>
                <p><span class="bold">營業時間:</span><br><?php echo $prodRow->business_hours?></p>
                <button type="button" class="btn" id="btn2">店鋪簡介</button>
            </div>
            <div class="image">
                <a href="http://www.google.com/maps">
                    <img class="map2" src="img/store/map1.png" alt="">
                </a>
            </div>
        </div>
            <!-- <div class="wordbox2">
                <p>已經有百年歷史的阿婆柑仔店，位於郊區
                的一間柑仔店，避開了繁華的都市與人潮，在
                一個不起眼的巷仔弄，有著傳統的百年老店”
                阿婆柑仔店   ”。
                這裡還會不定期舉辦親朋好友逗陣來活動，
                適合老女老幼一起來趴踢的好去處！</p>
            </div> -->

        <div class="tag">
            <a href="products-main.php?tab_btn=tab1">
                <img src="img/store/store-banner.png" alt="">
            </a>
        </div>

    </div>
    <?php
}
?>
    <!-- 烏鴉出現 -->
    <div class="range2">
        <div class="item2">
            <img id="bird" src="img/store/bird.png" alt="bird">
        </div>   
    </div>
        <?php
$store->bindValue(':id',3);
$store->execute();
while($prodRow = $store->fetchObject()){
?>
    <!-- 店鋪三 -->
    <div class="store3" id="store3">
            <div class="img3"></div>
            <!-- <img class="img img3" src="img/store/store3.jpg" alt=""> -->
            <div class="banner3">
                <h2><?php echo $prodRow->name;?></h2>
            </div>
            <div class="content3">
                <div class="box3">
                    <p><span class="bold">店鋪地址:</span><br><?php echo $prodRow->address?></p>
                    <p><span class="bold">連絡電話:</span><br><?php echo $prodRow->phone?></p>
                    <p><span class="bold">營業時間:</span><br><?php echo $prodRow->business_hours?></p>
                    <button type="button" class="btn" id="btn3">店鋪簡介</button>
                </div>
                <div class="image">
                    <a href="http://www.google.com/maps">
                        <img class="map3" src="img/store/map1.png" alt="">
                    </a>
                </div>
            </div>
                <!-- <div class="wordbox3">
                    <p>已經有百年歷史的阿婆柑仔店，位於郊區
                    的一間柑仔店，避開了繁華的都市與人潮，在
                    一個不起眼的巷仔弄，有著傳統的百年老店”
                    阿婆柑仔店   ”。
                    這裡還會不定期舉辦親朋好友逗陣來活動，
                    適合老女老幼一起來趴踢的好去處！</p>
                </div> -->
            
            <div class="tag">
                <a href="products-main.php?tab_btn=tab1">
                    <img src="img/store/store-banner.png" alt="">
                </a>
            </div>
    
    </div>
        <?php
}
?>
            <?php
$store->bindValue(':id',4);
$store->execute();
while($prodRow = $store->fetchObject()){
?>
    <!-- 店鋪四 -->
    <div class="store4" id="store4">
            <div class="img4"></div>
            <!-- <img class="img img4" src="img/store/store4.jpg" alt=""> -->
            <div class="banner4">
                <h2><?php echo $prodRow->name;?></h2>
            </div>
            <div class="content4">
                <div class="box4">
                    <p><span class="bold">店鋪地址:</span><br><?php echo $prodRow->address?></p>
                    <p><span class="bold">連絡電話:</span><br><?php echo $prodRow->phone?></p>
                    <p><span class="bold">營業時間:</span><br><?php echo $prodRow->business_hours?></p>
                    <button type="button" class="btn" id="btn4">店鋪簡介</button>
                </div>
                <div class="image">
                    <a href="http://www.google.com/maps">
                        <img class="map4" src="img/store/map1.png" alt="">
                    </a>
                </div>
            </div>
                <!-- <div class="wordbox4">
                    <p>已經有百年歷史的阿婆柑仔店，位於郊區
                    的一間柑仔店，避開了繁華的都市與人潮，在
                    一個不起眼的巷仔弄，有著傳統的百年老店”
                    阿婆柑仔店   ”。
                    這裡還會不定期舉辦親朋好友逗陣來活動，
                    適合老女老幼一起來趴踢的好去處！</p>
                </div> -->
            
            <div class="tag">
                <a href="products-main.php?tab_btn=tab1">
                    <img src="img/store/store-banner.png" alt="">
                </a>
            </div>
    
        </div>        
        <?php
}
?>
                    <?php
$store->bindValue(':id',5);
$store->execute();
while($prodRow = $store->fetchObject()){
?>
    <!-- 店鋪五 -->
    <div class="store5" id="store5">
            <div class="img5"></div>
            <!-- <img class="img img5" src="img/store/cropped-.jpg" alt=""> -->
            <div class="banner5">
                <h2><?php echo $prodRow->name;?></h2>
            </div>
            <div class="content5">
                <div class="box5">
                    <p><span class="bold">店鋪地址:</span><br><?php echo $prodRow->address?></p>
                    <p><span class="bold">連絡電話:</span><br><?php echo $prodRow->phone?></p>
                    <p><span class="bold">營業時間:</span><br><?php echo $prodRow->business_hours?></p>
                    <button type="button" class="btn" id="btn5">店鋪簡介</button>
                </div>
                <div class="image">
                    <a href="http://www.google.com/maps">
                        <img class="map5" src="img/store/map1.png" alt="">
                    </a>
                </div>
            </div>
                <!-- <div class="wordbox5">
                    <p>已經有百年歷史的阿婆柑仔店，位於郊區
                    的一間柑仔店，避開了繁華的都市與人潮，在
                    一個不起眼的巷仔弄，有著傳統的百年老店”
                    阿婆柑仔店   ”。
                    這裡還會不定期舉辦親朋好友逗陣來活動，
                    適合老女老幼一起來趴踢的好去處！</p>
                </div> -->
            
            <div class="tag">
                <a href="products-main.php?tab_btn=tab1">
                    <img src="img/store/store-banner.png" alt="">
                </a>
            </div>
    
    </div>
<?php
}
?>

</div>
<!-- <div class="storefooter"> -->
    <div id="footer2">        
        Copyright&#9400;阿婆柑仔店, all rights reserved
    </div>
<!-- </div> -->
    
</div>  <!--背景滿版-->




</body>
<?php require_once("selfJs.html"); ?>
<script src="js/self/store.js"></script>
</html>