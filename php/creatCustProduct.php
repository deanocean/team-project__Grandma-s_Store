<?php
session_start();
try{
	require_once("connectCd104g1.php");

	$sql =" INSERT INTO product(product_id, name, category, description, price, is_on_shelves, score) VALUES (null,:name,5,'好吃又好玩',:price,0,0) ";

	
	$cust = $pdo->prepare($sql); 
	$cust->bindValue(":name", $_REQUEST["name"]);
	$cust->bindValue(":price", $_REQUEST["price"]);
	$cust->execute();

	// echo "新增一筆客製化產品成功";

	$sql2 ="SELECT MAX(product_id) as maxid from product";
	$cust2 = $pdo->prepare($sql2); 
	$cust2->execute();
	$maxproductid="";
	while ($row = $cust2->fetchObject()) {
		$maxproductid = $row->maxid;	
	}
	

	$sql3 ="INSERT INTO customized_product(product_id, member_id, bag_id, image_path, name, description, bag_color, text, text_color, pattern_path, product_id_01, product_id_02, product_id_03, product_id_04, total_price, is_on_shelves, score) VALUES (:product_id,:member_id,:bag_id,:image_path,:name,'我是介紹',null,null,null,null,null,null,null,null,:price,0,0)";
		$cust3 = $pdo->prepare($sql3); 
		$cust3->bindValue(":product_id", $maxproductid);
		$cust3->bindValue(":member_id", $_SESSION["member_id"]);
		$cust3->bindValue(":bag_id", $_REQUEST["bag_id"]);
		$cust3->bindValue(":image_path", $_REQUEST["image_path"]);
		$cust3->bindValue(":name", $_REQUEST["name"]);
		$cust3->bindValue(":price", $_REQUEST["price"]);
		$cust3->execute();
	// $_SESSION["member_id"]

	// echo '新增一筆客製化訂單成功';
	
	$sql4 ="INSERT INTO product_image(image_id, product_id, name, image_path) VALUES (:image_id,:product_id,:name,:image_path)";
		$cust4 = $pdo->prepare($sql4); 
		$cust4->bindValue(":image_id", $maxproductid);
		$cust4->bindValue(":product_id", $maxproductid);
		$cust4->bindValue(":name", $_REQUEST["name"]);
		$cust4->bindValue(":image_path", $_REQUEST["image_path"]);
		$cust4->execute();


	echo $maxproductid;

}catch(PDOException $e){
  echo $e->getMessage();
}




?>