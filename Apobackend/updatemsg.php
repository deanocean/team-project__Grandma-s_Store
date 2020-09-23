<?php
$msgid = $_POST["id"];
$msgstate = $_POST["msgstste"];
echo $msgid;
echo $msgstate;

$msg = $errMsg = "";
try{
    require_once("connectCd104g1.php");
    $sql="update activity_msg_report set state = :msgstate where report_id = :msgid";

    $changestate = $pdo->prepare($sql);
    $changestate->bindValue(":msgstate",$msgstate);
	$changestate->bindValue(":msgid",$msgid);
    $changestate->execute();
    header("location:msg-board.php");
} catch (PODException $e){
	$errMsg = "錯誤原因:".$e->getMesage()."<br>"."錯誤行號:".$e->getLine()."<br>";
} 
?>