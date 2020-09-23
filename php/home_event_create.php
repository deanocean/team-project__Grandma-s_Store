<?php
try{
    require_once("connectCd104g1.php");
    $actSql = "select * from activity_type where is_on_shelves = 0";
    $actType = $pdo->query($actSql);
    $storeSql = "select * from store";
    $store = $pdo->query($storeSql);
}catch(PDOException $e){
  echo "error";
}
?>
<form id="create">
    <div class="wrap">
        <h2>發起活動</h2>
        <div id="create-top">
            <div>
                <label for="name">活動名稱</label>
                <input type="text" id="createName" maxlength="12" placeholder="寫下活動名稱吧...">
            </div>
            <div class="event-member">
                <img src="img/guest.jpg" alt="">
                <h3>發起人：<br><span>訪客</span></h3>
            </div>
        </div>
        <div class="hrline"></div>
        <div id="create-bottom">
            <label for="eventType">活動類型</label>
            <select id="createType">

            <?php 
                for($i=1; $i<=$actType->rowCount(); $i++){
                    $actRow = $actType->fetch();
            ?>
            <option value=<?php echo "type{$i}"; ?>"><?php echo $actRow[1]; ?></option>

            <?php } ?>
            
            </select>
            <br>
            <label for="eventLocation">活動店鋪</label>
            <select id="createStore">

            <?php 
                for($i=1; $i<=$store->rowCount(); $i++){
                    $storeRow = $store->fetch();
            ?>

                <option value="store1"><?php echo $storeRow[1]; ?></option>

            <?php } ?>

            </select>
            <br>
            <label for="eventPeople">活動人數</label>
            <select id="createPeople">
                <option value="people20">20人</option>
                <option value="people40">40人</option>
            </select>
        </div>
        <a href="#" class="event-btn" id="launch">
            <span>送出</span>
            <img src="img/section4-6/event-btn1.png" alt="">
        </a>
        <button class="btn">送出</button>
    </div>
    <i class="far fa-times-circle event-close"></i>
</form>