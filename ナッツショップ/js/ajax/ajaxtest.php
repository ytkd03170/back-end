<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
'ginzo', 'Wert3333-');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//PDOオブジェクト自体に指定。レスポンスは常に連想配列形式で取得するようになる
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = "select count(*) as row from customer where login = '$_POST[login]'";
$stmt = $pdo->query($sql);

$value = $stmt->fetch(); //fetch(PDO::FETCH_ASSOC)
echo $value['row'];