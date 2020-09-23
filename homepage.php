<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("head.html"); ?>


    <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
            <!-- Swiper v4.1.0 -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/fullpage.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    
    <script src="js/plugin/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.5/jquery.fullpage.min.js"></script>
    <script src="js/plugin/parallax.js"></script>
    <script src="js/plugin/m_3d_carousel.js"></script>
    
    <script src="js/plugin/owl.carousel.min.js"></script>
        <!-- Swiper JS -->
    <script src="js/plugin/swiper.min.js"></script>
    <title>阿婆柑仔店</title>
</head>


<body>


<!-- NAV NAV NAV -->
<?php require_once("nav.html"); ?>

<!-- 會員登入燈箱 -->
<?php require_once("loginBox.html"); ?>

<!-- 發起活動燈箱 -->
<?php require_once("createEvent.php"); ?>





    <div id="fullpage">

       <!-- HAO HAO HAO -->

    <!-- 第一屏開始 -->
    <div id="home1" class="section">
        <!-- 第一屏背景圖 -->
        <div class="rwdbg">
            <img src="./img/section1/homebg.gif" alt="" class="rwdbg1">
            <img src="./img/section1/store1.png" alt="" class="rwdstore">
        </div>
        <!-- 第一屏標題 -->
        <div class="home1-title">
            <p>阿婆柑仔店，乘載記憶的60年代，彈珠汽水、涼煙糖、果汁條，好不滿足，阿婆柑仔店，記憶中的兒時天堂! </p>
        </div>
        <!-- 第一屏圖片 -->
        <ul id="Parallax-home1">
            <li class="p1-store" data-depth="0.00"><img src="img/section1/store1.png" alt="柑仔店"></li>
            <li class="p1-img01" data-depth="0.10"><img src="img/section1/01.png" alt="沙士糖"></li>
            <li class="p1-img02" data-depth="0.30"><img src="img/section1/02.png" alt="黃金棒棒糖"></li>
            <li class="p1-img03" data-depth="0.10"><img src="img/section1/03.png" alt="牛奶糖"></li>
            <li class="p1-img04" data-depth="0.20"><img src="img/section1/04.png" alt="嗶嗶糖"></li>
            <li class="p1-img05" data-depth="0.80"><img src="img/section1/05.png" alt="橘子糖"></li>
            <li class="p1-img06" data-depth="0.10"><img src="img/section1/06.png" alt="傘糖"></li>
            <li class="p1-img07" data-depth="0.10"><img src="img/section1/07.png" alt="足球糖"></li>
            <li class="p1-img08" data-depth="0.10"><img src="img/section1/08.png" alt="草莓糖"></li>
            <li class="p1-img09" data-depth="0.10"><img src="img/section1/09.png" alt="巧克力糖"></li>
            <li class="p1-img10" data-depth="0.50"><img src="img/section1/10.png" alt="王子麵"></li>
            <li class="p1-img11" data-depth="0.20"><img src="img/section1/11.png" alt="涼菸糖"></li>
            <li class="p1-img12" data-depth="0.10"><img src="img/section1/12.png" alt="鑽石糖"></li>
            <li class="p1-img13" data-depth="0.10"><img src="img/section1/13.png" alt="沙沙糖"></li>
            <li class="p1-img14" data-depth="0.10"><img src="img/section1/14.png" alt="手槍巧克力"></li>
            <li class="p1-img15" data-depth="0.20"><img src="img/section1/15.png" alt="口紅糖"></li>
            <li class="p1-img16" data-depth="0.10"><img src="img/section1/16.png" alt="汽水糖"></li>
        </ul>
    </div>
    
    <!-- 第二屏開始 -->
    <div id="home2" class="section home-section">
        <!-- 第二屏背景圖 -->
        <div class="rwdbg">
            <img src="./img/section1/h1bg.png" alt="" class="rwdbg1">
        </div>
        <!-- 第二屏標題 -->
        <h1 class="hometitle">客製商品
            <div class="title-circle circle1"></div>
            <div class="title-circle circle2"></div>
            <div class="title-circle circle3"></div>
            <div class="title-circle circle4"></div>
            <div class="title-circle circle5"></div>
            <div class="title-circle circle6"></div>
            <div class="title-circle circle7"></div>
            <div class="title-circle circle8"></div>
            <div class="title-circle circle9"></div>
            <div class="title-circle circle10"></div>
            <div class="title-circle circle11"></div>
            <div class="title-circle circle12"></div>
            <div class="title-circle circle13"></div>
            <div class="title-circle circle14"></div>
            <div class="title-circle circle15"></div>
            <div class="title-circle circle16"></div>
            <div class="title-circle circle17"></div>
            <div class="title-circle circle18"></div>
            <div class="title-circle circle19"></div>
            <div class="title-circle circle20"></div>
            <div class="title-circle circle21"></div>
            <div class="title-circle circle22"></div>
            <div class="title-circle circle23"></div>
            <div class="title-circle circle24"></div>
        </h1>
        <!-- 客製化第一步介紹 -->
        <div class="intro">
            <img src="./img/section3/banner.jpg" alt="">
            <div class="introtext">挑選一款中意的袋子設計外觀， 最後選擇懷舊商品，快一起來完成專屬的客製化禮盒！</div>            
        </div>
        <!-- 左邊滾動膠捲 -->
        <div class="filmroll">
            <div id="ann_box3" class="ann2">
                <div id="bul3_1" class="ann3">
                    <a href="products.php?product_id=33"><img src="img/section3/rollimg01.png" alt=""></a>
                </div>
                <div id="bul3_2" class="ann3">
                    <a href="products.php?product_id=34"><img src="img/section3/rollimg02.png" alt=""></a>
                </div>
                <div id="bul3_3" class="ann3">
                    <a href="products.php?product_id=35"><img src="img/section3/rollimg03.png" alt=""></a>
                </div>
                <div id="bul3_4" class="ann3">
                    <a href="products.php?product_id=36"><img src="img/section3/rollimg04.png" alt=""></a>
                </div>
                <div id="bul3_5" class="ann3">
                    <a href="products.php?product_id=38"><img src="img/section3/rollimg06.png" alt=""></a>
                </div>
                <div id="bul3_6" class="ann3">
                    <a href="products.php?product_id=37"><img src="img/section3/rollimg05.png" alt=""></a>
                </div>
                <div id="bul3_7" class="ann3">
                    <a href="products.php?product_id=33"><img src="img/section3/rollimg01.png" alt=""></a>
                </div>
                <div id="bul3_8" class="ann3">
                    <a href="products.php?product_id=34"><img src="img/section3/rollimg02.png" alt=""></a>
                </div>
                <div id="bul3_9" class="ann3">
                    <a href="products.php?product_id=35"><img src="img/section3/rollimg03.png" alt=""></a>
                </div>
                <div id="bul3_10" class="ann3">
                    <a href="products.php?product_id=36"><img src="img/section3/rollimg04.png" alt=""></a>
                </div>
                <div id="bul3_11" class="ann3">
                    <a href="products.php?product_id=37"><img src="img/section3/rollimg05.png" alt=""></a>
                </div>
            </div>
        </div>
        <!-- 3款客製背包 -->
        <a href="cust.php">
            <img src="img/section3/madebag1.png" alt="菜籃包" class="madebag1 shake-slow">
            <p class="madebag1font">經典款</p>
        </a>
        <a href="cust.php">
            <img src="img/section3/madebag2.png" alt="側背包" class="madebag2 shake-slow">
            <p class="madebag2font">側背款</p>
        </a>
        <a href="cust.php">
            <img src="img/section3/madebag3.png" alt="後背包" class="madebag3 shake-slow">
            <p class="madebag3font">後背款</p>
        </a>
    </div>

    <!-- 第三屏開始 -->
    <div id="home3" class="section home-section"> 
        <!-- 第三屏標題 -->           
        <h1 class="hometitle">推薦
            <div class="title-circle circle1"></div>
            <div class="title-circle circle2"></div>
            <div class="title-circle circle3"></div>
            <div class="title-circle circle4"></div>
            <div class="title-circle circle5"></div>
            <div class="title-circle circle6"></div>
            <div class="title-circle circle7"></div>
            <div class="title-circle circle8"></div>
            <div class="title-circle circle9"></div>
            <div class="title-circle circle10"></div>
            <div class="title-circle circle11"></div>
            <div class="title-circle circle12"></div>
            <div class="title-circle circle13"></div>
            <div class="title-circle circle14"></div>
            <div class="title-circle circle15"></div>
            <div class="title-circle circle16"></div>
            <div class="title-circle circle17"></div>
            <div class="title-circle circle18"></div>
            <div class="title-circle circle19"></div>
            <div class="title-circle circle20"></div>
            <div class="title-circle circle21"></div>
            <div class="title-circle circle22"></div>
            <div class="title-circle circle23"></div>
            <div class="title-circle circle24"></div>
        </h1>            
        <!-- 漂浮雲 -->
        <div class="main_window">
            <div class="cloud" data-type="white_4" style="top: 238px;" data-speed="1"></div>
            <div class="cloud" data-type="white_2" style="top: 252px;" data-speed="2"></div>
            <div class="cloud" data-type="white_1" style="top: 285px;" data-speed="4"></div>
            <div class="cloud" data-type="white_5" style="top: 391px;" data-speed="5"></div>
            <div class="cloud" data-type="white_6" style="top: 197px;" data-speed="8"></div>
        </div>
        <!-- 移動房子 -->
        <div class="movehouse"></div>
        <!-- 跳動阿婆 -->
        <div class="moveapo">
            <div class="topbox">
                <img src="img/section2/question-brick.jpg" alt="">
                <img src="img/section2/frontcoin.png" alt="" class="frontcoin">
            </div>
            <div class="jumpapo">
                <img src="./img/section2/Apo.gif">
            </div>
        </div>
        <!-- 推薦問答 -->
        <div class="page3">
            <div class="ans" id="first">
                <div class="title">您的個性是屬於喜歡追求刺激、富有冒險精神，或是穩健從容、理智客觀？</div>
                <div class="connentOutside">
                    <ul class="connent" id="a1_1">
                        <li>追求刺激、富有冒險精神</li>
                    </ul>
                    <ul class="connent" id="a1_2">
                        <li>穩健從容、循規蹈矩</li>
                    </ul>
                </div>
            </div>
            <div class="ans hidden" id="q2_1">
                <div class="title">您是否有夢想成為一位飛行員遨遊在天際？</div>
                <div class="connentOutside">
                    <ul class="connent" id="a2_1_1">
                        <li>是</li>
                    </ul>
                    <ul class="connent" id="a2_1_2">
                        <li>否</li>
                    </ul>
                </div>
            </div>
            <div class="ans hidden" id="q2_2">
                <div class="title">您的處事態度是不甘屈服世俗、富有主見，或是隨而安、知足常樂？</div>
                <div class="connentOutside">
                    <ul class="connent" id="a2_2_1">
                        <li>不甘屈服世俗、富有主見</li>
                    </ul>
                    <ul class="connent" id="a2_2_2">
                        <li>隨遇而安、知足常樂</li>
                    </ul>
                </div>
            </div>
            <div class="ans hidden" id="q3_1_1">
                <div class="title">休假時您偏好去遊樂園遊玩或是逛美食街品嘗美食？</div>
                <div class="connentOutside">
                    <ul class="connent" id="a3_1_1_1">
                        <li>遊樂園</li>
                    </ul>
                    <ul class="connent" id="a3_1_1_2">
                        <li>美食街</li>
                    </ul>
                </div>
            </div>
            <div class="ans hidden" id="q3_1_2">
                <div class="title">您喜歡低調內斂的奢華或是引人注目的光彩？</div>
                <div class="connentOutside">
                    <ul class="connent" id="a3_1_2_1">
                        <li>低調的奢華</li>
                    </ul>
                    <ul class="connent" id="a3_1_2_2">
                        <li>奪目的光彩</li>
                    </ul>
                </div>
            </div>
            <div class="ans hidden" id="q3_2_1">
                <div class="title">您的內心是成熟的大人還是富有童心的小孩？</div>
                <div class="connentOutside">
                    <ul class="connent" id="a3_2_1_1">
                        <li>成熟的大人</li>
                    </ul>
                    <ul class="connent" id="a3_2_1_2">
                        <li>童心的小孩</li>
                    </ul>
                </div>
            </div>
            <div class="ans hidden" id="q3_2_2">
                <div class="title">您嚮往轟轟烈烈的愛情還是細水長流的相依？</div>
                <div class="connentOutside">
                    <ul class="connent" id="a3_2_2_1">
                        <li>轟轟烈烈的愛情</li>
                    </ul>
                    <ul class="connent" id="a3_2_2_2">
                        <li>細水長流的相依</li>
                    </ul>
                </div>
            </div>
            <div class="hidden" id="end">
                <div id="replay" class="btn">重新測驗</div>
            </div>
            <div class="hidden"  id="re-img">
            </div>
        </div>
    </div>

        <!-- HAO HAO HAO -->






        <!-- DEAN DEAN DEAN -->

        <div id="home4" class="section home-section">
            <h1 class="hometitle">商品
                <div class="title-circle circle1"></div>
                <div class="title-circle circle2"></div>
                <div class="title-circle circle3"></div>
                <div class="title-circle circle4"></div>
                <div class="title-circle circle5"></div>
                <div class="title-circle circle6"></div>
                <div class="title-circle circle7"></div>
                <div class="title-circle circle8"></div>
                <div class="title-circle circle9"></div>
                <div class="title-circle circle10"></div>
                <div class="title-circle circle11"></div>
                <div class="title-circle circle12"></div>
                <div class="title-circle circle13"></div>
                <div class="title-circle circle14"></div>
                <div class="title-circle circle15"></div>
                <div class="title-circle circle16"></div>
                <div class="title-circle circle17"></div>
                <div class="title-circle circle18"></div>
                <div class="title-circle circle19"></div>
                <div class="title-circle circle20"></div>
                <div class="title-circle circle21"></div>
                <div class="title-circle circle22"></div>
                <div class="title-circle circle23"></div>
                <div class="title-circle circle24"></div>
            </h1>
            


            <div id="home-sm-prod" class="wrap-height owl-carousel owl-theme">
                <a class="prod-item item" href="products-main.php?tab_btn=tab2">
                    <h2>糖果</h2>
                    <img class="item-img" src="img/section4-6/ringSugar.png" alt="">
                    <img class="item-bg" src="img/section4-6/bottle.png" alt="">
                </a>
                <a class="prod-item item" href="products-main.php?tab_btn=tab3">
                    <h2>童玩</h2>
                    <img class="item-img" src="img/section4-6/tooraw.png" alt="">
                    <img class="item-bg" src="img/section4-6/bottle.png" alt="">
                </a>
                <a class="prod-item item" href="products-main.php?tab_btn=tab4">
                    <h2>餅乾</h2>
                    <img class="item-img" src="img/section4-6/prince_noodle.png" alt="">
                    <img class="item-bg" src="img/section4-6/bottle.png" alt="">
                </a>
                <a class="prod-item item" href="products-main.php?tab_btn=tab5">
                    <h2>飲料</h2>
                    <img class="item-img" src="img/section4-6/danzu.png" alt="">
                    <img class="item-bg" src="img/section4-6/bottle.png" alt="">
                </a>
                <a class="prod-item item" href="products-main.php?tab_btn=0#custedProd">
                    <h2>客製化</h2>
                    <img class="item-img" src="img/section3/madebag3.png" alt="">
                    <img class="item-bg" src="img/section4-6/bottle.png" alt="">
                </a>
            </div>







            <div id="contentContainer" class="trans3d">
                <div id="carouselContainer" class="trans3d">
                    <figure id="carouselItem5" class="carouselItem trans3d">
                        <div class="carouselItemInner trans3d">
                            <a href="products-main.php?tab_btn=tab2">
                                <h2>糖果</h2>
                                <img src="img/section4-6/tabaco.png" alt="">
                                <img class="lightbulb" src="img/section4-6/lightbulb-bgi.png" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure id="carouselItem6" class="carouselItem trans3d">
                        <div class="carouselItemInner trans3d">
                            <a href="products-main.php?tab_btn=tab2">
                                <h2>糖果</h2>
                                <img src="img/section4-6/bubblegum.png" alt="">
                                <img class="lightbulb" src="img/section4-6/lightbulb-bgi.png" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure id="carouselItem1" class="carouselItem trans3d">
                        <div class="carouselItemInner trans3d">
                            <a href="products-main.php?tab_btn=tab3">
                                <h2>童玩</h2>
                                <img src="img/section4-6/tooraw.png" alt="">
                                <img class="lightbulb" src="img/section4-6/lightbulb-bgi.png" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure id="carouselItem2" class="carouselItem trans3d">
                        <div class="carouselItemInner trans3d">
                            <a href="products-main.php?tab_btn=tab3">
                                <h2>童玩</h2>
                                <img src="img/section4-6/gendama.png" alt="">
                                <img class="lightbulb" src="img/section4-6/lightbulb-bgi.png" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure id="carouselItem3" class="carouselItem trans3d">
                        <div class="carouselItemInner trans3d">
                            <a href="products-main.php?tab_btn=tab4">
                                <h2>餅乾</h2>
                                <img src="img/2_dianxinbing.png" alt="">
                                <img class="lightbulb" src="img/section4-6/lightbulb-bgi.png" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure id="carouselItem4" class="carouselItem trans3d">
                        <div class="carouselItemInner trans3d">
                            <a href="products-main.php?tab_btn=tab4">
                                <h2>餅乾</h2>
                                <img src="img/3_wangzhimian.png" alt="">
                                <img class="lightbulb" src="img/section4-6/lightbulb-bgi.png" alt="">
                            </a>
                        </div>
                    </figure>

                    <figure id="carouselItem7" class="carouselItem trans3d">
                        <div class="carouselItemInner trans3d">
                            <a href="products-main.php?tab_btn=tab5">
                                <h2>飲料</h2>
                                <img src="img/section4-6/danzu.png" alt="">
                                <img class="lightbulb" src="img/section4-6/lightbulb-bgi.png" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure id="carouselItem8" class="carouselItem trans3d">
                        <div class="carouselItemInner trans3d">
                            <a href="products-main.php?tab_btn=tab5">
                                <h2>飲料</h2>
                                <img src="img/section4-6/coke.png" alt="">
                                <img class="lightbulb" src="img/section4-6/lightbulb-bgi.png" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure id="carouselItem9" class="carouselItem trans3d">
                        <div class="carouselItemInner trans3d">
                            <a href="products-main.php?tab_btn=0#custedProd">
                                <h2>客製化包包</h2>
                                <img src="img/section4-6/bag1.png" alt="">
                                <img class="lightbulb" src="img/section4-6/lightbulb-bgi.png" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure id="carouselItem10" class="carouselItem trans3d">
                        <div class="carouselItemInner trans3d">
                            <a href="products-main.php?tab_btn=0#custedProd">
                                <h2>客製化包包</h2>
                                <img src="img/section4-6/bag2.png" alt="">
                                <img class="lightbulb" src="img/section4-6/lightbulb-bgi.png" alt="">
                            </a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
        <!-- HOME 4 -->










        <div id="home5" class="section home-section">
            <h1 class="hometitle">折扣遊戲
                <div class="title-circle circle1"></div>
                <div class="title-circle circle2"></div>
                <div class="title-circle circle3"></div>
                <div class="title-circle circle4"></div>
                <div class="title-circle circle5"></div>
                <div class="title-circle circle6"></div>
                <div class="title-circle circle7"></div>
                <div class="title-circle circle8"></div>
                <div class="title-circle circle9"></div>
                <div class="title-circle circle10"></div>
                <div class="title-circle circle11"></div>
                <div class="title-circle circle12"></div>
                <div class="title-circle circle13"></div>
                <div class="title-circle circle14"></div>
                <div class="title-circle circle15"></div>
                <div class="title-circle circle16"></div>
                <div class="title-circle circle17"></div>
                <div class="title-circle circle18"></div>
                <div class="title-circle circle19"></div>
                <div class="title-circle circle20"></div>
                <div class="title-circle circle21"></div>
                <div class="title-circle circle22"></div>
                <div class="title-circle circle23"></div>
                <div class="title-circle circle24"></div>
            </h1>
            <div class="wrap">
                <div class="group">
                    <div class="front"></div>
                    <div class="top">
                        <div class="square" id="square1"></div>
                        <div class="square" id="square2"></div>
                        <div class="square" id="square3"></div>
                        <div class="square" id="square4"></div>
                        <div class="square" id="square5"></div>
                        <div class="square" id="square6"></div>
                        <div class="square" id="square7"></div>
                        <div class="square" id="square8"></div>
                        <div class="square" id="square9"></div>
                        <div class="square" id="square10"></div>
                        <div class="square" id="square11"></div>
                        <div class="square" id="square12"></div>
                    </div>
                    <div class="down"></div>
                    <div class="left"></div>
                </div>
            </div>

            <div class="neon-wrap">
                <div class="neon">
                        <div>
                            <h3 class="neon-0"><span class="f-0">戳戳樂</span></h3>
                            <h3 class="neon-1">一等<span class="f-2">獎</span>：伍佰<span class="f-2">圓</span></h3>
                            <h3 class="neon-2"><span class="f-1">二等獎：</span>貳佰圓</h3>
                            <h3 class="neon-3">三等獎：<span class="f-3">壹</span>佰圓</h3>
                            <h3 class="neon-4">四<span class="f-2">等</span>獎：伍<span class="f-3">拾圓</span></h3>
                        </div>
                </div>
            </div>

            <div id="lottery">
                <button id="lottery-close" class="btn">關閉</button>
                <button id="lottery-get" class="btn">領取</button>
            </div>

            





        </div>

        <!-- HOME 5 -->



        <div id="home6" class="section home-section">
            <h1 class="hometitle">活動
                <div class="title-circle circle1"></div>
                <div class="title-circle circle2"></div>
                <div class="title-circle circle3"></div>
                <div class="title-circle circle4"></div>
                <div class="title-circle circle5"></div>
                <div class="title-circle circle6"></div>
                <div class="title-circle circle7"></div>
                <div class="title-circle circle8"></div>
                <div class="title-circle circle9"></div>
                <div class="title-circle circle10"></div>
                <div class="title-circle circle11"></div>
                <div class="title-circle circle12"></div>
                <div class="title-circle circle13"></div>
                <div class="title-circle circle14"></div>
                <div class="title-circle circle15"></div>
                <div class="title-circle circle16"></div>
                <div class="title-circle circle17"></div>
                <div class="title-circle circle18"></div>
                <div class="title-circle circle19"></div>
                <div class="title-circle circle20"></div>
                <div class="title-circle circle21"></div>
                <div class="title-circle circle22"></div>
                <div class="title-circle circle23"></div>
                <div class="title-circle circle24"></div>
            </h1>

            <?php require_once("php/home_event_create.php"); ?>


            <div id="event-wrap" class="swiper-container">
                <div class="card-carousel swiper-wrapper">
                    <div class="event-item my-card swiper-slide"></div>
                    <div class="event-item my-card swiper-slide"></div>
                    <div class="event-item my-card swiper-slide"></div>
                    <div class="event-item my-card swiper-slide"></div>
                    <div class="event-item my-card swiper-slide"></div>
                    <div class="event-item my-card swiper-slide"></div>
                    <div class="event-item my-card swiper-slide"></div>
                    <div class="event-item my-card swiper-slide"></div>
                    <div class="event-item my-card swiper-slide"></div>
                    <div class="event-item my-card swiper-slide"></div>
                </div>
            </div>






            <button class="mobile-create btn">發起<br>活動</button>
            <div class="black-bg"></div>

            <!-- <div class="toggle-btn toggle-btn1"></div>
            <div class="toggle-btn toggle-btn2"></div> -->
            <div class="slider3d_left"><img src="./img/faq/left.png" alt=""></div>
            <div class="slider3d_right"><img src="./img/faq/right.png" alt=""></div>



        </div>

        <!-- HOME 6 -->







        <div id="home7" class="section home-section">
            <h1 class="hometitle">店鋪
                <div class="title-circle circle1"></div>
                <div class="title-circle circle2"></div>
                <div class="title-circle circle3"></div>
                <div class="title-circle circle4"></div>
                <div class="title-circle circle5"></div>
                <div class="title-circle circle6"></div>
                <div class="title-circle circle7"></div>
                <div class="title-circle circle8"></div>
                <div class="title-circle circle9"></div>
                <div class="title-circle circle10"></div>
                <div class="title-circle circle11"></div>
                <div class="title-circle circle12"></div>
                <div class="title-circle circle13"></div>
                <div class="title-circle circle14"></div>
                <div class="title-circle circle15"></div>
                <div class="title-circle circle16"></div>
                <div class="title-circle circle17"></div>
                <div class="title-circle circle18"></div>
                <div class="title-circle circle19"></div>
                <div class="title-circle circle20"></div>
                <div class="title-circle circle21"></div>
                <div class="title-circle circle22"></div>
                <div class="title-circle circle23"></div>
                <div class="title-circle circle24"></div>
            </h1>



            <div class="store-light store-light1"></div>
            <div class="store-light store-light2"></div>
            <div class="store-light store-light3"></div>
            <div class="store-light store-light4"></div>
            <div class="store-light store-light5"></div>
            <div class="store-light store-light6"></div>
            <div class="store-light store-light7"></div>
            <div class="store-light store-light8"></div>
            <div class="store-light store-light9"></div>
            <div class="store-light store-light10"></div>
            <div class="store-light store-light11"></div>
            <div class="store-light store-light12"></div>
            <div class="store-light store-light13"></div>
            <div class="store-light store-light14"></div>
            <div class="store-light store-light15"></div>
            <div class="store-light store-light16"></div>
            <div class="store-light store-light17"></div>
            <div class="store-light store-light18"></div>
            <div class="store-light store-light19"></div>
            <div class="store-light store-light20"></div>
            <div class="store-light store-light21"></div>
            <div class="store-light store-light22"></div>
            <div class="store-light store-light23"></div>
            <div class="store-light store-light24"></div>
            <div class="store-light store-light25"></div>
            <div class="store-light store-light26"></div>
            <div class="store-light store-light27"></div>
            <div class="store-light store-light28"></div>
            <div class="store-light store-light29"></div>
            <div class="store-light store-light30"></div>
            <div class="store-light store-light31"></div>
            <div class="store-light store-light32"></div>
            <div class="store-light store-light33"></div>
            <div class="store-light store-light34"></div>
            <div class="store-light store-light35"></div>
            <div class="store-light store-light36"></div>
            <h2>五店鋪</h2>

            <div class="flex-wrap">
                <a href="store.php#store1" class="store store1">
                    <div class="lightbar"></div>
                    <div class="store-info">
                        <h3>逢甲店鋪</h3>
                        <p>看更多</p>
                    </div>
                </a>
                <a href="store.php#store2" class="store store2">
                    <div class="lightbar"></div>
                    <div class="store-info">
                        <h3>北港店鋪</h3>
                        <p>看更多</p>
                    </div>
                </a>
                <a href="store.php#store3" class="store store3">
                    <div class="lightbar"></div>
                    <div class="store3-bg">
                    <div class="store-info">
                        <h3>鹿港店鋪</h3>
                        <p>看更多</p>
                    </div>
                    </div>
                </a>
                <a href="store.php#store4" class="store store4">
                    <div class="lightbar"></div>
                    <div class="store-info">
                        <h3>新港店鋪</h3>
                        <p>看更多</p>
                    </div>
                </a>
                <a href="store.php#store5" class="store store5">
                    <div class="lightbar"></div>
                    <div class="store-info">
                        <h3>中央店鋪</h3>
                        <p>看更多</p>
                    </div>
                </a>
            </div>





            <div id="footer">
                Copyright&#9400;阿婆柑仔店, all rights reserved
            </div>
        </div>
        <!--HOME 7-->


        <!-- DEAN DEAN DEAN -->


    </div>
    <!--FULL PAGE-->



</body>

<?php require_once("selfJs.html"); ?>

<script src="js/self/home_recommend.js"></script>
<script src="js/self/ajax_home_event.js"></script>
<script src="js/self/store-roller.js"></script>
<script src="js/self/gamebox.js"></script>
<!-- <script src="js/self/fadeinout-carousel.js"></script> -->
<script src="js/self/call_owl_carousel.js"></script>
<script src="js/self/slideline.js"></script>
<script src="js/self/jumpapo.js"></script>
<script src="js/self/eventLightBox.js"></script>
<script src="js/self/ajax_createEvent.js"></script>

<script>
    $(function () {
        $('#fullpage').fullpage({
            css3: true,
            navigation: true,
            navigationColor: '#002552',
            navigationPosition: "right",
            navigationTooltips: ['形象頁面', '客製商品', '推薦商品','一般商品','折扣遊戲','活動','店鋪']
        });
    });

    var scene = document.getElementById('Parallax-home1');
    var parallaxInstance = new Parallax(scene);
</script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    // loop: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows : true,
    },
    pagination: {
    el: '.swiper-pagination',
    },
});
</script>

</html>