<?php
$errMsg = "";
//連線資料庫
try {
    // $dsn = "mysql:host=localhost;dbname=cd104g1;port=3306;charset=utf8";
    // $user = "root";
    // $password = "iii0905";
    // $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    // $pdo = new PDO($dsn, $user, $password, $options);
	require_once("php/connectCd104g1.php");
    $sql = "select * from customized_bag_type";
    $pdoStatement = $pdo->query($sql);
    $bags = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    $mobsql = "select * from customized_bag_type";
    $mobpdoStatement = $pdo->query($mobsql);

    // $sql2 = "select * from product where category=1 limit 1,4";
    $sql2="select * from product as p ";
    $sql2=$sql2."join product_image as pi ";
    $sql2=$sql2."on p.product_id = pi.product_id ";
    $sql2=$sql2."where category=1";
    $pdoStatement2 = $pdo->query($sql2);

    $mobsql2="select * from product as p ";
    $mobsql2=$mobsql2."join product_image as pi ";
    $mobsql2=$mobsql2."on p.product_id = pi.product_id ";
    $mobsql2=$mobsql2."where category=1";
    $mobpdoStatement2 = $pdo->query($mobsql2);



    $sql3="select * from product as p ";
    $sql3=$sql3."join product_image as pi ";
    $sql3=$sql3."on p.product_id = pi.product_id ";
    $sql3=$sql3."where category=2 ";
    $pdoStatement3 = $pdo->query($sql3);

    $mobsql3="select * from product as p ";
    $mobsql3=$mobsql3."join product_image as pi ";
    $mobsql3=$mobsql3."on p.product_id = pi.product_id ";
    $mobsql3=$mobsql3."where category=2";
    $mobpdoStatement3 = $pdo->query($mobsql3);



    $sql4="select * from product as p ";
    $sql4=$sql4."join product_image as pi ";
    $sql4=$sql4."on p.product_id = pi.product_id ";
    $sql4=$sql4."where category=3";
    $pdoStatement4 = $pdo->query($sql4);

    $mobsql4="select * from product as p ";
    $mobsql4=$mobsql4."join product_image as pi ";
    $mobsql4=$mobsql4."on p.product_id = pi.product_id ";
    $mobsql4=$mobsql4."where category=3";
    $mobpdoStatement4 = $pdo->query($mobsql4);


    $sql5="select * from product as p ";
    $sql5=$sql5."join product_image as pi ";
    $sql5=$sql5."on p.product_id = pi.product_id ";
    $sql5=$sql5."where category=4";
    $pdoStatement5 = $pdo->query($sql5);            
    
    $mobsql5="select * from product as p ";
    $mobsql5=$mobsql5."join product_image as pi ";
    $mobsql5=$mobsql5."on p.product_id = pi.product_id ";
    $mobsql5=$mobsql5."where category=4 ";
    $mobpdoStatement5 = $pdo->query($mobsql5);    
} catch (PDOException $e) {
    $errMsg .= "錯誤原因 : " . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號 : " . $e->getLine() . "<br>";
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("head.html") ?>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- <meta name="viewport" content="width = 320, user-scalable = no">   -->
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>阿婆柑仔店</title>
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <!--引進css-->
    <!-- <link rel="stylesheet" href="css/public.css"> -->
    <!--公版-->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous"> -->
    <!--fontawesome -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--jqueryCDN -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- <script src="./js/self/jquery.ui.touch-punch.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
        <!--jquery-uiCDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PreloadJS/1.0.1/preloadjs.js"></script>
    <!--preloader CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turn.js/3/turn.min.js"></script>
    <!--turnJS CDN -->
    <script src="./js/plugin/modernizr.2.5.3.min.js"></script>
    <!--modernizr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js"></script>
    <!--odometer  JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- <script src="./css/owl.carousel.min.css"></script> -->
    <!-- <script src="./css/owl.theme.default.min.css"></script> -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">


    <!-- <script src="./js/plugin/owl.carousel.min.js"></script> -->

<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->

<!-- slick -->
<!-- <link rel="stylesheet" type="text/css" href="./css/slick.css"/> -->
<!-- <link rel="stylesheet" type="text/css" href="./css/slick-theme.css"/> -->

</head>

<body>
    <!-- NAV -->
<?php require_once("nav.html"); ?>
<?php require_once("loginBox.html"); ?>


    <div id="cust">
        <!-- 我是電腦版 -->
        <!-- <div id="preloading">
            <div id="preloadingApo">
                <img src="./img/store/apo.png" alt="">
                <img src="./img/store/wheel.png" alt="" class="wheelleft">
                <img src="./img/store/wheel.png" alt="" class="wheelright">
            </div>
         
        </div> -->

        <div class="flipbook-viewport" >
            <div class="container" >
                <div class="flipbook" id="preloading">
                    <!-- 我是封面01 -->
                    <div style="background-image:url(img/custImg/cust-exercise-book3.png)">
                        <span class="booktitle">國語作業簿</span>
                        <span class="bookname">姓名:______________</span>
                        <span class="bookname2">老師:______________</span>
                        <span class="rightGuide btn rightGuideBtn">點擊或拖曳</span>
                    </div>



                    <!-- 左頁點"小圖"換大圖02 -->
                    <div style="background-image:url(img/custImg/custl.png)">
                        <div class="content">
                            <p>說明</p>
                            <div class="contenth3">
                                <h3><span>步驟壹 請選擇包包款式</span></h3>
                                <h3>步驟貳 請設計包包外觀</h3>
                                <h3>步驟參 請挑選內容物</h3>
                            </div>
                        </div>
                        <div class="plzchoose">
                            <h4>請點擊選擇包包</h4>
                        </div>

                        <div class="threeBag" id="MSQ_threeBag">
                         
                            <?php foreach ($bags as $key => $bagRow) {?>
                                <div class="smallThreeBag">
                                    <img src="<?php echo $bagRow["image_path"];?>" id="<?php echo 'bag'.$bagRow["bag_id"];?>">
                                    <span><?php echo $bagRow["price"]?></span><span>元</span>
                                </div>
                            <?php
                            }
                            ?>    
                           

                            <span class="nowrap m-t-20 inline-block nameBag">替您的包包命名</span><input type="text" class="custBagName1" placeholder="請輸入0~5字" maxLength="5"><input type="button" class="putWord btn" id="putWord3" value="送出"/>
                        </div>
                        <span class="leftGuide">上一步</span>

                    </div>
                    <!-- 右頁點小圖換"大圖"03 -->
                    <div style="background-image:url(img/custImg/custr.png)">
                        <div class="bigBag">
                            <h2 class="custBagName2" id="custBagName2">您選擇的包包</h2>
                            <img id="large" src="./img/custImg/images/big/tour_1.png">
                        </div>
                        <div class="bagmoney">
                            <!-- <span></span> -->
                            <span id="bagmoney">100</span><span>元</span>
                        </div>

                        <span class="rightGuide">下一步</span>

                    </div>
                    <!-- 左頁上傳圖片04-->
                    <div style="background-image:url(img/custImg/custl.png)">
                        <div class="content">
                            <p>說明</p>
                            <div class="contenth3">
                                <h3>步驟壹 請選擇包包款式</h3>
                                <h3><span>步驟貳 請設計包包外觀</span></h3>
                                <h3>步驟參 請挑選內容物</h3>
                                
                            </div>
                        </div>
                        <span class="chooseStamp">二.選擇貼圖</span>
                        <div class="custChoose">
                            <img src="./img/custImg/custTatto/custTatto1.png" class="SS1 tattooss">
                            <img src="./img/custImg/custTatto/custTatto4.png" class="SS2 tattooss">
                            <img src="./img/custImg/custTatto/custTatto3.png" class="SS3 tattooss">
                        </div>
                        <form class="textform" method="post" accept-charset="utf-8" name="form1">
                            <input name="hidden_data" id='hidden_data' type="hidden" />
                           <span>一.輸入文字&nbsp;</span><input type="text" id="myWord" maxlength="6" />
                            <input type="button" class="putWord btn" id="putWord" value="送出"/>
                        </form>
                        <label for="fileUpload">
                            <input type="file" id="fileUpload" style="display:none">
                            <p>三.上傳您的圖案</p>
                            <p>8M內，jpg、png之圖檔。</p>
                        </label>
                        <span class="leftGuide">上一步</span>

                    </div>

                    <!-- 右頁遮罩後包包05 -->
                    <div style="background-image:url(img/custImg/custr.png)">
                            <h2 class="custBagName2" id="custBagName3">您選擇的包包</h2>

                        <div id="dropzone">
                            <div class="forClip clip0">
                                <img id="large2" src="./img/custImg/images/big/tour_1.png">
                                <div class="dropzoneContent">
                                    <div id="dropzoneContent1"><!--文字-->
                                        <span id="dropzoneContentimage1"></span>
                                    </div>                                    
                                    <div id="dropzoneContent2" class="dropzoneContent2">
                                        <img id="dropzoneContentimage2" class="dropzoneContentimage2" src=""><!--官方貼圖-->
                                    </div>
                                    <div id="dropzoneContent3" class="dropzoneContent3">
                                        <img id="dropzoneContentimage3"  class="dropzoneContent3" src=""><!--自傳貼圖-->
                                    </div>
                                    <!-- <div id="theDiV"></div> -->
                                </div>
                            </div>
                        </div>
                        <div id="btns">
                            <i class="fas fa-search-plus" id="scaleBig"></i>
                            <i class="fas fa-search-minus" id="scaleSmall"></i>
                            <i class="fas fa-undo" id="clockwise"></i>
                            <i class="fas fa-undo" id="clockwiseReverse"></i>
                            <i class="fas fa-trash-alt" id="removeImg"></i>
                        </div>
                        <button id="confirmCustResult" class="btn">
                            設計完成
                        </button>
                        <span class="rightGuide" id="saveImg">下一步</span>

                    </div>

                    <!-- 左頁挑選禮物06 -->
                    <div style="background-image:url(img/custImg/custl.png)">
                        <div class="content">
                            <p>說明</p>
                            <div class="contenth3">
                                <h3>步驟壹 請選擇包包款式</h3>
                                <h3>步驟貳 請設計包包外觀</h3>
                                <h3><span>步驟參 請挑選內容物</span></h3>
                            </div>
                        </div>
                        <div class="finalCust">
                            <img id="large3" src="img/custImg/tour1.png" alt="tour1">
                        </div>
                        <span class="leftGuide">上一步</span>

                    </div>

                    <!-- 右頁顯示挑選禮物07 -->
                    <div style="background-image:url(img/custImg/custr.png)">
                       
                        <div class="chooseContentImg">

                            <div class="computerBookmark">
                                <div class="tab">
                                    <button class="tablinks btn" onclick="openCity(event, 'tab01')" id="defaultOpen">糖果</button>
                                    <button class="tablinks btn" onclick="openCity(event, 'tab02')">童玩</button>
                                    <button class="tablinks btn" onclick="openCity(event, 'tab03')">餅乾</button>
                                    <button class="tablinks btn" onclick="openCity(event, 'tab04')">飲料</button>
                                </div>

                                <div class="owlOut">
                                    <div class="owlLeft">
                                        <i class="fas fa-arrow-left arrowL prev"></i>
                                    </div>
                                    <div class="owlMiddle">
                                        <div id="tab01" class="tabcontent owl-carousel owl-theme">
                                            <?php while ($prodRow2 = $pdoStatement2->fetch()){ ?>                                        
                                                <div class="flex ">
                                                    <span id="<?php  echo 'P'.$prodRow2["product_id"];?>" class="addpro">
                                                    <img src="<?php  echo $prodRow2["image_path"];?>">
                                                    <input type="hidden" value="<?php  echo $prodRow2["name"];?>|<?php  echo $prodRow2["image_path"];?>|<?php  echo $prodRow2["price"];?>">
                                                    </span>
                                                </div>
                                            <?php
                                                 }
                                            ?>
                                        </div>
                                        <div id="tab02" class="tabcontent owl-carousel owl-theme">
                                            <?php while ($prodRow3 = $pdoStatement3->fetch()){ ?>                                        
                                                <div class="flex">
                                                    <span id="<?php  echo 'P'.$prodRow3["product_id"];?>" class="addpro">
                                                    <img src="<?php  echo $prodRow3["image_path"];?>">
                                                    <input type="hidden" value="<?php  echo $prodRow3["name"];?>|<?php  echo $prodRow3["image_path"];?>|<?php  echo $prodRow3["price"];?>">
                                                    </span>
                                                </div>
                                            <?php
                                                 }
                                            ?>
                                        </div>
                                        <div id="tab03" class="tabcontent owl-carousel owl-theme">
                                            <?php while ($prodRow4 = $pdoStatement4->fetch()){ ?>                                        
                                                <div class="flex">
                                                    <span id="<?php  echo 'P'.$prodRow4["product_id"];?>" class="addpro">
                                                    <img src="<?php  echo $prodRow4["image_path"];?>">
                                                    <input type="hidden" value="<?php  echo $prodRow4["name"];?>|<?php  echo $prodRow4["image_path"];?>|<?php  echo $prodRow4["price"];?>">
                                                    </span>
                                                </div>
                                            <?php
                                                 }
                                            ?>
                                        </div>
                                        <div id="tab04" class="tabcontent owl-carousel owl-theme">
                                            <?php while ($prodRow5 = $pdoStatement5->fetch()){ ?>                                        
                                                <div class="flex">
                                                    <span id="<?php  echo 'P'.$prodRow5["product_id"];?>" class="addpro">
                                                    <img src="<?php  echo $prodRow5["image_path"];?>">
                                                    <input type="hidden" value="<?php  echo $prodRow5["name"];?>|<?php  echo $prodRow5["image_path"];?>|<?php  echo $prodRow5["price"];?>">
                                                    </span>
                                                </div>
                                            <?php
                                                 }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="owlRight">
                                         <i class="fas fa-arrow-right arrowR next"></i>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="chooseContentTextTitle">
                            <p>請挑選您要的禮盒內容~最多可挑四樣</p>
                        </div>
                        <div class="chooseContentText" id="newItem">
                        </div>
                        <div id="content">
                            商品:<span id="itemCount" >0</span>個<br>
                            總金額(含包包):<span id="subtotal" class="odometer">100</span><span>元</span>
                            
                        </div>
                        <div class="addToCart">
                            <a href="#"><button class="btn" id="putInfoToDB">加入購物車</button></a>
                        </div>

                        <span class="rightGuide">下一步</span>

                    </div>

                    <!-- 封底8 -->
                    <div style="background-image:url(img/custImg/cb4.png)">
                        <div class="backcover">
                            <img src="./img/custImg/tour1.png" alt="tour1" id="largefinall">
                            <div class="backcoverlink">
                                <a href="#" id="updateButton"><i class="col-md-3 fas fa-file-upload"><span>&nbsp;分享至客製化</span></i></a>
                                <i class="col-md-3 fas fa-file-download"><a id="custImgDownload" href="images/cd104.png" download><span>&nbsp;下載圖片</span></a></i>
                                <a href="event.php"><i class="col-md-3 fas fa-calendar-alt"><span>&nbsp;報名活動</span></i></a>
                                <!-- <div class="step4finall step4share">
                                    <img src="./img/custImg/icon/share_2.png" alt="">
                                    <span>分享至客製化</span>
                                </div>
                                <div class="step4finall step4download">
                                    <a href="./img/custImg/step/cartapo1.png" download>
                                    <img src="./img/custImg/icon/download_2.png" alt="">
                                    <span>下載圖片</span></a>
                                </div>
                                <div class="step4finall step4event">
                                    <a href="event.php">
                                    <img src="./img/custImg/icon/download_2.png" alt="">
                                    <span>報名活動</span>    
                                    </a>                        
                                </div>                                 -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <canvas width="400" height="400" style="border:1px solid #ccc;" id="bagcanvas">
            </canvas>
                <div class="canvas-disnone">
                    <svg version="1.1" id="svg0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 400 400" style="enable-background:new 0 0 400 400;" xml:space="preserve" class="svgnone">
                        <path d="M262,401c-4.3,0-8.7,0-13,0c-1.3-2.3-2.4-4.7-4-6.7c-0.9-1.1-2.7-1.9-4.1-2c-3.4-0.2-6.9,0.3-10.3,0
                            c-7.1-0.6-14.2-2.2-21.3-2.3c-23.5-0.6-47-0.5-70.4-1.1c-9.3-0.2-18.5-1.3-27.8-2.1c-15-1.3-30.1-2.5-45.1-4.2
                            c-6-0.7-11.8-2.7-17.8-4c-4.2-0.9-8.5-2.5-12.6-2.2c-10.9,0.9-18.9-3.9-21.4-14.6c-1.3-5.6-2.2-11.4-2.5-17.2
                            c-0.6-11.5-0.6-23-1.2-34.5c-0.2-4.9-1.6-9.8-2-14.8c-0.8-9.6-1.2-19.2-1.8-28.7c-1.3-20.3-3.3-40.7-3.9-61
                            c-0.5-19.4,0.6-38.9,0.9-58.4c0.2-12.4,0.6-24.9,0.4-37.3c-0.1-5,2-7,6.5-7.1c8.3-0.2,16.6-0.3,24.9-0.4c20.6-0.3,41.3-0.7,61.9-0.6
                            c4.2,0,5.8-1.6,6.5-5c0.9-5.1,1.6-10.2,2.5-15.2c2.4-12.3,5-24.6,7.2-37c0.9-4.9,2.9-8.6,7-11.5c5.3-3.8,10.7-7.7,15.5-12.1
                            c7.6-6.9,16.4-9,26.3-8.9c6.1,0.1,12.2-0.8,18.3-1.5c5.9-0.7,11.7-1.9,17.6-2.6c10.1-1.1,20.1-2.3,30.2-3c6.7-0.5,13.7-1.4,20,2.2
                            c3.6,2.1,6.9,4.7,10.2,7c10,7.1,17,15.9,17.1,29c0.2,16.3,0.7,32.6,1.2,48.9c0.1,3.3,0.8,6.6,1.7,9.8c0.3,1.1,1.9,2.5,2.9,2.6
                            c7.3,0.6,14.5,0.9,21.8,1.3c19.7,1,39.5,1.6,59.2,3.3c13.6,1.1,26,5.7,34.8,17.1c0.9,1.1,2.2,1.9,3.3,2.8c0,16.3,0,32.7,0,49
                            c-0.5,2.7-1.5,5.3-1.6,8c-0.5,26.3-0.6,52.5-1.5,78.8c-0.4,11.9-2.8,23.7-3.9,35.6c-1.1,12.9-2.7,25.4-7.6,37.8
                            c-6.1,15.5-14.4,30.2-18,46.6c-0.2,0.9-0.8,1.8-1.3,2.7c-4.6,7.9-18,13-29.5,11.4c-2.6-0.4-5.3-0.6-7.9-0.5
                            c-12.6,0.2-25.3,0.6-37.9,0.6c-3.3,0-6.5-0.8-9.8-1.4C274.9,396.2,267.3,391.8,262,401z M253.5,74.2c-0.6-10.5-1.1-18.9-1.5-27.4
                            c-0.3-7-0.5-7.3-7.6-8.1c-1.3-0.1-2.7-0.2-4-0.2c-11.8,0.1-23.6,0.3-35.4,0.2c-17.8-0.1-35.5-0.5-53.3-0.7c-2.9,0-4.4,1.2-4.8,4.5
                            c-0.9,7.2-2.4,14.3-3.5,21.5c-1.6,10.1-3.3,20.3-4.4,30.4c-0.6,6,1.1,7.6,7.2,7.8c6.5,0.2,13-0.2,19.5,0c9.5,0.3,19,1.2,28.4,1.1
                            c17.2-0.2,34.5-1,51.7-1.3c3.2-0.1,5.1-0.6,5.4-4.1C252.1,89.4,252.9,80.8,253.5,74.2z"/>
                    </svg>
                    <svg version="1.1" id="svg1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 400 400" style="enable-background:new 0 0 400 400;" xml:space="preserve" class="svgnone">
                        <path d="M181.9,5.9c13.5,10.2,27,1.8,40.8,1.3c2,5.2,3.4,10.9,6.2,15.8c5.8,10.5,12.5,20.6,18.6,31c7.5,12.9,19,21.4,31,29.6
                        c3.6,2.5,6.7,5.9,9.4,9.4c8.2,10.4,17.2,20.4,23.8,31.8c7.6,13,16.4,24.8,26.5,35.9c3.2,3.5,5.1,8.1,7.4,12.3
                        c1.5,2.8,1.7,6.6,6.3,6.4c0.4,0,1,0.5,1.1,0.9c1.4,6.1,5.9,12.5,2.6,18.5c-2.8,5.1-2.5,9.8-2.2,14.8c0.8,13.5,2.3,27,2.6,40.6
                        c0.9,35.1,1.7,70.2,1.9,105.3c0.1,10-1.7,20.1-3,30.1c-0.7,5.6-5.2,9.5-11.1,9.6c-13.6,0.1-27.3-0.3-40.9-0.4
                        c-15.3-0.1-30.6-0.1-45.9-0.2c-11.8-0.1-23.6-0.2-35.5-0.3c-8.3-0.1-16.6,0-24.9-0.1c-4,0-8-0.3-12-0.3c-39.5,0.3-78.9,0.7-118.4,1
                        c-6.8,0.1-13.1-1.8-16.5-8.3c-2-3.9-3.4-8.4-3.8-12.7c-1.4-16.5-2.6-33.1-3.2-49.7c-0.6-17.7-0.7-35.5-0.6-53.2
                        c0.1-17.6,0.8-35.2,1.5-52.7c0.3-6.6,1.4-13.2,2.2-19.8c0.1-0.7,0.3-1.4,0.1-2c-3.5-15.8,4-29.2,9.6-42.9c10.4-25.3,26-47,46.2-65.6
                        c11.3-10.4,21.5-22,32.6-32.6c9.4-8.9,17.3-19.3,28.1-26.9c7.2-5,12-12.5,15.8-20.5C179.2,10,180.6,8.1,181.9,5.9z M331,181.6
                        c-0.4-1.1-1.1-2.9-1.9-4.7c-4.1-9.1-8-18.4-12.6-27.3c-3.5-6.9-6.5-14.8-12-19.6c-13.5-11.7-27.7-22.9-42.8-32.5
                        c-14.9-9.5-30.2-18.1-41.7-31.9c-5.7-6.8-11.4-13.6-17.3-20.7c-1.1,1.4-2.4,2.8-3.6,4.4c-8.6,11.8-18.8,22-30.7,30.5
                        c-5.2,3.7-10.6,7.3-15.7,11.2c-14.1,10.7-28.1,21.5-42.2,32.4c-5.2,4-10.7,7.8-15.3,12.5c-8.5,8.7-16.7,17.9-24.6,27.2
                        c-4.6,5.4-8.5,11.4-12.4,16.9C149.3,184.3,240,186.6,331,181.6z" />
                    </svg>
                    <svg version="1.1" id="svg2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 400 400" style="enable-background:new 0 0 400 400;" xml:space="preserve" class="svgnone">
                    <path d="M401,299c0,3.3,0,6.7,0,10c-2,2.4-4.8,4.4-5.8,7.2c-3.4,8.7-6.1,17.7-9.1,26.6c-1.7,5-5.1,7.9-10.1,9.4
                        c-11.9,3.6-24,1.9-36.1,1.4c-8.1-0.3-15.6-2.5-22-7.7c-3.8-3.1-7.6-5.7-12.6-2.1c-0.8,0.6-2.4,0.1-3.4,0.6c-2.1,0.9-4.4,1.8-6,3.3
                        c-3.3,3-5.9,6.6-9.2,9.7c-5,4.7-10.6,8.9-15.4,13.8c-14.3,14.9-31.3,24.3-51.9,26.9c-3.5,0.4-6.8,1.9-10.2,2.8c-10.7,0-21.3,0-32,0
                        c-1.6-0.5-3.2-1.3-4.9-1.6c-13.3-2-26.7-3.6-39.9-6c-20.8-3.9-40.8-10.2-59.6-20.1c-15.4-8.1-27.8-19.3-37.8-33.7
                        c-13.1-19.1-14.5-39.3-8.8-61c1.6-6.2,2.4-12.7,2.8-19.1c0.5-7.7,0-15.5,0.1-23.3c0.3-17.3,0.5-34.6,1-51.9
                        c0.2-6.8,0.6-13.6,1.4-20.3c2.4-19.9,5.6-39.7,7.5-59.6c1.4-14.3,1.8-28.6,9-41.7c4-7.3,7.6-14.8,11-22.4
                        C64.9,26.5,77,20.6,90.4,18.4c7.8-1.3,16.2,1,24.4,1.9c4.2,0.5,8.5,1,12.5,2.4c3.5,1.3,6.1,0.7,9.3-0.8c4.7-2.2,9.8-3.5,14.8-5.1
                        c3.8-1.2,8.7-1.3,11.4-3.8c12.2-11.3,32.5-13.7,46-3.9c5.1,3.7,10.5,4.2,16.2,5.1c9.2,1.5,19.2-3.9,27.7,3.2c0.1,0.1,0.3,0,0.5,0
                        c7.2,2.5,14.8,4.1,21.4,7.7c9.5,5.2,19.6,10.4,22,22.8c0.1,0.7,0.8,1.6,1.4,2c9.5,5.9,12.7,16.3,17.8,25.3c2.1,3.7,2.8,8.5,3.1,12.8
                        c0.4,6.1-0.4,12.3-0.1,18.4c0.6,11.2,2.7,22.4,0.8,33.7c-0.5,2.8,0,5.9,0.5,8.7c0.5,3,1.4,6,2.1,9c0.4,1.6,0.4,3.3,1.1,4.7
                        c5.4,9.9,11.6,19.4,16.4,29.5c5.6,11.7,13.4,22.7,13.7,36.5c0.1,3,1.3,6.3,2.9,8.9c4.2,6.8,8.6,13.4,13.4,19.7
                        c2.3,3.1,2.5,5.1-0.5,7.4c-0.8,0.6-1.3,1.4-2,2.2c4.7,9.4,12.9,15.3,20.2,22c0.9,0.8,3,1.2,4.1,0.8c3.7-1.4,5.2,0.9,6.6,3.4
                        C399.2,294.9,400,297,401,299z M314,243.1c-0.6,0.2-1.3,0.3-1.9,0.5c0,8.8-0.2,17.5,0.1,26.3c0.2,6.6-0.9,14.1,1.8,19.6
                        c7.2,15,18.5,26.7,34.9,32.2c5.3,1.8,10.8,3.2,16.1,4.9c6.2,1.9,9.9-1.3,9.3-7.7c-0.6-6.6-2.1-12.3-7.8-16.5c-2.7-2-4.6-5.2-6.7-8
                        c-3.4-4.4-6.6-8.9-9.9-13.4c-3,1.7-5.9,4.4-8.5-0.3c-3.6-6.5-6.9-13.2-10.9-19.5C326,254.3,321.2,247.5,314,243.1z M313.7,298.4
                        c0.4,7.7,0.7,15.3,1.3,22.8c0.1,1.2,1.5,2.5,2.6,3.2c3.8,2.4,7.5,5.1,11.7,6.6c5.6,2,11.5,3,17.2,4.5c0.2-0.5,0.3-0.9,0.5-1.4
                        C336,322.3,325,310.5,313.7,298.4z"/>
                    </svg>                    
                </div>

            <!-- 
            <div id="footer">
                Copyright&#9400;阿婆柑仔店, all rights reserved
            </div> -->
        </div>






















        <!-- 我是手機版 -->
        <div class="mobileCust">
            <div class="publicStep">
                <div class="publicStepInside">
                    <img src="img/custImg/step/cartapo1.png" alt="cartapo1" class="step1img">
                </div>
                <div class="publicStepLine">
                    <img src="img/custImg/step/right.png" alt="line">
                </div>
                <div class="publicStepInside">
                    <img src="img/custImg/step/cartapo2-1.png" alt="cartapo2" class="step2img">
                </div>
                <div class="publicStepLine">
                    <img src="img/custImg/step/right.png" alt="line">
                </div>
                <div class="publicStepInside">
                    <img src="img/custImg/step/cartapo3-1.png" alt="cartapo3" class="step3img">
                </div>

            </div>
            <div class="custProduct">
                <!-- <p>您的包包</p> -->
                        <h2 class="custBagName2" id="mobcustBagName2">您選擇的包包</h2>

                        <div id="mobdropzone">
                            <div class="forClip clip0">
                                <img id="large4" src="./img/custImg/images/big/tour_1.png">
                                <!-- <div class="dropzoneContent">
                                    <img id="mobimage" src="">
                                </div> -->

                               <div class="dropzoneContent">
                                    <div id="mobdropzoneContent1">
                                        <span id="mobdropzoneContentimage1"></span>
                                    </div>                                    
                                    <div id="mobdropzoneContent2">
                                        <img id="mobdropzoneContentimage2" src="">
                                    </div>
                                    <div id="mobdropzoneContent3">
                                        <img id="mobdropzoneContentimage3" src="">
                                    </div>
                                </div>  
                                
                                
                            </div>
                            
                        </div>
                        總金額:<span id="subtotal2" class="odometer">100</span><span>元</span>
            </div>
            <div class="step1234">
                <div class="step1">
                    <span class="nowrap m-t-20 inline-block nameBag fontWeight">替您包包命名</span><input type="text" class="custBagName1" placeholder="請輸入0~5字" maxLength="5">
                        <input type="button" class="putWord btn" id="mobputWord2" value="送出"/>

                    <p>一、挑選您要的款式</p>
                    <div class="threeBag">
                            <?php while ($mobprodRow = $mobpdoStatement->fetch()){ ?>
                                <div class="smallThreeBag">
                                    <img src="<?php echo $mobprodRow["image_path"];?>" id="<?php echo 'bag'.$mobprodRow["bag_id"];?>">
                                    <span><?php echo $mobprodRow["price"]?></span><span>元</span>
                                </div>
                            <?php
                            }
                            ?>  
                        <!-- <img src="./img/custImg/images/small/tour_SP_1.png">
                        <img src="./img/custImg/images/small/tour_SP_2.png">
                        <img src="./img/custImg/images/small/tour_SP_3.png"> -->
                    </div>
                    <button class="step1Button btn">下一步</button>
                </div>
                <div class="step2">
                    <!-- <form class="textform" method="post" accept-charset="utf-8" name="form1">
                        <input name="hidden_data" id='mobhidden_data' type="hidden" />
                        <span>一、輸入文字:</span><input type="text" id="mobmyWord" placeholder="輸入0~5個字"/>
                        <input type="button" class="putWord btn" id="mobputWord" value="送出"/>
                    </form>                     -->
                    <p>二、選擇您要的圖案</p>
                    <div class="custChoose">
                        <img src="./img/custImg/custTatto/custTatto1.png" class="SS1 mobtattooss">
                        <img src="./img/custImg/custTatto/custTatto4.png" class="SS2 mobtattooss">
                        <img src="./img/custImg/custTatto/custTatto3.png" class="SS3 mobtattooss">
                    </div>

                    <div id="mobbtns">
                        <i class="fas fa-search-plus" id="mobscaleBig"></i>
                        <!-- <i class="fas fa-plus-square" id="mobscaleBig"></i> -->
                        <i class="fas fa-search-minus" id="mobscaleSmall"></i>
                        <!-- <i class="fas fa-minus-square" id="mobscaleSmall"></i> -->
                        <i class="fas fa-undo" id="mobclockwise"></i>
                        <i class="fas fa-undo" id="mobclockwiseReverse"></i>
                        <i class="fas fa-trash-alt" id="mobremoveImg"></i>
                    </div>
                    <label for="mobfileUpload">
                        <input type="file" id="mobfileUpload" style="display:none">
                        <p class="lineheight">三、上傳您的圖案</p><button class="btn nonefountion">上傳</button><p>8M內，jpg、png之圖檔。</p>
                        <!-- <p>8M內，jpg、png</p> -->
                        <!-- <p>之圖檔。</p> -->
                    </label>
                    <button class="step2BackButton btn">上一步</button><button class="step2Button btn" id="step2Button">製作完畢</button>
                </div>

                
                <div class="step3">
                    <p>挑選您要的禮品最多四樣</p>

                    <div class="img-group">
                        <div class="small-img">
                            <button class="btnsmall img-small-1 active">糖果</button>
                            <button class="btnsmall img-small-2">童玩</button>
                            <button class="btnsmall img-small-3">餅乾</button>
                            <button class="btnsmall img-small-4">飲料</button>
                        </div>
                        <div class="big-img2">
                            <div class="owlOut">
                                <div class="owlLeft">
                                    <i class="fas fa-arrow-left arrowL prev"></i>
                                </div>
                                <div class="owlMiddle big-img">
                                    <div class="session img-big-1 active owl-carousel owl-theme">
                                            <?php while ($mobprodRow2 = $mobpdoStatement2->fetch()){ ?>                                        
                                                <div class="flex">
                                                    <span id="<?php  echo 'P'.$mobprodRow2["product_id"];?>" class="addpro">
                                                    <img src="<?php  echo $mobprodRow2["image_path"];?>">
                                                    <input type="hidden" value="<?php  echo $mobprodRow2["name"];?>|<?php  echo $mobprodRow2["image_path"];?>|<?php  echo $mobprodRow2["price"];?>">
                                                    </span>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                    </div>
                                    <div class="session img-big-2 owl-carousel owl-theme">
                                            <?php while ($mobprodRow3 = $mobpdoStatement3->fetch()){ ?>                                        
                                                <div class="flex">
                                                    <span id="<?php  echo 'P'.$mobprodRow3["product_id"];?>" class="addpro">
                                                    <img src="<?php  echo $mobprodRow3["image_path"];?>">
                                                    <input type="hidden" value="<?php  echo $mobprodRow3["name"];?>|<?php  echo $mobprodRow3["image_path"];?>|<?php  echo $mobprodRow3["price"];?>">
                                                    </span>
                                                </div>
                                            <?php
                                                }
                                            ?>

                                    </div>
                                    <div class="session img-big-3 owl-carousel owl-theme">
                                            <?php while ($mobprodRow4 = $mobpdoStatement4->fetch()){ ?>                                        
                                                <div class="flex">
                                                    <span id="<?php  echo 'P'.$mobprodRow4["product_id"];?>" class="addpro">
                                                    <img src="<?php  echo $mobprodRow4["image_path"];?>">
                                                    <input type="hidden" value="<?php  echo $mobprodRow4["name"];?>|<?php  echo $mobprodRow4["image_path"];?>|<?php  echo $mobprodRow4["price"];?>">
                                                    </span>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                    </div>
                                    <div class="session img-big-4 owl-carousel owl-theme">
                                            <?php while ($mobprodRow5 = $mobpdoStatement5->fetch()){ ?>                                        
                                                <div class="flex">
                                                    <span id="<?php  echo 'P'.$mobprodRow5["product_id"];?>" class="addpro">
                                                    <img src="<?php  echo $mobprodRow5["image_path"];?>">
                                                    <input type="hidden" value="<?php  echo $mobprodRow5["name"];?>|<?php  echo $mobprodRow5["image_path"];?>|<?php  echo $mobprodRow5["price"];?>">
                                                    </span>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                    </div>
                                </div>
                                <div class="owlRight">
                                    <i class="fas fa-arrow-right arrowR next"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="step3BackButton btn">上一步</button><button class="step3Button btn" id="step3Button">加入購物車</button>
                </div>
                <div class="step4">
                    <p>完成設計</p>
                        <div class="step4finall step4share">

                        <!-- <i class="col-md-3 fas fa-file-upload"><span>&nbsp;分享至客製化</span></i> -->

                           <a href="products-main.php?tab_btn=0#custedProd" id="updateButton"><img src="./img/custImg/icon/upload_2-1.png" alt="">
                            <span>分享至客製化</span></a>
                        </div>
                        <div class="step4finall step4download">
                            <a href="" id="mobcustImgDownload" download>
                            <img src="./img/custImg/icon/download_2.png" alt="">
                            <span>下載圖片</span></a>
                        </div>
                        <div class="step4finall step4event">
                            <a href="event.php">
                            <img src="./img/custImg/icon/share_2.png" alt="">
                            <span>報名活動</span>    
                            </a>                        
                        </div>
                    <!-- <button class="step1Button btn">下一步</button> -->
                </div>                

            </div>

        </div>
        <div id="footer">
            Copyright&#9400;阿婆柑仔店, all rights reserved
        </div>
        <!--左右兩邊黑膠商品-->
        <div class="filmroll">
            <div id="ann_box3" class="ann2">
                <div id="bul3_1" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg01.png" alt="bag"></a>
                </div>
                <div id="bul3_2" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg02.png" alt="bag"></a>
                </div>
                <div id="bul3_3" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg03.png" alt="bag"></a>
                </div>
                <div id="bul3_4" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg04.png" alt="bag"></a>
                </div>
                <div id="bul3_5" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg05.png" alt="bag"></a>
                </div>
                <div id="bul3_6" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg06.png" alt="bag"></a>
                </div>
                <div id="bul3_7" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg01.png" alt="bag"></a>
                </div>
                <div id="bul3_8" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg02.png" alt="bag"></a>
                </div>
                <div id="bul3_9" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg03.png" alt="bag"></a>
                </div>
                <div id="bul3_10" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg04.png" alt="bag"></a>
                </div>
                <div id="bul3_11" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg05.png" alt="bag"></a>
                </div>
            </div>
        </div>
        <div class="filmroll2">
            <div id="ann_aox3" class="ann2">
                <div id="aul3_1" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg01.png" alt="bag"></a>
                </div>
                <div id="aul3_2" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg02.png" alt="bag"></a>
                </div>
                <div id="aul3_3" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg03.png" alt="bag"></a>
                </div>
                <div id="aul3_4" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg04.png" alt="bag"></a>
                </div>
                <div id="aul3_5" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg05.png" alt="bag"></a>
                </div>
                <div id="aul3_6" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg06.png" alt="bag"></a>
                </div>
                <div id="aul3_7" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg01.png" alt="bag"></a>
                </div>
                <div id="aul3_8" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg02.png" alt="bag"></a>
                </div>
                <div id="aul3_9" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg03.png" alt="bag"></a>
                </div>
                <div id="aul3_10" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg04.png" alt="bag"></a>
                </div>
                <div id="aul3_11" class="ann3">
                    <a href="products-main.php?tab_btn=0#custedProd"><img src="img/section3/rollimg05.png" alt="bag"></a>
                </div>
            </div>
        </div>
    </div>


<!-- <script src="./js/plugin/jquery-1.11.0.min.js"></script> -->
<!-- <script src="./js/plugin/jquery-migrate-1.2.1.min.js"></script>
<script src="./js/plugin/slick.min.js"></script> -->


</body>

<?php require_once("selfJs.html") ?>

<!-- 翻書 -->
<script type="text/javascript">

    function loadApp() {

        // Create the flipbook
        $('.flipbook').turn({
            // Width
            width: 922,

            // Height
            height: 600,

            // Elevation
            elevation: 50,

            // Enable gradients(翻頁時是否顯示翻頁跟陰影)
            gradients: true,

            // //duration (動畫持續時間即翻頁的快慢)
            // duration:600,
            // Auto center this flipbook(預設false，是否居中)
            autoCenter: true,

            page: 1,

            // cornerSize: 300,

        });
        // $('.flipbook').flip({

        //    cornerSize: 300,

        // });

    }

    // Load the HTML4 version if there's not CSS transform

    yepnope({
        test: Modernizr.csstransforms,
        yep: ['./js/self/turn.js'],
        nope: ['/js/plugin/turn.html4.min.js'],
        complete: loadApp
    });

</script>

<!-- 書面翻轉效果 -->
<script>//書面翻轉效果
    var abc = document.querySelector('.flipbook-viewport .flipbook');
    abc.addEventListener('mouseover', function () {
        document.querySelector('.flipbook-viewport').style.transform = "perspective(300px) rotateX(0deg)";
    });
</script>


<!--手機板商品選擇-->
<script type="text/javascript">
    $(function () {
        $('.img-small-1').click(function () {
            $('.big-img .active').removeClass('active');
            $('.small-img .active').removeClass('active');

            $('.img-big-1').addClass('active');
            $('.img-small-1').addClass('active');
        })

        $('.img-small-2').click(function () {
            $('.big-img .active').removeClass('active');
            $('.small-img .active').removeClass('active');

            $('.img-big-2').addClass('active');
            $('.img-small-2').addClass('active');
        })

        $('.img-small-3').click(function () {
            $('.big-img .active').removeClass('active');
            $('.small-img .active').removeClass('active');

            $('.img-big-3').addClass('active');
            $('.img-small-3').addClass('active');
        })

        $('.img-small-4').click(function () {
            $('.big-img .active').removeClass('active');
            $('.small-img .active').removeClass('active');

            $('.img-big-4').addClass('active');
            $('.img-small-4').addClass('active');
        })
    })

</script>

<!--手機板商品選擇按鈕前進後退-->
<script>
    $('.step1Button').click(function () {
        $('.step1').css({
            'display': 'none',
        });
        $('.step2').css({
            'display': 'block',
        });
        $('.step1img').attr('src','img/custImg/step/cartapo1-1.png');
        $('.step2img').attr('src','img/custImg/step/cartapo2.png');

    });
    $('.step2Button').click(function () {
        $('.step2').css({
            'display': 'none',
        });
        $('.step3').css({
            'display': 'block',
        });
        $('.step2img').attr('src','img/custImg/step/cartapo2-1.png');
        $('.step3img').attr('src','img/custImg/step/cartapo3.png');

    });

    $('.step2BackButton').click(function () {
        $('.step2').css({
            'display': 'none',
        });
        $('.step1').css({
            'display': 'block',
        });
        $('.step1img').attr('src','img/custImg/step/cartapo1.png');
        $('.step2img').attr('src','img/custImg/step/cartapo2-1.png');

    });
    $('.step3BackButton').click(function () {
        $('.step3').css({
            'display': 'none',
        });
        $('.step2').css({
            'display': 'block',
        });
        $('.step3img').attr('src','img/custImg/step/cartapo3-1.png');
        $('.step2img').attr('src','img/custImg/step/cartapo2.png');

    });


</script>
<!-- 自家JS -->
<script src="./js/self/cust.js"></script>
<!-- Canvas遮罩 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.1.0/fabric.all.min.js"></script>
<!-- 登入檢測 -->
<!-- <script src="js/self/loginCheck.js"></script> -->
<!-- 會員登入 -->
<!-- <script src="js/self/ajax_memberLogin.js"></script> -->
<!-- <script src="./js/self/nav.js"></script> -->
<!-- nav JS -->
<!-- <script src="./js/self/addtocart.js"></script> -->
</html>