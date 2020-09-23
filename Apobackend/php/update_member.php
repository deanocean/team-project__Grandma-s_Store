<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql =" update member SET state = :state where member_id = :member_id ";
	
	$member = $pdo->prepare($sql); 
	$member->bindValue(":member_id", $_POST["member_id"]);
   
	$state=1;
	if($_POST["state"]=="停用"){
		$state=0;
	}
	else {
		$state=1;
	}
	$member->bindValue(":state", $state);
	
	$member->execute();

	echo "會員資料<br>更新成功!";

}catch(PDOException $e){
  echo "訊息：".$e->getMessage();
}
header("location:../member.php")
?>