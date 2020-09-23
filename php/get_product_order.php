<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql =" select * ";
	$sql =$sql." from product_order as po ";
	$sql =$sql." JOIN member as m ";
	$sql =$sql." on po.member_id=m.member_id ";
	$sql =$sql." where po.member_id=:member_id order by order_id desc ";

	$member = $pdo->prepare($sql); 
	$member->bindValue(":member_id", $_SESSION["member_id"]);
	$member->execute();

	if($member->rowCount()==0){ 
		echo "訊息：你沒有任何訂單";
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