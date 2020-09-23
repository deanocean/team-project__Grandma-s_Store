<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql =" delete from member_join_activity where member_id=:member_id and activity_id=:activity_id ";
	
	$member = $pdo->prepare($sql); 
	$member->bindValue(":member_id", $_SESSION["member_id"]);
	$member->bindValue(":activity_id", $_REQUEST["activity_id"]);
	$member->execute();

	echo "刪除會員一筆參加的活動成功!";

}catch(PDOException $e){
  echo "訊息：".$e->getMessage();
}
?>