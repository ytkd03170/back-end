<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=yk_shop;charset=utf8', 
'kudo_yuta', 'Asdf3333-');
$sql=$pdo->prepare('delete from product where id=?');
if ($sql->execute([$_REQUEST['id']])) {
	echo '削除に成功しました。';
} else {
	echo '削除に失敗しました。';
}
?>
<?php require '../footer.php'; ?>
