<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql =" update manager ";
	$sql=$sql." SET password=:password,role=:role,nickname=:nickname,state=:state ";
	$sql=$sql." where manager_id=:manager_id ";

	$member = $pdo->prepare($sql); 
	
	$member->bindValue(":password", $_POST["password"]);

	$role=2;
	if($_POST["role"]=="最高管理者"){
		$role=1;
	}
	else {
		$role=2;
	}
	$member->bindValue(":role", $role);

	$member->bindValue(":nickname", $_POST["nickname"]);

	$state=1;
	if($_POST["state"]=="停用"){
		$state=0;
	}
	else {
		$state=1;
	}
	$member->bindValue(":state", $state);

	$member->bindValue(":manager_id", $_POST["manager_id"]);
	$member->execute();

	echo "後台管理員資料<br>更新成功!";

}catch(PDOException $e){
  echo "訊息：".$e->getMessage();
}
header("location:../staff.php")
?>