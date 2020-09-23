<?php
try{
	require_once("connectCd104g1.php");
    $sql = "select * from qa";
    $qadata = $pdo->prepare($sql);
    $qadata->execute();
}catch(PDOException $e){
    echo "error";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>Q&A管理</title>
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


                        <!-- 會員管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">QA列表</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <!-- <thead> -->
                                            <tr>
                                                <th>Q&A編號</th>
                                                <th>問題</th>
                                                <th>答案</th>

                                            </tr>
                                        <!-- </thead>
                                        <tbody> -->
                                        <?php
                                        while ($responses = $qadata->fetch()){
                                        ?>
                                            <tr class="tr-shadow">
                                                <!-- Q&A編號 -->
                                                <td><?php echo $responses['qa_id'];?></td>
                                                <!-- 問題 -->
                                                <td><?php echo $responses['question'];?></td>
                                                <!-- 答案 -->
                                                <td><?php echo $responses['answer'];?></td>
                                                <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="修改">
                                                                <i class="zmdi zmdi-edit"></i>
                                                                <!-- 修改 -->
                                                                <input type="submit" name="btn1" value="">
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="刪除">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                    </td>
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

</html>
<!-- end document-->