<?php
try{
	require_once("connectCd104g1.php");

	// 檢查帳號是否存在
	$sql =" select * from member where account=:account ";

	$member = $pdo->prepare($sql); 
	$member->bindValue(":account", $_REQUEST["account"]);
	$member->execute();

	if($member->rowCount()!=0){ 
		echo "訊息:此帳號已存在，無法註冊!";
	}
  	else{
		$sql2 ="INSERT INTO member(member_id, account, password, name, gender, mobile_phone, address, email, birthday, image_path, state, reported_times) ";
		$sql2 =$sql2."VALUES (null, :account , :password ,'尚未輸入',null,'尚未輸入','尚未輸入', :email ,'1980-11-11','img/head/default_head.jpg',1,0)";
	
		$member2 = $pdo->prepare($sql2); 
		$member2->bindValue(":account", $_REQUEST["account"]);
		$member2->bindValue(":password", $_REQUEST["password"]);
		$member2->bindValue(":email", $_REQUEST["email"]);
		$member2->execute();
	
		echo "會員註冊成功!";
	}
	
}catch(PDOException $e){
	echo "訊息：".$e->getMessage();
}
?>