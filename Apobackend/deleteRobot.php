<?php
$word_id = $_REQUEST["word_id"];
$errMsg = "";

	try{

	require_once("connectCd104g1.php");
	$sql = "delete from word_keyword where word_id = :word_id";
	$robot_words = $pdo->prepare($sql);
	$robot_words->bindValue(":word_id",$word_id);
	$robot_words->execute();

	$sql2 = "delete from robot_words where word_id = :word_id";
	$robot_words2 = $pdo->prepare($sql2);
	$robot_words2->bindValue(":word_id",$word_id);
	$robot_words2->execute();
	header('location:robotBack.php');


} catch (PODException $e){
	$errMsg = "錯誤原因:".$e->getMessage()."<br>"."錯誤行號:".$e->getLine()."<br>";
}
?>