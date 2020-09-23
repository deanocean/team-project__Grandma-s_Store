<?php
$store_id = $_REQUEST['store_id'];
$msg = $errMsg = "";
try{
	require_once("connectCd104g1.php");
	$sql = "update store set name=:name,description=:description,address=:address,phone=:phone,business_hours=:business_hours where store_id=:store_id";
	$store = $pdo->prepare($sql);
	$store->bindValue(":store_id",$_REQUEST["store_id"]);
	$store->bindValue(":name",$_REQUEST["name"]);
	$store->bindValue(":description",$_REQUEST["description"]);
	$store->bindValue(":address",$_REQUEST["address"]);
	$store->bindValue(":phone",$_REQUEST["phone"]);
	$store->bindValue(":business_hours",$_REQUEST["business_hours"]);
	$store->execute();
	$msg = "修改成功";
} catch (PODException $e){
	$errMsg = "錯誤原因:".$e->getMesage()."<br>"."錯誤行號:".$e->getLine()."<br>";
} header("location:storeBack.php")
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
</head>
<body>
	<?php
	echo $msg;
	echo $errMsg;
	?>
   
</body>
</html>