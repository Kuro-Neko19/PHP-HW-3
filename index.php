<?php
session_start();

require_once 'Functions/loginhandler.php';

$lines1 = file(realpath("Functions/UsersDataBase/users1.txt"));
$lines2 = file(realpath("Functions/UsersDataBase/users.txt"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>REaLAX</title>
    <link rel="stylesheet" href="Styles/mainpagestyle.css">
</head>
<body>
   <div class="mainpanel"><?//Горизонтальная панель для меню?>
      <details class="detail">
         <summary>Услуги</summary>
         <a href="Pages/massage.php">Массаж</a>
      </details>
      <details class="detail">
         <summary>Полезности</summary>
      </details>
      <button>О нас</button>
   </div>
      <div class="<?
         if(!isset($_SESSION['UserLogin'])){
            echo ('logreg');
         }
         else echo ('hidden');
         ?>">

         <button onclick="location='login.php'">Войти</button>
         <button onclick="location='regist.php'">Регистрация</button>
      </div>
      <div class="<?
         if(isset($_SESSION['UserLogin'])){
            echo ('profile');
         }
         else echo ('hidden');
         ?>">

         <details class="prof">
           <summary>Профиль</summary>
           <div class="content">
           <p>Пользователь:</p>
           <p><?php 
           if(isset($_SESSION['UserID'])){
           echo($lines1[$_SESSION['UserID']]);
           }?></p>
           <p><?php 
           if(isset($_SESSION['UserID'])){
            $loglog = $lines2[$_SESSION['UserID']];
            $log = explode(' ', $loglog);
            echo($log[0]);
           }?></p>
           <a href="logout.php">Выйти</a>
           </div>
           </details>
      </div>
   <div class="main"><?//Основная лента?>
      <p>Мы предоставляем:</p>
      <div class="mainp">
      <div class="cell1"><?//1?>
         <div class="cell11">
            <p>ФИНСКАЯ САУНА</p>
            <div class="cell111">
               <p>ПОДРОБНЕЕ</p>
            </div>
         </div>
      </div>
      <div class="cell2"><?//2?>
         <div class="cell21">
            <p>ИНФРАКРАСНАЯ КАБИНА</p>
            <div class="cell211">
               <p>ПОДРОБНЕЕ</p>
            </div>
         </div>
      </div>
      <div class="cell3"><?//3?>
         <div class="cell31">
            <p>ДЖАКУЗИ</p>
            <div class="cell311">
               <p>ПОДРОБНЕЕ</p>
            </div>
         </div>
      </div>
     </div>
      <div class="cell4"><?//ещё?>
         <a href="">БОЛЬШЕ</a>
      </div>
      <p>Наши услуги:</p>
      <div class="mainp">
      <div class="cell5"><?//1?>
         <div class="cell51">
            <p>SPA-МАССАЖ</p>
            <div class="cell511">
               <p>ПОДРОБНЕЕ</p>
            </div>
         </div>
      </div>
      <div class="cell6"><?//2?>
         <div class="cell61">
            <p>УХОДЫ ПО ТЕЛУ</p>
            <div class="cell611">
               <p>ПОДРОБНЕЕ</p>
            </div>
         </div>
      </div>
      <div class="cell7"><?//3?>
         <div class="cell71">
            <p>SLEEP TERAPY</p>
            <div class="cell711">
               <p>ПОДРОБНЕЕ</p>
            </div>
         </div>
      </div>
     </div>
      <div class="cell8"><?//ещё?>
         <div>
            <a href="">[БОЛЬШЕ]</a>
         </div>
      </div>
   </div>
</body>
</html>