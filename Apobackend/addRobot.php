<?php

$msg = $errMsg = "";
	try{
		require_once("connectCd104g1.php");
		$sql = "insert into robot_words (word) values (:word)";
		$robot_words = $pdo->prepare($sql);
		$robot_words->bindValue(":word",$_REQUEST["word"]);
		$robot_words->execute();

		$sql2 = "SELECT max(word_id) as max_id from robot_words";
		$robot_words2 = $pdo->query($sql2);
		$prodRow = $robot_words2->fetchObject();
		$max_id = $prodRow->max_id;

		$sql3 = "insert into word_keyword (keyword,word_id) values (:keyword,:word_id)";
		$robot_words3 = $pdo->prepare($sql3);
		$robot_words3->bindValue(":keyword",$_REQUEST["keyword"]);
		$robot_words3->bindValue(":word_id",$max_id);
		$robot_words3->execute();
		header("location:robotBack.php");
	} catch (PODException $e){
		$errMsg = "錯誤原因:".$e->getMesage()."<br>"."錯誤行號:".$e->getLine()."<br>";
	}
?>