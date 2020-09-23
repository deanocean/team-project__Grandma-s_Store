<?php 
session_start();

if(isset($_SESSION['member_id'])){
    $member_id = $_SESSION['member_id'];
}else{
    $member_id=null;
}

// 活動編號(流水號)
$_SESSION["activity_id"] = $activity_id = $_REQUEST['activity_id'];
// 活動類型編號(流水號)
$_SESSION["activity_type_id"] = $activity_type_id =  $_REQUEST['activity_type_id'];

// 活動圖片路徑
$desc_image01_path = $_REQUEST['desc_image01_path'];

// 活動日期
$hold_date = $_REQUEST['hold_date'];
//活動名稱
$name = $_REQUEST['name'];

//活動店鋪
$storeName = $_REQUEST['storeName'];

//活動人數
$max_people = $_REQUEST['max_people'];

require_once("php/createEventPDO.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("head.html")?>    
    <title>阿婆柑仔店</title>
</head>

<body id="event-body">


<!-- nav.html -->
<?php require_once("nav.html"); ?>
<!-- login.html -->
<?php require_once("loginBox.html"); ?>


    <!-- 活動內頁內容 -->
    <div class="frame" id="event">
        
        <!-- 活動資訊 -->
        <div class="col-sm-12 col-lg-12">
            <div class="event-detail">
               
                <div class="pic"><img src="<?php echo $desc_image01_path?>" alt="活動照片"></div>

                
                <div class="col-sm-12 col-lg-12">
                    
                <form action="php/signUp.php" id="signUpForm">
                   
                    <div class="text">
                        <div class="event-title">
                            <input type="hidden" value="<?php echo $activity_id ;?>" name="activity_id">
                            <h2><?php echo $name?></h2>
                            <span>活動日期:<?php echo $hold_date?></span>
                            <span>活動地點: <?php echo $storeName?></span>
                            <button type="button" class="btn" id="sign-up">報名</button>                     
                        </div>
                    </div>
                </form>
             


                    <div class="event-intro">
                        <h2>活動介紹</h2>
                        <div class="event-time">
                            <span>活動人數：<?php echo $max_people?></span>
                            <span>報名費：200元/人(已含創作材料)</span>
                            <span>
                            活動簡介：
                            <?php
                            $stmt9 = $pdo->prepare($sql8);
                            $stmt9->bindValue(':activity_id',$activity_id);
                            $stmt9->execute();
                            $row6 = $stmt9->fetch();                
                            echo $row6["description"];                        
                            ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- 藍色分隔線 -->
        <div class="col-sm-12 col-lg-12">
            　<div class="event-info-line"></div>
        </div>


        <!-- 留言評論 開始 -->
        <div class="col-sm-12 col-lg-12">
            <h2 class="cmt-title">留言評論</h2>
        </div>

        <div class="col-sm-12 col-lg-12 cmt">

        <?php require_once("php/comment.php")?>

        </div><!--cmt 結束-->



        <!-- 其他活動 -->
        <div class="col-sm-12 col-lg-12">
            <h2 class="other-title">其他活動</h2>
        </div>



        <div class="col-sm-12 col-lg-12">
            <div class="other-events">
                    
<?php
    $sql="
        select m.name as 'memName', mha.activity_id as 'activity_id', mha.activity_type_id as 'activity_type_id', mha.title as 'title', mha.name as 'name', mha.desc_image01_path as 'imgPath', mha.hold_date as 'date', mha.description as 'desc', mha.max_people as 'max_people', s.store_id as 'store_id', s.name as 'store' from member_hold_activity mha JOIN member m ON mha.member_id = m.member_id JOIN store s ON mha.store_id = s.store_id order by RAND() LIMIT 3";
    $pdoStatement = $pdo->query($sql);
    $event = $pdoStatement->fetchAll();
    for ($p=0; $p<count($event);$p++) {
?>
                
        <form action="eventInfo.php" class="eventdata">
            <input type="hidden" value="<?php echo $event[$p]['activity_id'];?>" name="activity_id">
            <input type="hidden" value="<?php echo $event[$p]['activity_type_id'];?>" name="activity_type_id">
            <input type="hidden" value="<?php echo $event[$p]['imgPath'];?>" name="desc_image01_path">
            <input type="hidden" value="<?php echo $event[$p]['date'];?>" name="hold_date">
            <input type="hidden" value="<?php echo $event[$p]['name'];?>" name="name">
            <input type="hidden" value="<?php echo $event[$p]['store'];?>" name="storeName">
            <input type="hidden" value="<?php echo $event[$p]['max_people'];?>" name="max_people"> 
        </form><span class="eventdata">
            <div class="col-sm-12 col-lg-12">
                <div class="other-card hvr-glow">
                   <img src="<?php echo $event[$p]['imgPath']?>" alt="活動圖">
                    <h4><?php echo $event[$p]['title']?></h4>
                    <span>活動日期:<?php echo $event[$p]['date']?></span>
                    <span>活動店鋪:<?php echo $event[$p]['store']?></span>
                </div>
            </div>

        </span>
<?php
}
 ?>
                
            </div><!--other-events 結束-->
        </div>
    </div><!-- frame結束 -->




    <!-- 公版 footer -->
    <div id="footer">
        Copyright&#9400;阿婆柑仔店, all rights reserved
    </div>



</body>
<?php require_once("selfJs.html"); ?>
<!-- ajax_comment.js -->
<script src="js/self/ajax_comment.js"></script>
<!-- ajax_report -->
<script src="js/self/ajax_report.js"></script>

<script>
    function eventInit() { 
        var loginAlert =document.getElementById("loginAlert");
        var contentMsg =document.getElementsByClassName("contentMsg")[0];
            
        document.getElementById("sign-up").addEventListener('click',function(e){
            e.preventDefault();
            if (loginCheck()==0) {//無登入
                contentMsg.innerText="尚未登入，請登入";
            } else { //已登入
                contentMsg.innerText="報名成功";
                setTimeout(function(){document.getElementById("signUpForm").submit();},1000);
            }
            showLoginAlert(loginAlert);
        },false);
        
        
    }

    window.addEventListener("load", function(){
        var eventdatas = document.getElementsByClassName("eventdata");
        for(var i=0;i < eventdatas.length; i++){
            eventdatas[i].onclick = function(e){
                e.currentTarget.previousSibling.submit();
            }
        }

        load_comment();
        commentLoad();
    });

    window.addEventListener('load',eventInit,false);
</script>

<script>
    var event= document.querySelector('.event');
    // faq.className='pagebg';
    event.style.cssText=
    `color:#d53e23;
    background-image:url(img/member/nav-hover.png);
    background-size:110%;
    background-repeat:no-repeat;
    background-position:50%;
    `;
    var browser_w=document.body.clientWidth;
    if(browser_w <1200){
        event.style.cssText=
        `color:#d53e23;
        background-image:none;
        `;
    }
</script>

</html>


