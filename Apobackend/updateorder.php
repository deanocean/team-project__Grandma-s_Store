<?php
$orderid = $_POST["id"];
$order_state = $_POST["orderstate"];
echo $orderid;
echo $_POST["orderstate"];

$msg = $errMsg = "";
try{
    require_once("connectCd104g1.php");
    $sql="update product_order set order_state = :order_state where order_id = :orderid";

    $changestate = $pdo->prepare($sql);
    $changestate->bindValue(":order_state",$order_state);
	$changestate->bindValue(":orderid",$orderid);
    $changestate->execute();
    header("location:order.php");
} catch (PODException $e){
	$errMsg = "錯誤原因:".$e->getMesage()."<br>"."錯誤行號:".$e->getLine()."<br>";
} 
?>