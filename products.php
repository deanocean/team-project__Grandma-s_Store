<?php 
session_start();
$_SESSION['product_id'] = $productId = $_GET["product_id"];

$errMsg="";
try
{
    require_once("php/connectCd104g1.php");
    $sql="SELECT P.product_id, P.name, P.description, P.price,P.score, PI.image_path FROM product P join product_image PI on P.product_id=PI.product_id where P.product_id=$productId ";
    $pdoStatement = $pdo->query($sql);
    $getProduct = $pdoStatement->fetchAll();

?>
<?php 
for($t=0; $t<count($getProduct);$t++) {

?> 
<!DOCTYPE html>
<html lang="en">
<head>

    <?php require_once("head.html"); ?>
 
    <title><?php echo $getProduct[$t]["name"]; ?></title>

</head>
<body class="pro-body">
        <div class="rwdbg">
            <img src="img/section1/h1bg.png" alt="" class="rwdbg1">
        </div>
<?php  
    require_once("nav.html");
?>
<?php require_once("loginBox.html"); ?>

    <!-- main -->
    <!-- main -->
    <!-- main -->
    <!-- main -->
    <!-- main -->
<div class="pro">


    <div class="mobile-show product-name">
        <h3><?php echo $getProduct[$t]["name"]; ?></h3>
    </div>
    <section class="product-info-wrap">
        <div class="product-pic">            
            <img id="product" class="mag" src="<?php echo $getProduct[$t]['image_path']; ?>" alt="<?php echo $getProduct[$t]['name']; ?>">
        </div>
        <div class="product-info">
            <h3 class="mobile-hide"><?php echo $getProduct[$t]["name"]; ?> </h3>
            <input type="hidden" id="productName" value="productid_<?php echo $productId ?>" >
            <p><?php echo $getProduct[$t]["description"]; ?></p>
            <P>                
                <i id="heart-emp" class="far fa-thumbs-up"></i>
                <i id="heart-fil" class="fas fa-thumbs-up"></i> 人氣值: <span id="popularity"><?php echo $getProduct[$t]["score"]; ?></span> 
                <input type="hidden" id="pScore" value="<?php echo $productId; ?>">
            </P>
            
            <b class="btn-wrap">
                <p class="prouct-price">價格: 
                    <span><?php echo $getProduct[$t]["price"]; ?></span> 元 
                </p>  

                <button id="collection" class="btn">加入收藏</button>

                <input type="hidden" value="<?php echo $productId?>">

                <button id="<?php echo "productid_".$productId;?>" class="addtocart btn hoverBounce prodCart">加入購物車
                    <span></span>
                    <input type="hidden" value="<?php echo $getProduct[$t]["name"]."|".$getProduct[$t]["price"]."|".$getProduct[$t]['image_path']."|".$productId;?>">
                </button>
            </div>
        </div>
    </section>

<!-- </div>    -->




<?php
}
 ?>




    <!-- 留言區 -->
    <!-- 留言區 -->
    <!-- 留言區 -->
    <!-- 留言區 -->
    <!-- 留言區 -->
<?php 
require_once("php/comment.php");
?>
    
        
<!-- 推薦您 -->
<!-- 推薦您 -->
<!-- 推薦您 -->
<!-- 推薦您 -->
<!-- 推薦您 -->
<!-- 推薦您 -->


<div class="slide">
        <h3>推薦您 : </h3>
    <div class="rotating-slider">
            <ul class="slides">

<?php 


    $sql="SELECT  P.product_id, P.name, P.description, P.price, PI.image_path FROM product P join product_image PI on P.product_id=PI.product_id  ORDER BY RAND() LIMIT 8";
    $pdoStatement = $pdo->query($sql);
    $product = $pdoStatement->fetchAll();

for($p=0; $p<count($product);$p++) {

?>

              <li>
                <div class="inner recmd-produt">
                    <p class="round-title"><a href="#"><?php echo $product[$p]['name'];?> <?php echo $product[$p]['price'];?>元</a></p>
                    <a href="products.php?product_id=<?php echo $product[$p]['product_id']?>"><img src="<?php echo $product[$p][ 'image_path'];?>" alt="<?php echo $product[$p]['name'];?>"></a>
                </div>
              </li>

              
<?php
}
 ?>

            </ul>
          </div>
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
<!-- Footer  Footer  Footer  Footer -->
<!-- Footer  Footer  Footer  Footer -->

</div>
<div id="footer">        
    Copyright&#9400;阿婆柑仔店, all rights reserved
</div>

    <?php require_once("selfJs.html"); ?>    

    <script src="js/plugin/jquery.rotating-slider.js"></script>
    <script src="js/self/products.js"></script>
    <script src="js/self/addtocartinnerpage.js"></script>    
    <script src="js/self/addtocart.js"></script>
    <script src="js/self/ajax_comment2.js"></script>
<!-- ajax_report -->
<script src="js/self/ajax_report2.js"></script>

    <script>
    
        $(document).ready(function(){
                $(function(){ 
                        $('.rotating-slider').rotatingSlider({
                    
                        // auto play
                        autoRotate: true,
                    
                        // auto play interval
                        autoRotateInterval: 6000,
                    
                        // is draggable?
                        draggable: true,
                    
                        // slider controls
                        directionControls: true,
                        directionLeftText: '&lsaquo;',
                        directionRightText: '&rsaquo;',
                    
                        // animation speed
                        rotationSpeed: 750,
                    
                        // size of slider
                        slideHeight : 260,
                        slideWidth : 280,
                        
                        });
                    });

                    load_comment();
                    commentLoad();
        });
    </script>
    


</body>
</html>