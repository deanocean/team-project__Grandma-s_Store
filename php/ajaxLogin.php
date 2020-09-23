<?php 
    session_start();

try{
  require_once("connectCd104g1.php");
  $sql = "select * from member where account=:account and password=:password";
  $member = $pdo->prepare($sql);
  $member->bindValue(":account", $_POST["account"]);
  $member->bindValue(":password", $_POST["password"]);
  $member->execute();

  if( $member->rowCount() ==0){ //查無此人
	  echo "not found";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetchObject();
	
		if($memRow->state==0){
			echo "disable";
		}else { 
			//寫入session
			$_SESSION["member_id"] = $memRow->member_id;
			$_SESSION["account"] = $memRow->account;
			$_SESSION["password"] = $memRow->password;
			$_SESSION["name"] = $memRow->name;
			$_SESSION["gender"] = $memRow->gender;
			$_SESSION["mobile_phone"] = $memRow->mobile_phone;
			$_SESSION["address"] = $memRow->address;
			$_SESSION["email"] = $memRow->email;
			$_SESSION["birthday"] = $memRow->birthday;
			$_SESSION["image_path"] = $memRow->image_path;
			$_SESSION["state"] = $memRow->state;
			$_SESSION["reported_times"] = $memRow->reported_times;
	
			//送出登入者的姓名資料
			echo json_encode($_SESSION);
		}  

  }
}catch(PDOException $e){
  echo "error";
}
?>