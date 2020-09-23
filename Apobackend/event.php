<?php
$errMsg = "";
try {
    require_once("../php/connectCd104g1.php");
    $sql = "select * from activity_type";
    $eventdata = $pdo->prepare($sql);
    $eventdata->execute();
} catch (PDOException $e) {
    echo "error";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>活動管理</title>
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
                    <!-- 新增活動類別管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">新增活動種類</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                            <tr>
                                                <th>活動名稱</th>
                                                <th>活動介紹</th>
                                                <th>介紹圖片路徑一</th>
                                                <th>介紹圖片路徑二</th>
                                                <th>是否上架</th>
                                            </tr>
                                            <form action="addEvent.php" method="post" enctype="multipart/form-data">
                                                <tr class="tr-shadow">
                                                    <!-- 活動名稱 -->
                                                    <td><input class="inputLength" size="25" type="text" name="name"></td>
                                                    <!-- 活動介紹 -->
                                                    <td><input class="inputLength" size="40" type="text" name="description"></td>
                                                    <!-- 介紹圖片路徑一 -->
                                                    <!-- <td><input class="inputLength" size="40" type="text" name="desc_image01_path"></td> -->
                                                    <td><input class="inputLength" size="10" type="file" name="image01"></td>
                                                    <!-- 介紹圖片路徑二 -->
                                                    <!-- <td><input class="inputLength" size="40" type="text" name="desc_image02_path"></td> -->
                                                    <td><input class="inputLength" size="10" type="file" name="image02"></td>


                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                                title="新增">
                                                                <i class="zmdi zmdi-plus-circle"></i>
                                                            <input type="submit" name="" value="">
                                                            </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->


                        <br>
                        <!-- 活動總類管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">活動總類管理</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                            <tr>
                                                <th>分類編號</th>
                                                <th>活動名稱</th>
                                                <th>活動介紹</th>
                                                <th>介紹圖片路徑一</th>
                                                <th>介紹圖片路徑二</th>
                                                <th>是否上架</th>
                                            </tr>
                                        <?php
                                        if ($errMsg !="") {
                                            echo "<tr><td colspan='6' align='center'>$errMsg</td></tr>";
                                        } else {
                                            while ($eventRow = $eventdata->fetchObject()) {
                                                ?>
                                            
                                            <form action="eventUpdateToDb.php">
                                                <input type="hidden" name="activity_type_id" value="<?php echo $eventRow->activity_type_id; ?>">
                                                <tr class="tr-shadow">
                                                    <!--活動分類編號 -->
                                                    <td><?php echo $eventRow->activity_type_id; ?></td>
                                                    <!-- 活動名稱 -->
                                                    <td><input class="inputLength" size="10" type="text" name="name" value="<?php echo $eventRow->name; ?>"></td>
                                                    <!-- 介紹 -->
                                                    <td class="productintro"><input class="inputLength" size="50" type="text" name="description" value="<?php echo $eventRow->description; ?>"></td>
                                                    <!-- 圖片路徑一 -->
                                                    
                                                    <td class="productimg"><img src="../<?php echo $eventRow->desc_image01_path; ?>">
                                                        
                                                        <!-- <input class="productimg" size="20" type="text" name="desc_image01_path" value="<?php echo $eventRow->desc_image01_path; ?>"> -->
                                                    </td>
                                                    <!-- 圖片路徑二 -->
                                                    
                                                    <td class="productimg"><img src="../<?php echo $eventRow->desc_image02_path; ?>">
                                                        
                                                    <!-- <td><input class="productimg" size="20" type="text" name="desc_image02_path" value="<?php echo $eventRow->desc_image02_path; ?>"></td> -->
                                                    <!-- 是否上架 -->
                                                    <td>
                                                        <select name="is_on_shelves">
                                                            <option value="0" <?php if ($eventRow->is_on_shelves == 0) { echo 'selected="selected"';} ?> >是</option>
                                                            <option value="1" <?php if ($eventRow->is_on_shelves == 1) { echo 'selected="selected"'; }?> >否</option>
                                                        </select>
                                                    </td>
                                                     <!-- <td><input class="is_on_shelves" size="10" type="text" name="is_on_shelves" value="<?php echo $eventRow->is_on_shelves; ?>"></td> -->
                                                    
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

                                        <?php
                                            }
                                        }
                                        ?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    
                        <?php
                            try {
                                require_once("connectCd104g1.php");
                                $pdo = new PDO($dsn, $user, $password);
                                $sql = "select * from member_hold_activity";
                                $memberevent = $pdo->prepare($sql);
                                $memberevent->execute();
                            } catch (PDOException $e) {
                                echo "error";
                            }
                        ?>
                        <br>
                        <!--會員創辦活動管理-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">會員創辦活動管理</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <!-- <thead> -->
                                            <tr>
                                                <th>活動編號</th>
                                                <th>分類編號</th>
                                                <th>會員編號</th>
                                                <th>店鋪編號</th>
                                                <th>標題</th>
                                                <th>名稱</th>
                                                <th>介紹圖片路徑</th>
                                                <th>舉辦日期</th>
                                                <th>人數限制</th>
                                                <th>是否上架</th>
                                                <th>已報名人數</th>
                                                <th>活動狀態</th>
                                            </tr>
                                        <!-- </thead>
                                        <tbody> -->
                                        <?php
                                        while ($memberdata = $memberevent->fetch()) {
                                            ?>
                                            <tr class="tr-shadow">
                                                <!-- 活動編號 -->
                                                <td><?php echo $memberdata['activity_id']; ?></td>
                                                <!-- 活動分類編號 -->
                                                <td><?php echo $memberdata['activity_type_id']; ?></td>
                                                <!-- 會員編號 -->
                                                <td><?php echo $memberdata['member_id']; ?></td>
                                                <!-- 店鋪編號 -->
                                                <td><?php
                                                switch ($memberdata['store_id']) {
                                                    case '1':
                                                        echo '逢甲店鋪';
                                                        break;
                                                    case '2':
                                                        echo '北港店鋪';
                                                        break;
                                                    case '3':
                                                        echo '鹿港店鋪';
                                                        break;
                                                    case '4':
                                                        echo '新港店鋪';
                                                        break;
                                                    case '5':
                                                        echo '中壢店鋪';
                                                        break;
                                                } ?></td>
                                                <!-- 標題 -->
                                                <td><?php echo $memberdata['title']; ?></td>
                                                <!-- 名稱 -->
                                                <td><?php echo $memberdata['name']; ?></td>
                                                <!-- 介紹圖片路徑 -->
                                                <td class="productimg"><img src="../<?php echo $memberdata['desc_image01_path']; ?>"></td>                                                <!-- 舉辦日期 -->
                                                <td><?php echo $memberdata['hold_date']; ?></td>
                                                <!-- 人數限制 -->
                                                <td><?php echo $memberdata['max_people']; ?></td>
                                                <!-- 是否上架 -->
                                                <td><?php echo $memberdata['is_on_shelves']; ?></td>
                                                <!-- 已報名人數 -->
                                                <td><?php echo $memberdata['registered_people']; ?></td>
                                                <!-- 活動狀態 -->
                                                <td><?php echo $memberdata['state']; ?></td>

                                        
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <?php
                                        }?>

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