<?php 
try{
	require_once("connectCd104g1.php");
	
  $sql = "select * from member where account=:account and email=:email";
  $member = $pdo->prepare($sql);
  $member->bindValue(":account", $_POST["account"]);
  $member->bindValue(":email", $_POST["email"]);
  $member->execute();
 
  if( $member->rowCount() ==0){ 
	  echo "訊息：帳號與Email驗證失敗!";
	}else{ 
		
		$sql2 = "update member set password=:password where account=:account ";
		$member2 = $pdo->prepare($sql2);
		$member2->bindValue(":account", $_POST["account"]);
		$member2->bindValue(":password", $_POST["password"]);
		$member2->execute();

  
		$sql3 = "select * from member where account=:account and password=:password";
		$member3 = $pdo->prepare($sql3);
		$member3->bindValue(":account", $_POST["account"]);
		$member3->bindValue(":password", $_POST["password"]);
		$member3->execute();
		if( $member3->rowCount() ==0){ 
			echo "訊息：更新密碼失敗!";
		}else{ 
			echo "重設並更新密碼成功!請重新登入!";
		}
			
  }
}catch(PDOException $e){
  echo "訊息：".$e->getMessage();
}
?>