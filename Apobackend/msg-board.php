<?php
try{
	require_once("connectCd104g1.php");
    $sql = "select * from activity_msg_report a join activity_msg b on a.message_id = b.message_id left JOIN member m on b.member_id = m.member_id";
    $msgdata = $pdo->prepare($sql);
    $msgdata->execute();
}catch(PDOException $e){
    echo "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title Page-->
    <title>留言版管理</title>
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
                                <h3 class="title-5 m-b-35">檢舉留言管理</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                            <tr>
                                                <th>檢舉編號</th>
                                                <th>留言編號</th>
                                                <th>留言內容</th>
                                                <th>會員編號</th>
                                                <th>會員姓名</th>
                                                <th>檢舉時間</th>
                                                <th>處理狀態</th>
                                            </tr>
                                        <?php
                                        while ($responses = $msgdata->fetch()){
                                        ?>
                                            <tr class="tr-shadow">
                                                <!-- 檢舉編號 -->
                                                <form action="updatemsg.php" method="post">
                                                <td>
                                                    <?php echo $responses['report_id'];?>
                                                    <input type="hidden" name="id" value = "<?php echo $responses['report_id']; ?>">
                                                </td>
                                                <!-- 留言編號 -->
                                                <td><?php echo $responses['message_id'];?></td>
                                                <!-- 留言內容 -->
                                                <td><?php echo $responses['inner_text'];?></td>
                                                <!-- 會員編號 -->
                                                <td><?php echo $responses['member_id'];?></td>
                                                <!-- 會員編號 -->
                                                <td><?php echo $responses['name'];?></td>
                                                <!-- 檢舉時間 -->
                                                <td><?php echo $responses['report_datetime'];?></td>
                                                <!-- 處理狀態 -->
                                                <td>
                                                    <select name="msgstste">
                                                        <?php 
                                                            if($responses['state']==1){
                                                                echo '<option value="1" selected>保留留言</option>';
                                                                echo '<option value="0">下架留言</option>';
                                                            }else{
                                                                echo '<option value="1">保留留言</option>';
                                                                echo '<option value="0" selected>下架留言</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="修改">
                                                            <i class="zmdi zmdi-edit"></i>
                                                            <!-- 修改 -->
                                                            <input type="submit" name="btn1" value="">
                                                        </button>
                                                        <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="刪除留言">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button> -->
                                                    </div>
                                                </td>

                                                </form>            

                                            </tr>
                                        <?php }?>
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
