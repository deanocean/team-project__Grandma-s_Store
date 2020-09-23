<?php
session_start();

$errMsg = "";
try{
    require_once("connectCd104g1.php");
   
    $sql4 ="INSERT INTO member_hold_activity ( activity_type_id, member_id, store_id, title, name, description, desc_image01_path, desc_image02_path, desc_image03_path, desc_image04_path, desc_image05_path, hold_date, charge, max_people, is_on_shelves, registered_people, state)
     VALUES ( :activity_type_id, :member_id, :store_id, :title, :name, :description, :desc_image01_path, NULL, NULL, NULL, NULL, :hold_date, :charge, :max_people, :is_on_shelves, :registered_people, :state)";

    $sql5 = "select name from activity_type where activity_type_id = :title";

    if(isset($_SESSION["member_id"])===true){
    $activity_type_id =$_POST["actType"]; 
    $member_id = $_SESSION["member_id"];
    $store_id = $_POST["actShop"];
    $title = $_POST["actType"];
    $name = $_POST["actName"];
    $description = $_POST['actDesc'];

    // $desc_image01_path = "img/event/lantern1.jpg";
    $desc_image01_path = $_POST["desc_image01_path"];
    $hold_date = $_POST["actHoldDate"];
    $charge= "200"; 
    $max_people = $_POST["actPeople"];
    // $is_on_shelves = "0";
    $is_on_shelves = $_POST["is_on_shelves"];
    $registered_people = "0";
    // $registered_people = $_POST["registered_people"];
    // $state = "1";
    $state = "1";

    $stmtX = $pdo->prepare($sql5);
    $stmtX->bindValue(":title", $title); //OK
    $stmtX->execute();
    $stmtXRow = $stmtX->fetch();

    $stmt6 = $pdo->prepare($sql4);
    $stmt6->bindValue(":activity_type_id", $activity_type_id); //OK
    $stmt6->bindValue(":member_id", $member_id); //OK
    $stmt6->bindValue(":store_id", $store_id); //OK
    $stmt6->bindValue(":title", $stmtXRow["name"]); //OK
    $stmt6->bindValue(":name", $name); //OK
    $stmt6->bindValue(":description", $description); //OK
    $stmt6->bindValue(":desc_image01_path", $desc_image01_path); //OK
    $stmt6->bindValue(":hold_date", $hold_date); //OK
    $stmt6->bindValue(":charge", $charge); //OK
    $stmt6->bindValue(":max_people", $max_people); //OK
    $stmt6->bindValue(":is_on_shelves", $is_on_shelves); //OK
    $stmt6->bindValue(":registered_people", $registered_people); //OK
    $stmt6->bindValue(":state", $state); //OK
    $stmt6->execute();


    }else{
        // $alert = '<script> alert("尚未登入!!"); </script>';
        echo '<script> alert("尚未登入!!"); </script>';
    }

   
    header("Location:../event.php");

   
}catch(PDOException $e){
    $errMsg ="錯誤原因 : " . $e->getMessage(). "<br>".   "錯誤行號 : ". $e->getLine(). "<br>";
}
?>  
