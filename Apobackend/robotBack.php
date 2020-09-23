<?php 
$errMsg = "";
try {
    require_once("connectCd104g1.php");
    // $sql = "select * from robot_words";
    $sql = "SELECT rw.word_id,rw.word,wk.keyword from robot_words as rw
            join word_keyword as wk
            on rw.word_id = wk.word_id";
    $robot_words = $pdo -> query( $sql );
} catch (PDOException $e) {
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>QA機器人管理</title>    
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
            <?php require_once("headerAcount.php") ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">




                        <!-- 新增詞彙關鍵字管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">新增詞彙</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        
                                            <tr>
                                                <th>關鍵字</th>
                                                <th>詞彙內容</th>

                                            </tr>
                                        

                                        

                                            <form action="addRobot.php">
                                                <tr class="tr-shadow">
                                                    <!-- 關鍵字 -->
                                                    <td><input class="inputLength" size="25" type="text" name="keyword"></td>
                                                    <!-- 詞彙內容 -->
                                                    <td><input class="inputLength" size="40" type="text" name="word"></td>


                                                    <td>
                                                        <div class="table-data-feature">
                                                            <!-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                                title="Edit">
                                                                <i class="zmdi zmdi-edit"></i> -->
                                                            <!-- </button> -->
                                                            <!-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                                title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button> -->
                                                            <input type="submit" name="" value="新增">
                                                            <!-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                                title="More">
                                                                <i class="zmdi zmdi-more"></i>
                                                            </button> -->
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


                        <br>
                        <!-- 機器人辭庫管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">機器人辭庫</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        
                                            <tr>
                                                <th>詞彙編號</th>
                                                <th>關鍵字</th>
                                                <th>詞彙內容</th>

                                            </tr>
                                        

                                        
                                            <?php
                                            if($errMsg !=""){
                                                echo "<tr><td colspan='6' align='center'>$errMsg</td></tr>";
                                            }else{
                                                while($prodRow = $robot_words->fetchObject()){
                                            ?>

                                            <!-- 修改刪除機器人詞彙 -->
                                            <form method="post" action="deleteRobot.php">
                                                <input type="hidden" name="word_id" value="<?php echo $prodRow->word_id;?>">
                                               
                                            <tr class="tr-shadow">
                                                <!-- 詞彙編號 -->
                                                <td><?php echo $prodRow->word_id?></td>
                                                <!-- 關鍵字 -->
                                                <td><input type="text" name="keyword" value="<?php echo $prodRow->keyword;?>"></td>
                                                <!-- 詞彙內容 -->
                                                <td><input size="40" type="text" name="word" value="<?php echo $prodRow->word;?>"></td>


                                                <td>
                                                    <div class="table-data-feature">

                                                        <input type="submit" value="修改" onclick="this.form.action='updateRobot.php'">
                                                        <input type="submit" name="del" value="刪除">
                    
                                                        <!-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>

                                            </form>
                                    <?php
                                        }
                                    }
                                    ?>
                                        
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