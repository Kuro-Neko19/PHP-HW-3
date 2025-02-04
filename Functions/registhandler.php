<?php

//откритие файла с базой данных
$lines = file(realpath("Functions/UsersDataBase/users.txt"));

//Объявление переменных
$INsurn = 'null';
$INname = 'null';
$INpatr = 'null';
$INlog = 'null';
$INfirstpass = 'null';
$INsecondpass = 'null';

$Handleredlogin = 'null';
$Handleredpassword = 'null';

//Переменные этапов
$stg0 = 0; //всё поля заполнены
$stg1 = 0; //пароли совпадают
$stg2 = 0; //длина пароля от 8 до 20 символов
$stg3 = 0; //длина логина 5 и более символов

//Переменные для ошибок
$err0 = 0; //не все поля заполнены
$err1 = 0; //пароли не совпадают
$err2 = 0; //длина пароля не от 8 до 20 символов
$err3 = 0; //длина логина менее 5 символов

$sucsess = 0;

//Получение данных из формы регистрации
if(isset($_POST['buttregist'])){
    $INsurn = $_POST['inputsurn'];
    $INname = $_POST['inputname'];
    $INpatr = $_POST['inputpatr'];
    $INlog = $_POST['inputlogin'];
    $INfirstpass = $_POST['firstpass'];
    $INsecondpass = $_POST['secondpass'];
}

//проверка наличия содержимого формы
if($INsurn !== 'null' && $INname !== 'null' && $INpatr !== 'null' && $INlog !== 'null' && $INfirstpass !== 'null' && $INsecondpass !== 'null'){
   $stg0 = 1;
}
   else($err = 1);

//обоаботка пароля
//сравнение двух паролей
if($stg0 == 1 && $INfirstpass == $INsecondpass){
   $stg1 = 1;
}
   else($err1 = 1);

//определение количеста символов в пароле
if($stg1 == 1){
   $len = strlen($INfirstpass);
   if($len >= 8 || $len <= 20){
      $stg2 = 1;
   }
   else($err2 = 1);
}

//присвоение пароля переменной для записи
if($stg2 == 1){
   $Handleredpassword = sha1($INfirstpass);
}

//обработка логина
//определение количества символов в логине
if($stg0 == 1){
   $len1 = strlen($INlog);
   if($len1 >= 5){
      $stg3 = 1;
   }
   else($err3 = 1);
}

//присвоение логина переменной для записи
if($stg3 == 1){
   $Handleredlogin = $INlog;
}

//запись в файл
if($stg3 == 1 && $stg0 == 1){
   $fileContent = file_get_contents(realpath("Functions/UsersDataBase/users.txt"));
   file_put_contents(realpath("Functions/users.txt"), $fileContent . $Handleredlogin . ' ' . $Handleredpassword . PHP_EOL, LOCK_EX);
   $fileContent = file_get_contents(realpath("Functions/UsersDataBase/users1.txt"));
   file_put_contents(realpath("Functions/users1.txt"), $fileContent . $INsurn . ' ' . $INname . ' ' . $INpatr . PHP_EOL, LOCK_EX);
   $sucsess = 1;
}
?>