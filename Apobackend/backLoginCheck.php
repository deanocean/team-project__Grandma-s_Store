<?php
session_start();

$msg = "";
$managerAcc = $_POST["account"];
$mangerPsw = $_POST["password"];

try{
	require_once("connectCd104g1.php");
    $sql = "select * from manager where account=:account and password=:password";
    $manager = $pdo->prepare($sql);
    $manager->bindValue(":account", $managerAcc);
    $manager->bindValue(":password", $mangerPsw);
    $manager->execute();

    if($manager->rowCount() == 0){
        $msg = "nobody";
    }else{
        $managerRow = $manager->fetch();
        if($managerRow["state"]==0){
            $msg = "disable";
        }else { 
            $_SESSION["manager_id"] = $managerRow["manager_id"];
            $_SESSION["manager_account"] = $managerRow["account"];
            $_SESSION["manager_password"] = $managerRow["password"];
            $_SESSION["manager_role"] = $managerRow["role"];
            $_SESSION["manager_nickname"] = $managerRow["nickname"];
            $_SESSION["manager_state"] = $managerRow["state"];
            $msg = "success";
        }  
    }

}catch(PDOException $e){
    $msg = "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<input type="hidden" id="loginResult" value="<?php echo $msg; ?>">

<script>
    var loginResult = document.getElementById("loginResult");
    if(loginResult.value == "error"){
        alert("系統錯誤");
        location.href = "backLogin.php";
    }else if(loginResult.value == "nobody"){
        alert("帳號密碼錯誤");
        location.href = "backLogin.php";
    }else if(loginResult.value == "disable"){
        alert("此帳號已停用");
        location.href = "backLogin.php";
    }else if(loginResult.value == "success"){
        alert("登入成功");
        location.href = "index.php";
    }
</script>

</body>
</html>