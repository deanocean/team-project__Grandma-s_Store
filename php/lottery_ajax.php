 <?php 
    session_start();
    $coupon_id = $_GET["coupon_id"];
    $member_id = $_SESSION["member_id"];
try{
    require_once("connectCd104g1.php");

    $sql = "select * from member_coupon where coupon_id=:coupon_id and member_id=:member_id";
    $couponExist = $pdo->prepare($sql);
    $couponExist->bindValue("coupon_id", $coupon_id);
    $couponExist->bindValue("member_id", $member_id);
    $couponExist->execute();
    $memberGot = $couponExist->fetch();

    if( $couponExist->rowCount() == 0 ){ //如果還沒有
        $quantity = 1;
        $sql2 = "insert into member_coupon values(:coupon_id, :member_id, :quantity)";
        $couponNew = $pdo->prepare($sql2);
        $couponNew->bindValue(':coupon_id', $coupon_id);
        $couponNew->bindValue(':member_id', $member_id);
        $couponNew->bindValue(':quantity', $quantity);
        $couponNew->execute();
        echo "面額{$coupon_id}元，還沒拿過此面額的獎券，insert into一筆新資料";
    }else{  //如果已經有了
        $qty = $memberGot["qty"];
        $qty += 1;
        echo $qty;
        $sql3 = "update member_coupon set qty=:qty where coupon_id=:coupon_id and member_id=:member_id";
        $couponOld = $pdo->prepare($sql3);
        $couponOld->bindValue(':qty', $qty);
        $couponOld->bindValue("coupon_id", $coupon_id);
        $couponOld->bindValue("member_id", $member_id);
        $couponOld->execute();
        echo "面額{$coupon_id}元，已拿過此面額的獎券，在數量欄位上+1";
    }
    

}catch(PDOException $e){
    echo "error";
}
?>