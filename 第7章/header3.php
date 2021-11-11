<<?php  
  if (session_status() == PHP_SESSION_NONE) {
    // セッションは有効で、開始していないとき
    session_start();
  } 
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>PHP Sample Programs</title>
  <link rel="stylesheet" href="style.css">  
</head>

<body> 

<?php require 'menu.php'; ?>  <!--chap7で追加-->

<?php 
$pdo=new PDO('mysql:host=localhost;dbname=yk_shop;charset=utf8', 
'kudo_yuta', 'Asdf3333-');
 