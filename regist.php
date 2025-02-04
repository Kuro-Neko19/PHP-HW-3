<?php
require_once 'Functions/registhandler.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <link rel="" href=".css">
</head>
<body>
    <div>
        <form action="" method="post">
        <p>Введите Фамилию:<input type="text" name="inputsurn"></p>
        <p>Введите Имя:<input type="text" name="inputname"></p>
        <p>Введите Отчество:<input type="text" name="inputpatr"></p>
        <p>Придумайти логин:<input type="login" name="inputlogin"></p>
        <p>Придумайте пароль:<input type="password" name="firstpass"></p>
        <p>Повторите пароль:<input type="password" name="secondpass"></p>
        <p><input type="submit" value="Зарегистрироваться" name="buttregist"></p>
        </form>
        <?php 
           if($sucsess == 1){echo("Регистрация просшла успешно!!!");}
        ?>
    </div>
</body>
</html>