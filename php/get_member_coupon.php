<?php
session_start();
try{
	require_once("connectCd104g1.php");
	
	$sql = "select * from member_coupon where member_id=:member_id";
	
  $member = $pdo->prepare($sql); 
  $member->bindValue(":member_id", $_SESSION["member_id"]);
  $member->execute();
  
  if($member->rowCount()==0){
  	echo "訊息:你沒有任何折價券!";
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