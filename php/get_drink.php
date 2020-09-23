<?php

try{

	require_once("connectCd104g1.php");
    
    $sql="select P.score,P.product_id,P.name,P.category, P.description, P.price, PI.image_path from product P join product_image PI on P.product_id=PI.product_id where P.category=4 and P.is_on_shelves=0";


	$product = $pdo->query($sql);
	// $productValue=$product->fetchAll();

	if($product->rowCount()==0){ 
		echo "{}";
	}else{ 

		$result="";
		$productValue=$product->fetchAll();
		// echo $productValue;
		$rowcount=0;
		foreach ($productValue as $row) {
			$rowcount+=1;
		
			$result=$result.json_encode($row);
			if($rowcount<$product->rowCount()){
				$result=$result."split";
			}	
		}
		echo $result;
	}	

}catch(PDOException $e){
  echo $e->getMessage();
}
?>