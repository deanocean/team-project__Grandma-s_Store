<?php
session_start();
$errMsg="";

// $jsonStr = $_REQUEST["jsonStr"];
// $addReport_info = json_decode($jsonStr);

// echo $_SESSION['member_id'];

$member_id = $_SESSION['member_id'];
$message_id = $_REQUEST['message_id'];
// $activity_id = $_SESSION['activity_id'];


try {
    require_once('connectCd104g1.php');

    $sql = "
    INSERT INTO activity_msg_report 
    (message_id, member_id, report_reason_type, report_reason, report_datetime, state)
    VALUES (:message_id, :member_id, '', '', now(), '1');";

    $pdoStatment = $pdo->prepare($sql);
    // $pdoStatment->bindValue(":message_id", $addReport_info->message_id);
    $pdoStatment->bindValue(":message_id", $message_id);
    // $pdoStatment->bindValue(":member_id", $addReport_info->member_id);
    $pdoStatment->bindValue(":member_id", $member_id);

    $pdoStatment->execute();
} catch (PDOException $e) {
    $errMsg = "錯誤原因：".$e->getMessage()."<br>"."錯誤行號：".$e->getLine()."<br>";
};

if ($errMsg == "") {
    echo "檢舉成功！";
} else {
    echo $errMsg;
};
