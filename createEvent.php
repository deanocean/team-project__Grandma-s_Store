<!-- 發起活動燈箱 -->

<?php require_once("php/createEventPDO.php");?>

<div class="show-launch-bg"></div>

<div id="show-launch">
    <form method="post" action="php/launch.php" name="form1" id="form1">
        <h6 class="close-show-launch"><i class="fas fa-times-circle btnCancel" id="btnCancel"></i></h6>

        <h2>建立新活動!</h2>
        <p>緊來填寫資料喔! 作伙和朋友憶起玩童年!</p>

        <div class="act-group">
            <div class="act-type">
                <h2>活動類型</h2>
                <select class="card-select pull-down" id="boxType" name="actType" required>
                    <?php
                        $rows3 = $stmt3->fetchAll();
                        foreach ($rows3 as $row3) { 
                    ?>
                    <option value='<?php echo $row3["activity_type_id"]?>'><?php echo $row3["name"] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="act-shop">
                <h2>活動店鋪</h2>
                <select class="card-select pull-down" id="boxStore" name="actShop" required>
                    <?php
                        $rows4 = $stmt4->fetchAll();
                        foreach ($rows4 as $row4) { 
                    ?>
                    <option value='<?php echo $row4["store_id"]?>'><?php echo $row4["name"] ?></option>
                    <?php
                        }
                    ?>  
                </select>
            </div>

            <div class="act-people">
                <h2>活動人數</h2>
                <select class="card-select pull-down" id="boxPeople" name="actPeople" required>
                    <option value="20">20人</option>
                    <option value="40">40人</option>
                </select>
            </div>
        </div>
        
        



        <div class="user-evt-dtl">
            <h6>活動標題</h6><input type="text" id="user-evt-name" maxlength="8" placeholder="寫下活動名稱吧..." name="actName" required >
            <h6>活動簡介</h6><input id="user-evt-intro" cols="10" rows="3" maxlength="20" placeholder="寫下介紹吧..." name="actDesc" required >
            <!-- <h6>活動日期</h6><input type="date" id="user-evt-date" name="actHoldDate" required> -->
            <h6>活動日期</h6><input type="date" id="user-evt-date" name="actHoldDate" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" required>
            <h6>活動圖片</h6>
            <div class="user-evt-pic">
                <select class="card-select user-pic-select" id="user-pic-select" required>                              
                        <option value='0'>圖片一</option>
                        <option value='1'>圖片二</option>

                </select>
                <?php $rows6= $stmt8->fetchAll();
                    foreach ($rows6 as $row6) {
                        
                    }?>
            <input type="hidden" name="mha_desc" value="<?php echo $row3['description']?>">
            <input type="hidden" name="is_on_shelves" value="<?php echo $row6['is_on_shelves']?>">
            <input type="hidden" id="registered_people" value="<?php echo $row6['registered_people']?>">


                 <img src="img/event/kite1.jpg" alt="活動照片" class="selected-pic" id="selected-pic">
                 <input type="hidden" name="desc_image01_path" value="" id="hiddenImg">
                
                
            </div>
        </div>
    </form>
    <button class="btn" id="launch-ok">確認</button>
</div>



<script>
    function eventInit() { 
        var loginAlert =document.getElementById("loginAlert");
        var contentMsg =document.getElementsByClassName("contentMsg")[0];

        // document.getElementById("form1").addEventListener("submit",function(){
            document.getElementById("launch-ok").addEventListener("click",function(){
            // return false;
            if (loginCheck()==0) {//無登入
                    contentMsg.innerText="尚未登入，請登入";                    
            } else { //已登入
                contentMsg.innerText="創辦活動成功";
                setTimeout(function(){document.form1.submit();}, 2000);
            }
            showLoginAlert(loginAlert);
        },false);
        
        
    }

    window.addEventListener('load',eventInit,false);

</script>

<script>
var user_pic = document.getElementById('user-pic-select');
var selected_pic = document.getElementById('selected-pic');
user_pic.addEventListener("change",function(){

    if(user_pic.value == 0){
        // path2
        console.log("selected_pic : "+selected_pic);
        selected_pic.src = createBoxImg[0];
        console.log(createBoxImg[0]);
    }else{
        console.log("selected_pic : "+selected_pic);
        selected_pic.src =  createBoxImg[1];
        console.log(createBoxImg[1]);

    }
        // selected_pic.
},false);
</script>
