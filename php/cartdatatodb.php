<?php
session_start();
$errMsg='';
$memId = $_POST['memId'];
$totalprice = $_POST['totalprice'];
$payment = $_POST['payment'];

$itemsid = $_POST['itemsid'];
$itemsprice = $_POST['itemsprice'];
$itemsqty = $_POST['itemsqty'];
$itemsidarr = explode(",", $itemsid);       //商品編號
$itemspricearr = explode(",", $itemsprice); //商品單價
$itemsqtyarr = explode(",", $itemsqty);     //商品數量

try{
    require_once("connectCd104g1.php");
    $sql = "insert into product_order (member_id ,amount , payment_method,payment_state ,order_state ) values ('$memId','$totalprice','$payment','1','0');";
    echo $sql ;
    $orderdata = $pdo->prepare($sql);
    $orderdata->execute();
    $orderNo = $pdo->lastInsertId();

    for($i=0;$i<count($itemsqtyarr);$i++){
        $order_detail = "insert into product_order_detail (order_id,product_id,price,qty) values ('$orderNo','$itemsidarr[$i]','$itemspricearr[$i]','$itemsqtyarr[$i]');";
        echo $order_detail;   
        $orderdetail = $pdo->exec($order_detail);
    }
    echo "插入成功";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    
    $pdo = null;
// } catch (PDOException $e){
// 	$errMsg="錯誤原因 : ".$e->getMessage()."<br>"."錯誤行號 : ".$e->getLine."<br>";
// }
?>
