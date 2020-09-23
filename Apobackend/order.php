<?php
try{
	require_once("connectCd104g1.php");
    $sql = "select * from product_order p join member m on p.member_id=m.member_id";
    $orderdata = $pdo->prepare($sql);
    $orderdata->execute();
}catch(PDOException $e){
    echo "error";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title Page-->
    <title>訂單管理</title>
    <?php require_once("BackendHead.php") ?>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php require_once("menu.php") ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php require_once("headerAcount.php") ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">訂單管理</h3>
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <!-- <thead> -->
                                            <tr>
                                                <th>訂單編號</th>
                                                <th>會員帳號</th>
                                                <th>會員姓名</th>
                                                <th>訂購日期</th>
                                                <th>總金額</th>
                                                <th>付款方式</th>
                                                <th>付款狀態</th>
                                                <th>訂單狀態</th>

                                            </tr>
                                        <!-- </thead> -->
                                        <!-- <tbody> -->
                                        <?php
                                        while ($responses = $orderdata->fetch()){
                                        ?>
                                            <tr class="tr-shadow">

                                            <form method="post" action="updateorder.php">
                                                <!-- 訂單編號 -->
                                                <td>
                                                    <?php echo $responses['order_id'];?>
                                                    <input type="hidden" name="id" value = "<?php echo $responses['order_id']; ?>">

                                                </td>
                                                <input type="hidden" name="orderid" value="<?php echo $responses['order_id'];?>">
                                                <!-- 會員編號 -->
                                                <td><?php echo $responses['account'];?></td>
                                                <!-- 會員編號 -->
                                                <td><?php echo $responses['name'];?></td>
                                                <!-- 訂購日期 -->
                                                <td><?php echo $responses['order_datetime'];?></td>
                                                <!-- 總金額 -->
                                                <td><?php echo $responses['amount'];?></td>
                                                <!-- 付款方式 -->
                                                <td><?php echo $responses['payment_method'];?></td>
                                                <!-- 付款狀態 -->
                                                <td>
                                                    <?php if($responses['payment_state'] == 0){
                                                        echo '未付款';
                                                    }else{ echo '已付款';};?>
                                                </td>
                                                <!-- 訂單狀態 -->                                        

                                                    <td>
                                                        <select name="orderstate">      
                                                            <?php 
                                                                if($responses['order_state']==0){
                                                                    echo '<option value="0" selected>未出貨</option>';
                                                                    echo '<option value="1">已出貨</option>';
                                                                }else{
                                                                    echo '<option value="0">未出貨</option>';
                                                                    echo '<option value="1" selected>已出貨</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <div class="table-data-feature">

                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="修改">
                                                                <i class="zmdi zmdi-edit"></i>
                                                                <!-- 修改 -->
                                                                <input type="submit" name="btn1" value="" >
                                                            </button>

                                                            <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="刪除">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button> -->

                                                        </div>
                                                    </td>

                                                </form>



                                            </tr>
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
