<?php
require '../connect.php';
 
$sql = "SELECT id,name, address,email FROM customer WHERE 1 ";


if( !empty( $_GET['name'] )){ 
  $name = htmlspecialchars( $_GET['name'],ENT_QUOTES);
  $name = "%$name%";
  $sql .= " AND name LIKE ? " ;
  $customer_list=$pdo->prepare( $sql ); // SQL文を連結
	$customer_list->bindValue(1, $name, PDO::PARAM_STR);
  $customer_list->execute();
 
}elseif(!empty( $_GET['email'] )){
  echo  $_GET['email'];
  $email = htmlspecialchars( urldecode($_GET['email']),ENT_QUOTES);
  $sql .= " AND email = ? " ;
  $customer_list=$pdo->prepare( $sql ); // SQL文を連結
	$customer_list->bindValue(1, $email, PDO::PARAM_STR);
}else{
  $customer_list=$pdo->prepare( $sql ); // SQL文を連結
}

$customer_list->execute();
?>

<form>
  <p> お名前:<input type="text" name="name">  メール<input type="email" name="email" >
  <input type="submit" value="検索"></p>
</form>

<?php
 foreach ($customer_list as $key => $value) {
    echo  '<li>', "<a href='purchase-history.php?customer_id=$value[id]'>$value[id]</a>" , $value['name'] ,$value['address'] ,$value['email'];
  }