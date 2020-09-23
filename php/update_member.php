<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql =" update member ";
	$sql=$sql." SET password=:password,name=:name,mobile_phone=:mobile_phone,address=:address, ";
	$sql=$sql." email=:email,birthday=:birthday,image_path=:image_path ";
	$sql=$sql." where member_id=:member_id ";

	$member = $pdo->prepare($sql); 
	$member->bindValue(":member_id", $_SESSION["member_id"]);
	$member->bindValue(":password", $_REQUEST["password"]);
	$member->bindValue(":name", $_REQUEST["name"]);
	$member->bindValue(":mobile_phone", $_REQUEST["mobile_phone"]);
	$member->bindValue(":address", $_REQUEST["address"]);
	$member->bindValue(":email", $_REQUEST["email"]);
	$member->bindValue(":birthday", $_REQUEST["birthday"]);
	$member->bindValue(":image_path", $_REQUEST["image_path"]);
	$member->execute();

	echo "更新會員資料成功!";

}catch(PDOException $e){
  echo "訊息：".$e->getMessage();
}
?>