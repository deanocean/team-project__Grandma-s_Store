<?php

$msg = $errMsg = "";
    try {


        $imgPath = $_FILES["image01"]["name"];
        $imgPath2 = $_FILES["image02"]["name"];
        $putInImagePath = "img/event/" . $imgPath;
        $putInImagePath2 = "img/event/" . $imgPath2;

        require_once("../php/connectCd104g1.php");
        $sql = "INSERT INTO activity_type 
        (name, description, desc_image01_path, desc_image02_path, is_on_shelves) 
        VALUES (:name, :description, :desc_image01_path, :desc_image02_path, '1')";
        $activityType = $pdo->prepare($sql);
        $activityType->bindValue(":name", $_REQUEST["name"]);
        $activityType->bindValue(":description", $_REQUEST["description"]);
        $activityType->bindValue(":desc_image01_path", $putInImagePath);
        $activityType->bindValue(":desc_image02_path", $putInImagePath2);
        $activityType->execute();
        header("location:event.php");

    } catch (PODException $e) {
        $errMsg = "錯誤原因:".$e->getMesage()."<br>"."錯誤行號:".$e->getLine()."<br>";
    }
