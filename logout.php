<?php
session_start();

require_once 'Functions/logouthandler.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Выход</title>
    <link rel="" href=".css">
</head>
<body>
    <div>
        <form action="" method="post">
        <p>Выйти?</p>
        <p><input type="submit" value="Да" name="logout"></p>
        </form>
    </div>
</body>
</html>