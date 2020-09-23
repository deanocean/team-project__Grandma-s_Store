<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/backLogin.css">
</head>
<body id="backLoginBody">

<div id="backLogin">
    <form action="backLoginCheck.php" method="post" name="backLoginForm" id="backLoginForm">
        <h1>後端管理員登入</h1>
        <div class="container">
            <label for="account">帳號</label>
            <input type="text" name="account" placeholder="Account" required>
            <label for="password">密碼</label>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">登入</button>
        </div>
    </form>
</div>


<!-- <script src="js/backLogin.js"></script> -->
</body>
</html>