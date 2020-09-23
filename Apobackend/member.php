<?php
try{
	require_once("connectCd104g1.php");
    $sql = "select * from member";
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
    <title>會員管理</title>
    <?php require_once("BackendHead.php") ?>
    <style>
        input[type="password"]{
            width: 60px;
        }
    </style>
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


                        <!-- 會員管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">會員列表</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <!-- <thead> -->
                                            <tr>
                                               
                                                <!-- <th>會員編號</th> -->
                                                <th>帳號</th>
                                                <th>密碼</th>
                                                <th>姓名</th>
                                                <th>性別</th>
                                                <th>手機號碼</th>
                                                <th>地址</th>
                                                <th>電子郵件信箱</th>
                                                <th>生日</th>
                                                <th>頭貼路徑</th>
                                                <th>會員狀態</th>
                                                <th>被檢舉次數</th>

                                            </tr>
                                        <!-- </thead>
                                        <tbody> -->

                                        <?php
                                        while ($responses = $orderdata->fetch()){
                                        ?>
                                            <tr class="tr-shadow">
                                            <form action="php/update_member.php" method='post' accept-charset='utf-8'  id='form_no_<?php echo $responses['member_id'];?>'>
                                                
                                                <!-- 會員編號 -->
                                               
                                                <input type="hidden" name="member_id" value="<?php echo $responses['member_id'];?>">
                                                <!-- 帳號 -->
                                                <td><?php echo $responses['account'];?></td>

                                                <!-- 密碼 -->
                                                <td><?php echo $responses['password'];?></td>
                                
                                                <!-- 姓名 -->
                                                <td><?php echo $responses['name'];?></td>
                                                <!-- 性別 -->
                                                <td><?php 
                                                if($responses['gender'] == 1){
                                                    echo '男';
                                                }else{
                                                    echo '女';
                                                }
                                                ?></td>
                                                <!-- 手機號碼 -->
                                                <td><?php echo $responses['mobile_phone'];?></td>
                                                <!-- 地址 -->
                                                <td><?php echo $responses['address'];?></td>
                                                <!-- 電子郵件信箱 -->
                                                <td><?php echo $responses['email'];?></td>
                                                <!-- 生日 -->
                                                <td><?php echo $responses['birthday'];?></td>
                                                <!-- 頭貼路徑 -->
                                                <td class="productimg"><img src="../<?php echo $responses['image_path'];?>"></td>
                                                <!-- 會員狀態 -->
                                                <td>
                                                    <select name="state">
                                                        <option <?php if($responses['state'] == '0') echo "selected"; ?> >停用</option>
                                                        <option <?php if($responses['state'] == '1') echo "selected"; ?> >啟用</option>
                                                    </select>
                                                </td>
                                                <!-- 被檢舉次數 -->
                                                <td><?php echo $responses['reported_times'];?></td>

                                                <td>
                                                    <div class="table-data-feature">  
                                                        <button id="save_no_<?php echo $responses['member_id'];?>" class="item save" data-toggle="tooltip" data-placement="top" title="儲存">
                                                            <i class="zmdi zmdi-save"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                </form>
                                            </tr>
                                            <tr class="spacer"></tr>
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
<script>


</script>
</html>
<!-- end document-->