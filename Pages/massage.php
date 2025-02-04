<?php
session_start();
require_once 'massagelogic.php';

$prc1 = 5000;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Массажи</title>
    <link rel="stylesheet" href="../Styles/massagestyle.css">
</head>
<body>
    <a href="../index.php"><?echo('<');?>На главную</a>
    <div class="massage"><?#услуга?>
        <div id="img"><?#картинка?>
        </div>
        <div id="text"><?#название?>
            <p>Общий оздоровительный массаж</p>
        </div>
        <div id="price"><?#ценник?>
            <p><?
               if(isset($_SESSION['disc'])){
                  $prc1 = $prc1 - $prc1 / 100 * $_SESSION['disc'];
               }
               echo($prc1 . "Р");
            ?></p>
        </div>
        <div><?#кнопка?>
            <form action="" method="post">
            <p><input id="button" type="submit" value="Записаться" name="price"></p>
        </div>
    </div>

    <div class="<?
        if(isset($_SESSION['UserLogin'])){
            echo("discount");
        }
        else echo("vis");
        ?>"><?#скидочное окно?>
        <div class="
        <?
           if(!isset($_SESSION['disc'])){
              echo("variant1");
            }
            else echo("hidden");
            ?>"><?#первая часть?>
            <div><?#текст?>
                <p>В честь открытия всем скидка!!!</p>
            </div>
            <div><?#кнопка?>
               <form action="" method="post">
               <p><input type="submit" value="Получить" name="DST"></p>
               </form>
            </div>
        </div>
        <div class="
        <?
           if(isset($_SESSION['disc'])){
              echo("variant2");
           }
           else echo("hidden");
            ?>"><?#вторая часть?>
            <div><?#текст?>
                <p>Ваша скидка составляет <?
                   if(isset($_SESSION['disc'])){
                      echo($_SESSION['disc']);
                   }
                ?> %!!!</p>
            </div>
            <div><?#таймер?>
                <script src="<?
                   if(isset($_SESSION['disc'])){
                      echo("//megatimer.ru/get/8791a8b32bc81e18b84092312380e304.js");
                   }
                   ?>"></script>
            </div>
        </div>
    </div>
</body>
</html>