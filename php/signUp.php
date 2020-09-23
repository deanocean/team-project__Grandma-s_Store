
<?php
 session_start();

try{
    require_once('connectCd104g1.php');
    $sql = "
    INSERT INTO member_join_activity
    (member_id, activity_id, register_date, state)
    VALUES (:member_id, :activity_id, now(), '1')
    ";
    // echo $_SESSION['member_id'];

    $member_id = intval($_SESSION['member_id']);

    $activity_id = $_SESSION["activity_id"];
    // echo $activity_id;

    // $_SESSION["activity_id"] = $activity_id = $_REQUEST['activity_id'];




    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":member_id",$member_id);
    $stmt->bindValue(":activity_id",$activity_id);
    $stmt->execute();

    $url = "http://140.115.236.71/demo-projects/CD104/CD104G1/event.php";  
    echo "<script language='javascript' 
    type='text/javascript'>";  
    echo "window.location.href='$url'";  
    echo "</script>";

}catch(PDOExceptiom $e){
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";

}
?>