<?php
require_once 'Functions/loginhandler.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
    <link rel="stylesheet" href=".css">
</head>
<body>
    <div>
        <form action="" method="post">
        <p>Логин:<input type="login" name="loginlog"></p>
        <p>Пароль:<input type="password" name="loginpass"></p>  
        <p><input type="submit" value="Авторизоваться" name="butlog"></p>
    </div>
    <?
       if($stg0 == 1){
          if($_SESSION['UserID'] !== "null" && $_SESSION['UserID'] !== false){echo('Вы авторизованы');}
             else echo('Неверный логин или пароль!');
        }
    ?>
    <a href="index.php">На главную</a>
</body>
</html>