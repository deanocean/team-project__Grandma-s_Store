<?php 
$errMsg="";
try
{
    require_once("php/connectCd104g1.php");
    $sql2="SELECT P.product_id, P.name,P.category,P.score, P.description, P.price, P.is_on_shelves, PI.image_path FROM product P join product_image PI on P.product_id=PI.product_id WHERE P.is_on_shelves =0  ORDER BY P.score DESC limit 10" ;
    $pdoStatement2 = $pdo->query($sql2);
    $product2 = $pdoStatement2->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="Shortcut Icon" type="image/x-icon" href="img/Apo/apoIcon.ico" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/animation.css">
        <link rel="stylesheet" href="css/public.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Swiper v4.1.0 -->
        <link rel="stylesheet" href="css/swiper.min.css">
          <!-- Swiper JS -->
        <script src="js/plugin/swiper.min.js"></script>
        <title>阿婆柑仔店</title>
</head>

<body class="pro-body">

    <div class="rwdbg">
        <img src="img/section1/homebg.gif" alt="" class="rwdbg1">
    </div>

<?php  
    require_once("nav.html");
?>
<?php require_once("loginBox.html"); ?>

<div class="pro-main">
<!-- 商品第一屏佈告欄  商品第一屏佈告欄  商品第一屏佈告欄  -->
<!-- 商品第一屏佈告欄  商品第一屏佈告欄  商品第一屏佈告欄  -->
<!-- 商品第一屏佈告欄  商品第一屏佈告欄  商品第一屏佈告欄  -->

    <div class="billboard-wrap">
        <div class="billboard-title">
            <div class="slogan">莊敬自強</div>
            <div class="circle-title">
                <div class="round bounceIn">排</div>
                <div class="round bounceIn">行</div>
                <div class="round bounceIn">榜</div>
            </div>
            <div class="slogan">處變不驚</div>
        </div>

        <div class="swiper-container">
                <div class="swiper-wrapper">


<?php 
for($r=0; $r<count($product2);$r++) {

?>

                        <div class="swiper-slide"><a  href="products.php?product_id=<?php echo $product2[$r]['product_id']; ?>">
                            <div class="sli-title"><span class="rank"><?php echo $r +1 ?></span><?php echo $product2[$r]["name"]; ?></div>
                            <div class="sli-img"><img src="<?php echo $product2[$r]["image_path"]; ?>"></div></a>
                            <div class="sli-price addtocart"  id="<?php echo 'productid_'.$product2[$r]['product_id'];?>" >價格 :<?php echo $product2[$r]["price"]; ?> 元  <i class="fas fa-cart-plus hoverBounce"></i>
                            <input type="hidden" value="<?php echo $product2[$r]['name'].'|'.$product2[$r]['price'].'|'.$product2[$r][ 'image_path'].'|'.$product2[$r]['product_id'];?>"></div>
                        </div>
<?php
}
 ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
         </div>


    </div>


<!-- 個別卡片式商品  個別卡片式商品  個別卡片式商品  -->
<!-- 個別卡片式商品  個別卡片式商品  個別卡片式商品  -->
<!-- 個別卡片式商品  個別卡片式商品  個別卡片式商品  -->

    <div class="pro-card-wrap">
        <div class="pro-card-tab-filter-wrap">
            <div class="card-tab">                
                <div class="tab_btn all" id="tab1" name="tb1" data-name="tab1">全部</div>
                <div class="tab_btn candy"  id="tab2" name="tb2" data-name="tab2" >糖果</div>
                <div class="tab_btn toy"  id="tab3" name="tb3" data-name="tab3" >童玩</div>
                <div class="tab_btn cookie" id="tab4" name="tb4" data-name="tab4" >餅乾</div>
                <div class="tab_btn drink"  id="tab5" name="tb5" data-name="tab5" >飲料</div>
                <input type="hidden" id="initTab" value="<?php echo $_GET["tab_btn"]; ?>">
            </div>
            <!-- <div id="card-filter">
                <select class="card-select" onchange="selectOption()">
                    <option value="0" class="qad">排列</option>
                    <option value="1">依人氣值</option>
                    <option value="2">依價格由低至高</option>
                    <option value="3">依價格由高至低</option>
                </select>
            </div> -->
        </div>



        <!-- 商品項放進來 -->
        <div class="pro-many">
            <div id="tb1" class="[ c-example__demo selector__items] ">
                
<!-- php 前四個商品顯示 -->
<?php 
    $sql="SELECT P.product_id, P.name, P.description, P.price, P.is_on_shelves, PI.image_path FROM product P join product_image PI on P.product_id=PI.product_id WHERE P.is_on_shelves = 0";
    $pdoStatement = $pdo->query($sql);
    $product = $pdoStatement->fetchAll();

    for($p=0; $p<4 ; $p++){

 ?>



                    <div class="[ c-example__tilt ] js-tilt" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                        <a href="products.php?product_id=<?php echo $product[$p]['product_id']; ?>"><div class="c-example__tilt-inner">
                            <!-- 商品內容 -->
                            <div class="title"><?php echo $product[$p]["name"];?></div>
                            <div class="pro-img"><img src="<?php echo $product[$p][ 'image_path'];?>"></div></a>
                            <div class="price addtocart" id="<?php echo 'productid_'.$product[$p]['product_id'];?>">價格 : <?php echo $product[$p]["price"];?> 元 
                            <i  class="fas fa-cart-plus hoverBounce"></i>

                                 <input type="hidden" value="<?php echo $product[$p]['name'].'|'.$product[$p]['price'].'|'.$product[$p][ 'image_path'].'|'.$product[$p]['product_id'];?>">

                             </div>
                        </div>
                    </div>
                

<?php
}
?>

<?php 
for($p=4; $p<count($product) ; $p++){
?>
                    <div class="[ c-example__tilt ] js-tilt seemore" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                        <a href="products.php?product_id=<?php echo $product[$p]['product_id']; ?>"><div class="c-example__tilt-inner">
                            <!-- 商品內容 -->
                            <div class="title"><?php echo $product[$p]["name"];?></div>
                            <div class="pro-img"><img src="<?php echo $product[$p]["image_path"];?>"></div></a>
                            <div class="price addtocart" id="<?php echo 'productid_'.$product[$p]['product_id'];?>">價格 : <?php echo $product[$p]["price"];?> 元 <i  class="hoverBounce fas fa-cart-plus hoverBounce"></i>

                                 <input type="hidden" value="<?php echo $product[$p]['name'].'|'.$product[$p]['price'].'|'.$product[$p][ 'image_path'].'|'.$product[$p]['product_id'];?>">

                             </div>
                        </div>
                    </div>

<?php
}
?>

                    <div class="btn-container">
                        <button id="toggle">看更多商品</button>
                    </div>
                    <script>
                        $(document).ready(function(){
                            if(window.innerWidth >= 992){
                                product_tilt();                            
                            }
                        });
                    </script>
                <!--end of all  -->
            </div>

            <div id='tb2' class='[ c-example__demo selector__items] dis-n '>
                <script>                                
                            function show_candy(jsonStr){
                            var str="";
                            var ary_candy=jsonStr.split("split");
                            // console.log(jsonStr);
                            for (let i = 0; i < ary_candy.length; i++) {
                                var columnCandy = JSON.parse(ary_candy[i]);
                                if( columnCandy.name ){
                                    
                                    str += "<div class='[ c-example__tilt ] js-tilt' data-tilt-perspective='300' data-tilt-speed='400' data-tilt-max='25'>";
                                    str += "<a href='products.php?product_id="+columnCandy.product_id+"'><div class='c-example__tilt-inner'>";
                                    str += "<input type='hidden' id='productName' value='productid_"+columnCandy.product_id+"' >"
                                    str += "<div class='title'>"+columnCandy.name+"</div>";
                                    str += "<div class='pro-img'><img src='"+columnCandy.image_path+"' alt='"+columnCandy.name+"'></div></a>";
                                    str += "<div class='price addtocart' id='productid_"+columnCandy.product_id+"'>價格:"+columnCandy.price+" 元<i  class='fas fa-cart-plus hoverBounce'></i>"; 
                                    str += "<input type='hidden' value='"+columnCandy.name+"|"+columnCandy.price+"|"+columnCandy.image_path+"|"+columnCandy.product_id+"'>";
                                    str += "</div>";
                                    str += "</div>"; 
                                    str += "</div>"; 
                                }else{
                                    str += "<div class='product_item'>";
                                    str += "<p>資料異常!</p>";
                                    str += "</div>"; 
                                }
                            }

                            // console.log(str);
                            document.getElementById("tb2").innerHTML = str;
                            
                            if(window.innerWidth >= 992){
                                product_tilt();                            
                            }
                            addtocartDofirst();

                        }


                        function product_tilt(){
                            // products-main 3D傾斜 plugin
                            // console.log("product!TILT!")
                            const tilt = $('.js-tilt').tilt();
                            $('.js-destroy').on('click', function () {
                                const element = $(this).closest('.js-parent').find('.js-tilt');
                                element.tilt.destroy.call(element);
                            });
                            $('.js-getvalue').on('click', function () {
                                const element = $(this).closest('.js-parent').find('.js-tilt');
                                const test = element.tilt.getValues.call(element);
                                console.log(test[0]);
                            });
                            $('.js-reset').on('click', function () {
                                const element = $(this).closest('.js-parent').find('.js-tilt');
                                element.tilt.reset.call(element);
                            });
                        };




                        function get_candy(){
                        var xhr = new XMLHttpRequest();
                        xhr.onload=function (){
                            if( xhr.status == 200 ){
                                // console.log(xhr.responseText);
                                show_candy( xhr.responseText );
                            }else{
                                alert( xhr.status );
                            }
                        }

                        var url = "php/get_candy.php";
                        xhr.open("Get", url, true);
                        xhr.send( null );
                    }
                </script>
            <!--end of CANDY 糖果  -->
            </div>

            <div id="tb3" class="[ c-example__demo selector__items] dis-n">

                <script>

                        function show_toy(jsonStr){
                            var str="";
                            var ary_toy=jsonStr.split("split");
                            // console.log(jsonStr);
                            for (let i = 0; i < ary_toy.length; i++) {
                                var column = JSON.parse(ary_toy[i]);
                                if( column.name ){
                                    
                                    str += "<div class='[ c-example__tilt ] js-tilt' data-tilt-perspective='300' data-tilt-speed='400' data-tilt-max='25'>";
                                    str += "<a href='products.php?product_id="+column.product_id+"'><div class='c-example__tilt-inner'>";
                                    str += "<div class='title'>"+column.name+"</div>";
                                    str += "<div class='pro-img'><img src='"+column.image_path+"' alt='"+column.name+"'></div></a>";
                                    str += "<div class='price addtocart' id='productid_"+column.product_id+"'>價格 : "+column.price+" 元 <i  class='fas fa-cart-plus hoverBounce'></i>"; 
                                    str += "<input type='hidden' value='"+column.name+"|"+column.price+"|"+column.image_path+"|"+column.product_id+"'>";
                                    str += "</div>";
                                    str += "</div>"; 
                                    str += "</div>";  
                                }else{
                                    str += "<div class='product_item'>";
                                    str += "<p>資料異常!</p>";
                                    str += "</div>"; 
                                }
                            }
                            // console.log(str);
                            document.getElementById("tb3").innerHTML = str;

                            if(window.innerWidth >= 992){
                                product_tilt();                            
                            }

                            addtocartDofirst();
                        }

                        function get_toy(){
                        var xhr = new XMLHttpRequest();
                        xhr.onload=function (){
                            if( xhr.status == 200 ){
                                // console.log(xhr.responseText);
                                show_toy( xhr.responseText );
                            }else{
                                alert( xhr.status );
                            }
                        }

                        var url = "php/get_toy.php";
                        xhr.open("Get", url, true);
                        xhr.send( null );
                    }
                </script>
            <!--end of TOY 童玩  -->
            </div>

            <div id="tb4" class="[ c-example__demo selector__items] dis-n">

                <script>

                        function show_cookie(jsonStr){
                            var str="";
                            var ary_cookie=jsonStr.split("split");
                            // console.log(jsonStr);
                            for (let i = 0; i < ary_cookie.length; i++) {
                                var column = JSON.parse(ary_cookie[i]);
                                if( column.name ){
                                    str += "<div class='[ c-example__tilt ] js-tilt' data-tilt-perspective='300' data-tilt-speed='400' data-tilt-max='25'>";
                                    str += "<a href='products.php?product_id="+column.product_id+"'><div class='c-example__tilt-inner'>";
                                    str += "<div class='title'>"+column.name+"</div>";
                                    str += "<div class='pro-img'><img src='"+column.image_path+"' alt='"+column.name+"'></div></a>";
                                    str += "<div class='price addtocart' id='productid_"+column.product_id+"'>價格 : "+column.price+" 元 <i  class='fas fa-cart-plus hoverBounce'></i>"; 
                                    str += "<input type='hidden' value='"+column.name+"|"+column.price+"|"+column.image_path+"|"+column.product_id+"'>";
                                    str += "</div>";
                                    str += "</div>"; 
                                    str += "</div>"; 
                                }else{
                                    str += "<div class='product_item'>";
                                    str += "<p>資料異常!</p>";
                                    str += "</div>"; 
                                }
                            }
                            
                            document.getElementById("tb4").innerHTML = str;
                            
                            if(window.innerWidth >= 992){
                                product_tilt();                            
                            }

                            addtocartDofirst();   
                        }

                        function get_cookie(){
                        var xhr = new XMLHttpRequest();
                        xhr.onload=function (){
                            if( xhr.status == 200 ){
                                // console.log(xhr.responseText);
                                show_cookie( xhr.responseText );
                            }else{
                                alert( xhr.status );
                            }
                        }

                        var url = "php/get_cookie.php";
                        xhr.open("Get", url, true);
                        xhr.send( null );
                    }
                </script>      
            <!--end of COOKIE 餅乾  -->
            </div>

            <div id="tb5" class="[ c-example__demo selector__items] dis-n">

                <script>

                        function show_drink(jsonStr){
                            var str="";
                            var ary_drink=jsonStr.split("split");
                            // console.log(jsonStr);
                            for (let i = 0; i < ary_drink.length; i++) {
                                var column = JSON.parse(ary_drink[i]);
                                if( column.name ){
                                    str += "<div class='[ c-example__tilt ] js-tilt' data-tilt-perspective='300' data-tilt-speed='400' data-tilt-max='25'>";
                                    str += "<a href='products.php?product_id="+column.product_id+"'><div class='c-example__tilt-inner'>";
                                    str += "<div class='title'>"+column.name+"</div>";
                                    str += "<div class='pro-img'><img src='"+column.image_path+"' alt='"+column.name+"'></div></a>";
                                    str += "<div class='price addtocart' id='productid_"+column.product_id+"' >價格 : "+column.price+" 元 <i  class='fas fa-cart-plus hoverBounce'></i>"; 
                                    str += "<input type='hidden' value='"+column.name+"|"+column.price+"|"+column.image_path+"|"+column.product_id+"'>";
                                    str += "</div>";
                                    str += "</div>"; 
                                    str += "</div>"; 
                                }else{
                                    str += "<div class='product_item'>";
                                    str += "<p>資料異常!</p>";
                                    str += "</div>"; 
                                }
                            }
                            // console.log(str);
                            document.getElementById("tb5").innerHTML = str;
                            
                            if(window.innerWidth >= 992){
                                product_tilt();                            
                            }

                            addtocartDofirst();
                        }
                        
                        function get_drink(){
                        var xhr = new XMLHttpRequest();
                        xhr.onload=function (){
                            if( xhr.status == 200 ){
                                // console.log(xhr.responseText);
                                show_drink( xhr.responseText );
                            }else{
                                alert( xhr.status );
                            }
                        }

                        var url = "php/get_drink.php";
                        xhr.open("Get", url, true);
                        xhr.send( null );
                    }
                </script>
                <!--end of DRINK 飲料  -->
            </div>

            <!-- end of .pro-many -->
        </div>
        
        <!-- end of .pro-card-wrap -->
    </div> 


<!-- 客製化商品佈告欄  客製化商品佈告欄  客製化商品佈告欄  -->

<?php 

$sql3="SELECT P.product_id, P.name,P.category,P.score, P.description, P.price, P.is_on_shelves, PI.image_path FROM product P join product_image PI on P.product_id=PI.product_id WHERE P.is_on_shelves =0 and P.category=5  ORDER BY P.score DESC limit 3" ;
$pdoStatement3 = $pdo->query($sql3);
$product3 = $pdoStatement3->fetchAll();
?>

    <div class="cust-board-wrap">
        <span id="custedProd"></span>
        <div class="billboard-title">
                <div class="slogan">守望相助</div>
                <div class="circle-title">
                    <div class="round">客</div>
                    <div class="round">製</div>
                    <div class="round">商</div>
                    <div class="round">品</div>
                </div>
                <div class="slogan">檢舉匪諜</div>
        </div>
        <div class="cust-billboard-wrap">
            <div class="cust-billboard-title">
                <div class="left"></div>
                <div class="middle">
                    <div class="middle-title">客製化人氣排行榜</div>
                </div>
                <div class="right"><a href="cust.php"><button class="btn hoverBounce">來去客製化</button></a></div>
            </div>
            <div class="cust-billboard-pro-wrap">
                <div class="cust-billboard-pro">
                    <div><h4>甲等</h4></div>
                    <div class="cust-billboard-pro-img">

                        <img id="nail" src="img/nail.png" alt="nail">
                        <?php for($r=0; $r<1;$r++) {?>
                        <a class="shake-little" href="cust.php"><img src="<?php echo $product3[$r]['image_path']; ?>" alt="<?php echo $product3[$r]['name']; ?>"></a>
                        <?php }?>
                    </div>
                </div>
                <div class="cust-billboard-pro">
                    <div class="cust-billboard-pro-win" ><h4>優等</h4>
                    <img id="win" src="img/win.png" alt="">
                    </div>
                    <div class="cust-billboard-pro-img">
                        <img id="nail" src="img/nail.png" alt="nail">
                        <?php for($r=1; $r<2;$r++) {?>
                        <a class="shake-little" href="cust.php"><img src="<?php echo $product3[$r]['image_path']; ?>" alt="<?php echo $product3[$r]['name']; ?>"></a>
                        <?php }?>
                    </div>
                </div>
                <div class="cust-billboard-pro">
                    <div><h4>佳作</h4></div>
                    <div class="cust-billboard-pro-img">
                            <img id="nail" src="img/nail.png" alt="nail">
                            <?php for($r=2; $r<3;$r++) {?>
                            <a class="shake-little" href="cust.php"><img src="<?php echo $product3[$r]['image_path']; ?>" alt="<?php echo $product3[$r]['name']; ?>"></a>
                            <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">

                
<?php 

$sql4="SELECT P.product_id, P.name,P.category,P.score,P.is_on_shelves, P.description, P.price, PI.image_path FROM product P join product_image PI on P.product_id=PI.product_id WHERE P.category=5 and P.is_on_shelves=0 ORDER BY P.product_id DESC" ;
$pdoStatement4 = $pdo->query($sql4);
$product4 = $pdoStatement4->fetchAll();

for($r=0; $r<count($product4);$r++) {
?>

                        <div class="swiper-slide"><a  href="products.php?product_id=<?php echo $product4[$r]['product_id']; ?>">
                            <div class="sli-title"><span class="rank rankimg"></span><?php echo $product4[$r]["name"]; ?></div>
                            <div class="sli-img"><img src="<?php echo $product4[$r]["image_path"]; ?>"></div></a>
                            <div class="sli-price addtocart" id="<?php echo 'productid_'.$product4[$r]['product_id'];?>">價格 :<?php echo $product4[$r]["price"]; ?> 元  <i class="fas fa-cart-plus hoverBounce"  ></i>
                            <input type="hidden" value="<?php echo $product4[$r]['name'].'|'.$product4[$r]['price'].'|'.$product4[$r][ 'image_path'].'|'.$product4[$r]['product_id'];?>"></div>
                        </div>

<?php
}
 ?>

                </div>
            
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
         </div>

    </div> <!-- 客製化商品佈告欄  客製化商品佈告欄  客製化商品佈告欄  -->


<!-- end of .pro-main -->
</div>

<?php
}
catch(PDOException $e)
{
    $errMsg = "錯誤原因 : ".$e->getMessage()."<br>"."錯誤行號".$e->getLine()."<br>";
    echo $errMsg;   
}

?>

<!-- Footer  Footer  Footer  Footer -->
<div class="pro-footer">
    <div id="footer">        
            Copyright&#9400;阿婆柑仔店, all rights reserved
    </div>
</div>
<!-- Footer  Footer  Footer  Footer -->  
    
<!-- nav.js nav.js nav.js nav.js -->
<script src="js/self/loginCheck.js"></script>
<script src="js/self/ajax_memberLogin.js"></script>
<script src="js/self/nav.js"></script>
<script src="js/self/aporobot.js"></script>
<script src="js/self/chatrobot.js"></script>
<script src="js/self/products.js"></script>
<script src="js/plugin/tilt.jquery.min.js"></script>
<script src="js/self/addtocart.js"></script>
<!-- <script src="js/self/comment.js"></script> -->

   
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        loop: true,
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
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
    });
</script>
<script>
       
// function cartPlus(){          
//     //products-main 購物車+1
//     $('.addtocart').click(function(){
//         var cartCount = $('#cart-count');
//         cartCount.attr("style", "visibility:visible");
//         var acutal = Number(cartCount.text())+1;
//         cartCount.addClass('bounceIn');
//         cartCount.text(acutal);

//         var timer = setTimeout(function(){
//             cartCount.removeClass("bounceIn");
//             clearTimeout(timer);
//         },800)
//     });
// };

function product_reset_style(){
    $('#tab1').css({'background-color':'#d53e23'});
    $('#tab2').css({'background-color':'#d53e23'});
    $('#tab3').css({'background-color':'#d53e23'});
    $('#tab4').css({'background-color':'#d53e23'});
    $('#tab5').css({'background-color':'#d53e23'});
    $('#tb1').addClass('dis-n');
    $('#tb2').addClass('dis-n');
    $('#tb3').addClass('dis-n');
    $('#tb4').addClass('dis-n');  
    $('#tb5').addClass('dis-n');    
}


function changeTab(e) {

    let obj=e.target;
    console.log(obj.dataset.name);
    product_reset_style();
    switchTab(obj.dataset.name);
    
}

function switchTab(tabBtn){
    switch (tabBtn){
        case 'tab1':
            $('#tab1').css({'background-color':'#002552'});
            $('#tb1').removeClass('dis-n');
            $('#tb2').addClass('dis-n');
            $('#tb3').addClass('dis-n');
            $('#tb4').addClass('dis-n');     
            $('#tb5').addClass('dis-n');          
            //20181223
            

            break;
        case 'tab2':
            $('#tb1').addClass('dis-n');
            $('#tab2').css({'background-color':'#002552'});
            $('#tb2').removeClass('dis-n');
            $('#tb3').addClass('dis-n');
            $('#tb4').addClass('dis-n'); 
            $('#tb5').addClass('dis-n');    
            //20181223
            get_candy();
            
            break;
        case 'tab3':
            $('#tb1').addClass('dis-n');
            $('#tb2').addClass('dis-n');
            $('#tab3').css({'background-color':'#002552'});
            $('#tb3').removeClass('dis-n');
            $('#tb4').addClass('dis-n'); 
            $('#tb5').addClass('dis-n');    
            //20181223
            get_toy();
            
            break;
        case 'tab4':
            console.log("entered");
            $('#tb1').addClass('dis-n');
            $('#tb2').addClass('dis-n');
            $('#tb3').addClass('dis-n');
            $('#tab4').css({'background-color':'#002552'}); 
            $('#tb4').removeClass('dis-n');
            $('#tb5').addClass('dis-n');    
            //20181223
            get_cookie();

            break;
        case 'tab5':
            $('#tb1').addClass('dis-n');
            $('#tb2').addClass('dis-n');
            $('#tb3').addClass('dis-n');
            $('#tb4').addClass('dis-n');    
            $('#tab5').css({'background-color':'#002552'});
            $('#tb5').removeClass('dis-n'); 
            //20181223
            get_drink();

            break;
        case 0:
            
    }
}


function initialProTab(){

    let initTab = document.getElementById("initTab").value;
    switchTab(initTab);


    let obj= document.getElementsByClassName("tab_btn");
    for(var i=0;i<obj.length;i++){
        obj[i].addEventListener("click",changeTab,false);
    }

    // get_member();

}

window.addEventListener("load",initialProTab,false);
</script>



<script>
    var oTop = $(".pro-card-tab-filter-wrap").offset().top;
    // var eTop = $(".cust-board-wrap").offset().top - 200;
    var sTop = 0  ;
    $(window).scroll(function(){
        sTop = $(this).scrollTop();
        var eTop = $(".cust-board-wrap").offset().top - 500;
        // console.log('sTop : '+ sTop + '-' +'oTop : '+ oTop +'eTop : '+ eTop);
        if(sTop >= oTop){
        $(".pro-card-tab-filter-wrap").css({"position":"fixed","top":"100px","z-index":"1"});
        }else{
        $(".pro-card-tab-filter-wrap").css({"position":"static"});
        }
        if(sTop>eTop)
        {
            $(".pro-card-tab-filter-wrap").css({"position":"static"});
        }
    });
</script>


    </body>
</html>