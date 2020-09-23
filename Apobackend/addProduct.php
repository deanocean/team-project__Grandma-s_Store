<?php

$msg = $errMsg = "";
	try{
        require_once("connectCd104g1.php");
        $pdo->beginTransaction();
        //新增商品
		$sql = "INSERT INTO `product` (`product_id`, `name`, `category`, `description`, `price`, `is_on_shelves`, `score`) VALUES (NULL, :pro_name, :category, :pro_description, :price, '0',:score)";
		$product = $pdo->prepare($sql);
		$product->bindValue(":pro_name",$_REQUEST["pro_name"]);
		$product->bindValue(":category",$_REQUEST["category"]);
		$product->bindValue(":pro_description",$_REQUEST["pro_description"]);
		$product->bindValue(":price",$_REQUEST["price"]);
		$product->bindValue(":score",$_REQUEST["score"]);
		$product->execute();
        
        $productId = $pdo->lastInsertId();
        $category =$_REQUEST["category"];

        switch($category)
        {
            case '1':
            $transCategory='candy'; 
            break;

            case '2':
            $transCategory ='toy';
            break;

            case '3':
            $transCategory = 'cookie';
            break;

            case '4':
            $transCategory = 'drink';
            break;

        }

        $imgPath = $_FILES["image_path"]["name"];
        $putInImagePath = "img/" . $transCategory . "/" . $imgPath;
        //新增商品的圖片路徑
		$sql3 = "INSERT INTO product_image (image_id, product_id, name, image_path) VALUES ( NULL, $productId , :pro_name , :image_path )";
        $product3 = $pdo->prepare($sql3);
        $product3->bindValue(":pro_name", $_REQUEST["pro_name"]);
        $product3->bindValue(":image_path", $putInImagePath);
        $product3->execute();
        
        $pdo->commit();
        header("location:index.php");
        

	} catch (PODException $e){
		$errMsg = "錯誤原因:".$e->getMesage()."<br>"."錯誤行號:".$e->getLine()."<br>";
	}
?>