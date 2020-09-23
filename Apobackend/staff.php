<?php
try{
	require_once("connectCd104g1.php");
    $sql = "select * from manager";
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
    <title>員工管理</title>
    <?php require_once("BackendHead.php") ?>
    <style>
        input[type="text"]{
            width: 150px;
            height:20px;
        }
        input[type="password"]{
            width: 100px;
            height:20px;
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




                        <!-- 活動總類管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">員工新增</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <!-- <thead> -->
                                            <tr>
                                                <th>
                                                    <!-- <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label> -->
                                                </th>

                                                <!-- <th>管理員編號</th> -->
                                                <th></th>

                                                <th>帳號</th>
                                                <th>密碼</th>
                                                <th>管理員角色</th>
                                                <th>暱稱</th>
                                                <th>管理員狀態</th>

                                            </tr>
                                        <!-- </thead>
                                        <tbody> -->
                                       
                                            <tr class="tr-shadow">
                                                <form action="php/add_manager.php" method='post' accept-charset='utf-8'  id='form_add_member'>
                                                <td>
                                                    <!-- <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label> -->
                                                </td>

                                                <!-- 管理員編號 -->
                                                <td>
                                                    
                                                    
                                                </td>

                                                <!-- 帳號 -->
                                                <td><input type='text' name='account' class="form-control" value=''></td>
                                                
                                                <!-- 密碼 -->
                                                <td><input type='password' name='password' class="form-control" value=''></td>
                                                    
                                                <!-- 管理員角色 -->
                                                <td>
                                                    <select name="role">
                                                        <option>最高管理者</option>
                                                        <option selected>一般管理者</option>
                                                    </select>
                                                </td>

                                                <!-- 暱稱 -->
                                                <td><input type='text' name='nickname' class="form-control" value=''></td>
                                                
                                                <!-- 管理員狀態 -->
                                                <td>
                                                    <select name="state">
                                                        <option>停用</option>
                                                        <option selected>啟用</option>
                                                    </select>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">  
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="新增">
                                                            <i class="zmdi zmdi-plus-circle"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                </form>
                                            </tr>

                                            <tr class="spacer"></tr>
                                       

                                        <!-- </tbody> -->
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->

                               

                            </div>
                        </div>

                        <!-- 活動總類管理 -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">員工修改</h3>
                               

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <!-- <thead> -->
                                            <tr>
                                                <th>
                                                    <!-- <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label> -->
                                                </th>

                                                 <!-- <th>管理員編號</th> -->
                                                 <th></th>

                                                <th>帳號</th>
                                                <th>密碼</th>
                                                <th>管理員角色</th>
                                                <th>暱稱</th>
                                                <th>管理員狀態</th>

                                            </tr>
                                        <!-- </thead>
                                        <tbody> -->
                                        <?php
                                        while ($responses = $msgdata->fetch()){
                                        ?>
                                            <tr class="tr-shadow">
                                                <form action="php/update_manager.php" method='post' accept-charset='utf-8'  id='form_no_<?php echo $responses['manager_id'];?>'>
                                                <td>
                                                    <!-- <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label> -->
                                                </td>

                                                <!-- 管理員編號 -->
                                                <td>
                                                    <!-- <?php echo $responses['manager_id'];?> -->
                                                    <input type="hidden" name="manager_id" value="<?php echo $responses['manager_id'];?>">
                                                </td>

                                                <!-- 帳號 -->
                                                <td><?php echo $responses['account'];?></td>
                                                
                                                <!-- 密碼 -->
                                                <td><input type='password' name='password' class="form-control" value='<?php echo $responses['password'];?>'></td>
                                                    
                                                <!-- 管理員角色 -->
                                                <td>
                                                    <select name="role" <?php if($responses['account'] == 'admin') echo "disabled"; ?>>
                                                        <option <?php if($responses['role'] == '1') echo"selected"; ?> >最高管理者</option>
                                                        <option <?php if($responses['role'] == '2') echo"selected"; ?> >一般管理者</option>
                                                    </select>
                                                </td>

                                                <!-- 暱稱 -->
                                                <td><input type='text' name='nickname' class="form-control" <?php if($responses['account'] == 'admin') echo "readonly"; ?>  value='<?php echo $responses['nickname'];?>'></td>
                                                
                                                <!-- 管理員狀態 -->
                                                <td>
                                                    <select name="state" <?php if($responses['account'] == 'admin') echo "disabled"; ?>>
                                                        <option <?php if($responses['state'] == '0') echo"selected"; ?> >停用</option>
                                                        <option <?php if($responses['state'] == '1') echo"selected"; ?> >啟用</option>
                                                    </select>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">  
                                                        <button id="save_no_<?php echo $responses['manager_id'];?>" class="item save" data-toggle="tooltip" data-placement="top" title="修改">
                                                            <i class="zmdi zmdi-edit"></i>
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

<script>

    function enable_edit(e) {
        // let obj=e.target;
        console.log(e);
        // $(e.target.id+'input').attr("readonly",false);
        // $(e.target.id+'select').attr("disable",false);
         $('input').attr("readonly",false);
        $('select').attr("disable",false);
    }

    function update_manager(e) {

        var formData = new FormData(document.getElementById(e.target.id));
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    alert(xhr.responseText);  
                }else{
                    alert(xhr.status);
                }
            }
        }
        xhr.open('POST', 'php/update_manager.php', true);
        xhr.send(formData);
        
    }

    function initial(){

        $('.modify').click(function () {
            enable_edit();
        })
        // document.getElementById("modify_manager").addEventListener("click",enable_edit);

    }

    window.addEventListener("load",initial,false);
</script>

</body>

</html>
<!-- end document-->