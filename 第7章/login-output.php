<?php 
  require 'header3.php'; 


if (empty($_REQUEST)) {
  exit ("直接開かないでください");
}

unset($_SESSION['customer']);

$login = htmlspecialchars($_REQUEST['login'] , ENT_QUOTES);
$sql = '
SELECT * 
FROM customer 
WHERE login = ? 
';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1,$login,PDO::PARAM_STR);
$stmt->execute();

foreach ($stmt as $row) {
  $_SESSION['customer']=[
    'id'=>$row['id'], 
    'name'=>$row['name'],
    'address'=>$row['address'], 
    'login'=>$row['login'],
    'email'=>$row['email']
  ];
}
if (password_verify($_POST['password'], $row['password'] )){ 
  //リダイレクトする
    header('Location: ssh://kudo_yuta/home/kudo_yuta/DocumentRoot/php/chapter7/product.php');
} else {
  echo 'ログイン名またはパスワードが違います。';
}
?> 
<?php require '../footer.php'; ?>

