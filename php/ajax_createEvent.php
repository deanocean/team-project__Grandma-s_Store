
<?php
try {
    require_once("connectCd104g1.php");
    // require_once("../eventInfo.php");

    $sql = "select * from activity_type where activity_type_id=:boxType";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(":boxType",$_POST["boxType"]);

    $stmt->execute();

    $rows = $stmt->fetchObject();
    
    $imgPath1 = json_encode($rows->desc_image01_path);
    $imgPath2 = json_encode($rows->desc_image02_path);

    $path = $imgPath1."|".$imgPath2;

    echo $path;

} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>
