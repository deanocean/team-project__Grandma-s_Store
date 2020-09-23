<?php 
$errMsg = "";
try {
    require_once("connectCd104g1.php");
    $sql = "select * from store";
    $store = $pdo -> query( $sql );
} catch (PDOException $e) {
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>店鋪管理</title>
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

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">店鋪管理</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        
                                            <tr>
                                                <th>編號</th>
                                                <th>店鋪名稱</th>
                                                <th>店鋪介紹</th>
                                                <th>店鋪地址</th>
                                                <th>店鋪電話</th>
                                                <th>營業時間</th>
                                            </tr>
                                        
                                        
                                            <?php
                                            if($errMsg !=""){
                                                echo "<tr><td colspan='6' align='center'>$errMsg</td></tr>";
                                            }else{
                                                while($prodRow = $store->fetchObject()){
                                            ?>


                                            <form action="storeUpdateToDb.php">
                                                <input type="hidden" name="store_id" value="<?php echo $prodRow->store_id;?>">
                                                <tr class="tr-shadow">
                                                    <!-- 店鋪編號 -->
                                                    <td><?php echo $prodRow->store_id;?></td>
                                                    <!-- 名稱 -->
                                                    <td><input class="inputLength" size="10" type="text" name="name" value="<?php echo $prodRow->name;?>"></td>
                                                    <!-- 介紹 -->
                                                    <td class="desc"><input class="inputLength" size="10" type="text" name="description" value="<?php echo $prodRow->description;?>"></td>
                                                    <!-- 地址 -->
                                                    <td><input class="inputLength" size="10" type="text" name="address" value="<?php echo $prodRow->address;?>"></td>
                                                    <!-- 電話 -->
                                                    <td>
                                                        <span class="status--process"><input class="inputLength" size="10" type="text" name="phone" value="<?php echo $prodRow->phone;?>"></span>
                                                    </td>
                                                    <!-- 營業時間 -->
                                                    <td><input class="inputLength" size="10" type="text" name="business_hours" value="<?php echo $prodRow->business_hours;?>"></td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="修改">
                                                                <i class="zmdi zmdi-edit"></i>
                                                                <input type="submit" name="btn1" value="">
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="刪除">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
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
