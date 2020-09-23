<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql =" select mha.activity_id,mha.activity_type_id,mha.name as activity_name,s.store_id,s.name,mha.hold_date,mha.desc_image01_path,mha.max_people ";
	$sql =$sql." from member_join_activity as mja ";
	$sql =$sql." join member_hold_activity as mha ";
	$sql =$sql." on mja.activity_id=mha.activity_id ";
	$sql =$sql." join store as s ";
	$sql =$sql." on mha.store_id=s.store_id ";
	$sql =$sql." where mja.member_id=:member_id ";

	$member = $pdo->prepare($sql); 
	$member->bindValue(":member_id", $_SESSION["member_id"]);
	$member->execute();

	if($member->rowCount()==0){ 
		echo "訊息:你沒有參加任何活動";
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