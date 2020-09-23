<?php
$activity_type_id = $_REQUEST['activity_type_id'];
$msg = $errMsg = "";
    try {
        require_once("connectCd104g1.php");
        $sql = "update activity_type 
		set is_on_shelves=:is_on_shelves where activity_type_id=:activity_type_id";
        $store = $pdo->prepare($sql);
        $store->bindValue(":activity_type_id", $_REQUEST["activity_type_id"]);
        $store->bindValue(":is_on_shelves", $_REQUEST["is_on_shelves"]);
        $store->execute();
        $msg = "修改成功";

        header("location:event.php");


} catch (PODException $e){
	$errMsg = "錯誤原因:".$e->getMesage()."<br>"."錯誤行號:".$e->getLine()."<br>";
}

?>
