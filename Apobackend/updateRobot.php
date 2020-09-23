<?php
$word_id = $_REQUEST["word_id"];
$msg = $errMsg = "";
try{
	require_once("connectCd104g1.php");
	$sql = "update word_keyword set keyword=:keyword where word_id=:word_id";
	$robot_words = $pdo->prepare($sql);
	$robot_words->bindValue(":word_id",$word_id);
	$robot_words->bindValue(":keyword",$_REQUEST['keyword']);
	$robot_words->execute();

	$sql2 = "update robot_words set word=:word where word_id=:word_id";
	$robot_words2 = $pdo->prepare($sql2);
	$robot_words2->bindValue(":word_id",$word_id);
	$robot_words2->bindValue(":word",$_REQUEST['word']);
	$robot_words2->execute();
	header("location:robotBack.php");

} catch (PODException $e){
	$errMsg = "錯誤原因:".$e->getMesage()."<br>"."錯誤行號:".$e->getLine()."<br>";
} 
?>