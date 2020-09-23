<?php 
session_start();

require_once("connectCd104g1.php");
$sql2="UPDATE product SET score= :score WHERE product_id=:product_id";
$pdoStatement2 = $pdo->prepare($sql2);
$pdoStatement2->bindValue(":product_id", $_GET["product_id"]);
$pdoStatement2->bindValue(":score",  $_GET["score"]);
$pdoStatement2->execute();


?>
