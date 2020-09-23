<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql =" delete from favorite_goods where member_id=:member_id and product_id=:product_id ";
	
	$member = $pdo->prepare($sql); 
	$member->bindValue(":member_id", $_SESSION["member_id"]);
	$member->bindValue(":product_id", $_REQUEST["product_id"]);
	$member->execute();

	echo "刪除會員一筆最愛商品成功!";

}catch(PDOException $e){
  echo "訊息：".$e->getMessage();
}
?>