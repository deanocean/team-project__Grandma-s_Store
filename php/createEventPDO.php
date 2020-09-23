<?php
// session_start();

try {
    require_once("connectCd104g1.php");
    // require_once("../eventInfo.php");



    $sql1 = "select * from activity_type where is_on_shelves = 0";
    $sql2 = "select * from store";
    $sql3 = "select * from member_hold_activity order by hold_date";
    $sql4 ="INSERT INTO member_hold_activity ( activity_type_id, member_id, store_id, title, name, description, desc_image01_path, desc_image02_path, desc_image03_path, desc_image04_path, desc_image05_path, hold_date, charge, max_people, is_on_shelves, registered_people, state)
     VALUES ( :activity_type_id, :member_id, :store_id, :title, :name, :description, :desc_image01_path, NULL, NULL, NULL, NULL, :hold_date, :charge, :max_people, :is_on_shelves, :registered_people, :state)";

    $sql5 = "select * from activity_type";
    $sql6 = "select mha.*, s.name storeName from member_hold_activity mha join store s on mha.store_id = s.store_id order by hold_date desc";
    $sql7 = "select a_t.description a_t_d, a_t.desc_image01_path a_t_img1, a_t.desc_image02_path a_t_img2, m_h_a.* from activity_type a_t join member_hold_activity m_h_a on a_t.activity_type_id = m_h_a.activity_id";
    $sql8 = "SELECT * FROM member_hold_activity where activity_id=:activity_id";


    $stmt1 = $pdo->query($sql1); //撈活動主頁面:活動類型
    $stmt2 = $pdo->query($sql2); //撈活動主頁面:活動店鋪
    $stmt3 = $pdo->query($sql1); //撈燈箱:活動類型
    $stmt4 = $pdo->query($sql2); //撈燈箱:活動店鋪
    $stmt5 = $pdo->query($sql6); //撈會員所辦活動 內容

    $stmt6 = $pdo->query($sql1); //撈活動預設圖片路徑

    $stmt7 = $pdo->query($sql3); 
    $stmt8 = $pdo->query($sql6);



    // $stmt7 =$pdo->prepare($sql5);
    // $stmt7->bindValue(':activity_type_id',$activity_type_id);
    // $stmt7->execute();
    
    } catch (PDOException $e) {
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
        echo "錯誤行號 : ", $e->getLine(), "<br>";
    }
?>