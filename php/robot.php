<?php
$errMsg='';
$saymessage = $_POST['saymessage'];
// echo $_POST['saymessage'];
// $saymessage = '營業時間';
try{
	require_once("connectCd104g1.php");
	$sql = "select * from word_keyword a
    join robot_words b
	on a.word_id = b. word_id
	where keyword = :saymessage";
	// echo $sql;

	$pdostatement = $pdo -> prepare($sql);
	$pdostatement->bindValue(":saymessage",$saymessage);
	$pdostatement->execute();

	if($pdostatement->rowCount()==0){ //not found
		echo "您的問題目前無法回答，歡迎致電至各店鋪詢問。";
	}else{//如果找得資料，取回資料，送出xml文件
		$memRow = $pdostatement->fetchObject();	
		echo $memRow->word;
	}

} catch (PDOException $e){
	$errMsg="錯誤原因 : ".$e->getMessage()."<br>"."錯誤行號 : ".$e->getLine."<br>";
}
?>

