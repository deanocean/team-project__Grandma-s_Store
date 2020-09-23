<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql =" select p.product_id,p.name,p.price,pi.image_path from favorite_goods as f ";
	$sql =$sql." join product as p ";
	$sql =$sql." on f.product_id=p.product_id ";
	$sql =$sql." join product_image as pi ";
	$sql =$sql." on p.product_id=pi.product_id ";
	$sql =$sql." where f.member_id=:member_id ";
	
	$member = $pdo->prepare($sql); 
	$member->bindValue(":member_id", $_SESSION["member_id"]);
	$member->execute();

	if($member->rowCount()==0){ 
		echo "訊息:你沒有任何收藏商品";
	}else{ 
		$result="";
		$dt_member=$member->fetchAll();
		$rowcount=0;
		foreach ($dt_member as $row) {
			$rowcount+=1;
			$result=$result.json_encode($row);
			if($rowcount<$member->rowCount()){
				$result=$result."split";
			}	
		}
		echo $result;
	}	

}catch(PDOException $e){
	echo "訊息：".$e->getMessage();
}
?>