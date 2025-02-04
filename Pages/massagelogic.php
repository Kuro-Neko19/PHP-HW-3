<?php
session_start();

$disc = 0;

if(isset($_POST['DST'])){
    $disc = rand(5, 50);
    $_SESSION['disc'] = $disc;
 }
 ?>