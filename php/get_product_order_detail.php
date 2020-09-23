<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql =" select p.name,p.price,pod.qty ";
	$sql =$sql." from product_order_detail as pod ";
	$sql =$sql." join product as p ";
	$sql =$sql." on pod.product_id=p.product_id ";
	$sql =$sql." where pod.order_id=:order_id ";
	
	$order = $pdo->prepare($sql); 
	$order->bindValue(":order_id", $_REQUEST["order_id"]);
	$order->execute();

	if($order->rowCount()==0){ 
		echo "訊息:此訂單沒有明細資訊";
	}else{ 
		$result="";
		$dt_order=$order->fetchAll();
		$rowcount=0;
		foreach ($dt_order as $row) {
			$rowcount+=1;
			$result=$result.json_encode($row);
			if($rowcount<$order->rowCount()){
				$result=$result."split";
			}	
		}
		echo $result;
	}	

}catch(PDOException $e){
	echo "訊息：".$e->getMessage();
}
?>