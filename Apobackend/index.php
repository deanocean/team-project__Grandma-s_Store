<?php
try{
	require_once("connectCd104g1.php");
    $sql = "select * from product a join product_image b on a.product_id = b.product_id where a.category<5";
    $orderdata = $pdo->prepare($sql);
    $orderdata->execute();

    $sql2 = "select * from product a join product_image b on a.product_id = b.product_id where a.category=5";
    $orderdata2 = $pdo->prepare($sql2);
    $orderdata2->execute();

}catch(PDOException $e){
    echo "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Title Page-->
    <title>商品管理</title>
    <?php require_once("BackendHead.php") ?>    
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <!-- END MENU SIDEBAR-->
        <?php require_once("menu.php") ?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- 新增詞彙關鍵字管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">新增商品</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        
                                            <tr>
                                                <th>商品名稱</th>
                                                <th>商品圖片</th>
                                                <th>分類</th>
                                                <th>介紹</th>
                                                <th>單價</th>
                                                <th>是否上架</th>
                                                <th>人氣值</th>

                                            </tr>
                                            <form action="addProduct.php" method="post" enctype="multipart/form-data">
                                                <tr class="tr-shadow">
                                                    <!-- <form action="addProduct.php"> -->
                                                        <td><input class="inputLength" size="10" type="text" name="pro_name"></td>
                                                        <td><input class="inputLength" size="10" type="file" name="image_path"></td>
                                                        <td><select name="category" id=""><option value="1">糖果</option><option value="2">童玩</option><option value="3">餅乾</option><option value="4">飲料</option></select></td>
                                                        <td><input class="inputLength" size="10" type="text" name="pro_description"></td>
                                                        <td><input class="inputLength" size="10" type="text" name="price"></td>
                                                        <td><select name="is_on_shelves" id=""><option value="0">是</option></select></td>
                                                        <td><input class="inputLength" size="10" value="0" type="text" name="score"></td>
                                                    

                                                    <td>
                                                        
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                                title="新增">
                                                                <input type="submit" name="" value="">
                                                                <i class="zmdi zmdi-file-plus"></i> 
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>

                                            </form>


                                        
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <!-- 一般商品管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">一般商品</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <!-- <thead> -->
                                            <tr>
                                                <th>編號</th>
                                                <th>商品名稱</th>
                                                <th>商品圖片</th>
                                                <th>分類</th>
                                                <th>介紹</th>
                                                <th>單價</th>
                                                <th>是否上架</th>
                                                <th>人氣值</th>

                                            </tr>
                                        <?php
                                        while ($responses = $orderdata->fetch()){
                                        ?>
                                        
                                        <form action="updateProduct.php" method="post">                                            
                                        <input type="hidden" name="product_id" value="<?php echo  $responses['product_id'];?>">
                                            <tr class="tr-shadow">
                                                <!-- 商品編號 -->
                                                <td><?php echo $responses['product_id'];?></td>
                                                <!-- 商品名稱 -->
                                                <td><?php echo $responses['name'];?></td>
                                                <!-- 商品圖片 -->
                                                <td class="productimg inputLength"><img src="../<?php echo $responses['image_path'];?>">
                                                </td>
                                                <!-- 分類 -->
                                                <td>
                                                    <?php if ($responses['category'] == 1) {echo'糖果'; }?>
                                                    <?php if ($responses['category'] == 2) {echo'童玩'; }?>
                                                    <?php if ($responses['category'] == 3) {echo'餅乾'; }?>
                                                    <?php if ($responses['category'] == 4) {echo'飲料'; }?>
                                                    </select>
                                                </td>
                                                <!-- 介紹 -->
                                                <td class="productintro"><?php echo $responses['description'];?></td>
                                                <!-- 單價 -->
                                                <td><?php echo $responses['price'];?>元</td>
                                                <!-- 是否上架 -->
                                                <td>
                                                    <select name="is_on_shelves">
                                                        <option value="0" <?php if ($responses['is_on_shelves'] == 0) { echo 'selected="selected"';} ?> >是</option>
                                                        <option value="1" <?php if ($responses['is_on_shelves'] == 1) { echo 'selected="selected"'; }?> >否</option>
                                                    </select>
                                                </td>
                                                <!-- 人氣值 -->
                                                <td><?php echo $responses['score'];?></td>


                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="修改">                                                                
                                                            <input type="submit" name="edit" value="" onclick="this.form.action='updateProduct.php'">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        
                                                    </div>
                                                </td> 
                                            </tr>
                                            </form> 
                                            <?php }?>
                                            <tr class="spacer"></tr>

                                            

                                        <!-- </tbody> -->
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>


                        <br>
                        <br>
                        <br>
                        <!-- 客製化商品管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">客製化商品</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <!-- <thead> -->
                                            <tr>
                                                <th>編號</th>
                                                <th>商品名稱</th>
                                                <th>商品圖片</th>
                                                <th>分類</th>
                                                <th>介紹</th>
                                                <th>單價</th>
                                                <th>是否上架</th>
                                                <th>人氣值</th>

                                            </tr>
                                        <?php
                                        while ($responses2 = $orderdata2->fetch()){
                                        ?>
                                        
                                        <form method="post" action="updateProduct2.php">                                          
                                            <input type="hidden" name="product_id" value="<?php echo  $responses2['product_id'];?>">
                                            <tr class="tr-shadow">
                                                <!-- 商品編號 -->
                                                <td><?php echo $responses2['product_id'];?></td>
                                                <!-- 商品名稱 -->
                                                <td><?php echo $responses2['name'];?></td>
                                                <!-- 商品圖片 -->
                                                <td class="productimg"><img src="../<?php echo $responses2['image_path'];?>"></td>
                                                <!-- 分類 -->
                                                <td><?php 
                                                switch($responses2['category']){
                                                    case '5':
                                                        echo '客製包包';
                                                        break;
                                                }
                                                ?></td>
                                                <!-- 介紹 -->
                                                <td class="productintro"><?php echo $responses2['description'];?></td>
                                                <!-- 單價 -->
                                                <td><?php echo $responses2['price'];?>元</td>
                                                <!-- 是否上架 -->
                                                <td>
                                                    <select name="is_on_shelves">
                                                        <option value="0" <?php if ($responses2['is_on_shelves'] == 0) { echo 'selected="selected"';} ?> >是</option>
                                                        <option value="1" <?php if ($responses2['is_on_shelves'] == 1) { echo 'selected="selected"'; }?> >否</option>
                                                    </select>
                                                </td>
                                                <!-- 人氣值 -->
                                                <td><?php echo $responses2['score'];?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="修改">
                                                            <i class="zmdi zmdi-edit"></i>
                                                            <!-- 修改 -->
                                                            <input type="submit" name="btn1" value="">
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            </form>
                                            <?php }?>
                                            <tr class="spacer"></tr>

                                        <!-- </tbody> -->
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<!-- Script Src -->
<?php require_once("requireJs.php") ?>

</body>

</html>
<!-- end document-->
