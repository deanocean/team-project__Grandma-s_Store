<?php require_once("php/createEventPDO.php")?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("head.html")?>
    <!-- component.css -->
    <link rel="stylesheet" href="css/component.css">
    <!-- modernizr.custom.js -->
    <script src="js/plugin/modernizr.custom.js"></script>
    <title>阿婆柑仔店</title>
</head>

<body id="event-body">

<!-- nav.html -->
<?php require_once("nav.html"); ?>
<!-- login.html -->
<?php require_once("loginBox.html"); ?>

    <!-- 活動首頁憶起玩童年 開始 -->
    <div id="topic-pic">
        <img src="img/1212.gif" alt="活動總覽">
        <h1>活動總覽</h1>
    </div>
    <!-- 活動首頁憶起玩童年 結束 -->


    <!-- hold-act 開始 -->
    <div class="frame" id="event">
            <div class="col-lg-12 hold-act">
                <div class="act-type">
                    <label for="eventType">活動類型:</label>
                        <select class="card-select pull-down" id="createType">
                            <?php
                                $rows1 = $stmt1->fetchAll();
                                foreach ($rows1 as $row1) {
                            ?>
                                <option value='<?php echo $row1["activity_type_id"]?>'><?php echo $row1["name"] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                </div>


                <div class="act-shop">
                    <label for="eventLocation">活動店鋪:</label>
                        <select class="card-select pull-down" id="createStore">
                            <?php
                                $rows2 = $stmt2->fetchAll();
                                foreach ($rows2 as $row2) {
                            ?>
                                <option value='<?php echo $row2["store_id"]?>'><?php echo $row2["name"] ?></option>
                            <?php
                                }
                            ?>              
                        </select>
                </div>


                <div class="act-people">
                    <label for="eventPeople">活動人數:</label>
                        <select class="card-select pull-down" id="createPeople">
                            <option value="people20">20人</option>
                            <option value="people40">40人</option>
                        </select>
                </div>


                <button class="btn eventbtn" id="launch">發起活動</button>
                <!-- <input type="submit" class="btn" id="launch" value="發起活動">  -->
            </div> 
        <!-- hold-act 結束 -->


        <!-- 填辦活動表單 -->
        <?php require_once("createEvent.php")?>

 
        <!-- orange line -->
        <div class="col-sm-12 col-lg-12">
            <div class="event-line"></div>
        </div>



        <!-- 瀑布流 -->
        <div class="container">

            <section class="grid-wrap">
                <ul class="grid swipe-down" id="grid">                     
                          <!-- 以下利用pdo取得資料庫表格內容 -->
                         
                    <?php
                        $rows5 = $stmt5->fetchAll();
                        foreach ($rows5 as $row5) {                                                    
                    ?>
                    <!-- eventInfo.php -->
                     <li class="eventLocate">

                        <a>  
                        <form action="eventInfo.php" class="eventdata">
                            <input type="hidden" value="<?php echo $row5['activity_id'];?>" name="activity_id">
                            <input type="hidden" value="<?php echo $row5['activity_type_id'];?>" name="activity_type_id">
                            <input type="hidden" value="<?php echo $row5['desc_image01_path'];?>" name="desc_image01_path">
                            <input type="hidden" value="<?php echo $row5['hold_date'];?>" name="hold_date">
                            <input type="hidden" value="<?php echo $row5['name'];?>" name="name">
                            <input type="hidden" value="<?php echo $row5['storeName'];?>" name="storeName">
                            <input type="hidden" value="<?php echo $row5['max_people'];?>" name="max_people">                 
                        </form><span class="eventdata">
                        
                            
                            <img src='<?php echo $row5["desc_image01_path"];?>' alt="照片" class="eventpic">
                            <p><?php echo $row5["title"];?>
                            <!-- <br> -->
                            <span><?php echo $row5["name"];?></span>
                            <!-- <br> -->
                            <span>活動日期:<?php echo $row5["hold_date"];?></span>
                            <!-- <br> -->
                            <span>活動地點:<?php echo $row5["storeName"];?></span>
                            <!-- <br> -->
                            </p>
                        
                        </span>

                        </a>
                    </li>
                  
                    <?php
                    }
                    ?> 
                </ul>
            </section>




        </div><!-- container -->
    </div><!-- frame結束 -->


    <!-- 公版 footer -->
    <div id="footer">
        Copyright&#9400;阿婆柑仔店, all rights reserved
    </div>

</body>
<?php require_once("selfJs.html")?>
    <!-- water flow -->
    <script src="js/plugin/masonry.pkgd.min.js"></script>
    <script src="js/plugin/imagesloaded.pkgd.min.js"></script>
    <script src="js/plugin/classie.js"></script>
    <script src="js/plugin/colorfinder-1.1.js"></script>
    <script src="js/plugin/gridScrollFx.js"></script>
    <!-- eventLightBox.js -->
    <script src="js/self/eventLightBox.js"></script>
    <!-- ajax createEvent.js -->
    <script src="js/self/ajax_createEvent.js"></script>

    <!-- water flow -->
    <script>
        new GridScrollFx(document.getElementById('grid'), {
            viewportFactor: 0.4
        });
    </script>

    <!-- form method(get) -->
    <script>
        window.addEventListener("load", function(){
        var eventdatas = document.querySelectorAll("#grid .eventLocate");
            for(var i=0;i < eventdatas.length; i++){
                eventdatas[i].onclick = function(e){
                    // console.log(e.currentTarget.childNodes[1].childNodes[1]);
                    e.currentTarget.childNodes[1].childNodes[1].submit();
                }
            }
        })
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

