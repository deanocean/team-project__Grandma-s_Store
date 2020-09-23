<?php
$product_id = $_REQUEST["product_id"];
$is_on_shelves =$_REQUEST["is_on_shelves"];
echo $is_on_shelves;
$errMsg = "";

try{

	require_once("connectCd104g1.php");

	$sql = "UPDATE product set is_on_shelves=:is_on_shelves where product_id =$product_id";
	$products = $pdo->prepare($sql);
    $products->bindValue(":is_on_shelves", $is_on_shelves);
	$products->execute();

	header('location:index.php');


} catch (PODException $e){
	$errMsg = "錯誤原因:".$e->getMessage()."<br>"."錯誤行號:".$e->getLine()."<br>";
}
?>