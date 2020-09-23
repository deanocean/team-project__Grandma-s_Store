<?php
try{
	require_once("connectCd104g1.php");

	// 檢查帳號是否存在
	$sql =" select * from manager where account=:account ";

	$member = $pdo->prepare($sql); 
	$member->bindValue(":account", $_POST["account"]);
	$member->execute();

	if($member->rowCount()!=0){ 
		echo "訊息:此帳號已存在，無法註冊!";
	}
  	else{
		$sql2 ="INSERT INTO manager ( manager_id, account, password, role, nickname, state) ";
		$sql2 =$sql2."VALUES (null, :account , :password , :role , :nickname, :state ) ";
	
		$member2 = $pdo->prepare($sql2); 
		$member2->bindValue(":account", $_POST["account"]);
		$member2->bindValue(":password", $_POST["password"]);

		$role=2;
		if($_POST["role"]=="最高管理者"){
			$role=1;
		}
		else {
			$role=2;
		}
		$member2->bindValue(":role", $role);

		$member2->bindValue(":nickname", $_POST["nickname"]);

		$state=1;
		if($_POST["state"]=="停用"){
			$state=0;
		}
		else {
			$state=1;
		}
		$member2->bindValue(":state", $state);

		$member2->execute();
	
		echo "後台管理員註冊成功!";
	}
	
}catch(PDOException $e){
	echo "訊息：".$e->getMessage();
}
header("location:../staff.php")
?>