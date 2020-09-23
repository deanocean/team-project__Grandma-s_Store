<?php 
session_start();
echo $_GET["product_id"];
require_once("connectCd104g1.php");
$sql2="SELECT * FROM favorite_goods Where member_id=:member_id and product_id=:product_id";
$pdoStatement2 = $pdo->prepare($sql2);
$pdoStatement2->bindValue(":member_id", $_SESSION["member_id"]);
$pdoStatement2->bindValue(":product_id", $_GET["product_id"]);
$pdoStatement2->execute();
if( $pdoStatement2->rowCount()==0)
{
    $sql2="INSERT INTO favorite_goods(member_id, product_id) VALUES(:member_id, :product_id)";
    $pdoStatement2 = $pdo->prepare($sql2);
    $pdoStatement2->bindValue(":member_id", $_SESSION["member_id"]);
    $pdoStatement2->bindValue(":product_id", $_GET["product_id"]);
    $pdoStatement2->execute();
    echo "1";
}else{
    echo "2";
};




?>