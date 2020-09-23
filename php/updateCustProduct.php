<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql2 ="SELECT MAX(product_id) as maxid from product";
	$cust2 = $pdo->prepare($sql2); 
	$cust2->execute();
	$maxproductid="";
	while ($row = $cust2->fetchObject()) {
		$maxproductid = $row->maxid;	
	}



	$sql ="UPDATE product SET is_on_shelves=0 WHERE product_id=:product_id";

	// $cust = $pdo->prepare($sql); 
	// $cust->bindValue(":name", $_REQUEST["name"]);
	// $cust->bindValue(":price", $_REQUEST["price"]);
	// $cust->execute();

	$cust = $pdo->prepare($sql); 
	$cust->bindValue(":product_id", $maxproductid);
	$cust->execute();
	// $cust->bindValue(":is_on_shelves", $_REQUEST["is_on_shelves"]);
	// echo "新增一筆客製化產品成功";
	// header("Location:products-main.php");

}catch(PDOException $e){
  echo $e->getMessage();
}




?>