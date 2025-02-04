<?php
session_start();
//откритие файла с базой данных
$lines = file(realpath("Functions/UsersDataBase/users.txt"));

//Объявление переменных
$loginloghandler = "null";
$loginpasshandler = "null";

$DBkey = "null";

//Переменные этапов
$stg0 = 0; //всё поля заполнены
$stg1 = 0; //логин и пароль найдены
$stg2 = 0; //

//Переменные для ошибок
$err0 = 0; //не все поля заполнены
$err1 = 0; //логин или пароль неверные
$err2 = 0; //

//Получение данных из формы регистрации
if(isset($_POST['butlog'])){
   $loginloghandler = $_POST['loginlog'];
   $loginpasshandler = $_POST['loginpass'];
}

//проверка наличия содержимого формы
if($loginloghandler !== 'null' && $loginpasshandler !== 'null'){
    $stg0 = 1;
 }
    else($err = 1);

//формирование строки для проверки
if($stg0 == 1){
    $user = $loginloghandler . ' ' . sha1($loginpasshandler);
}

//проверка наличия логина и пароля в базе
if($stg0 == 1){
    $DBkey = array_search($user, $lines, $strict = true);
}

//присвоение переменной сессии значение ячейки БД
if($DBkey !== false && $DBkey !== "null"){
    $_SESSION['UserID'] = $DBkey;
    $_SESSION['UserLogin'] = true;
    header("Location: index.php");
    $stg1 = 1;
}
else($err1 = 1);


?>