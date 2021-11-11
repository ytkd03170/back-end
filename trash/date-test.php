#code
<?php 
session_start();

$item_size = array_fill(0,5,'');
if( !empty( $_SESSION["size"] ) ){
  $i = 0;
  if( $_SESSION["size"] == 'B4' ){
    $item_size[$i++] = 'checked'; 
  }elseif($_SESSION["size"] == 'A4' ){
    $item_size[$i++] = 'checked'; 
  }elseif($_SESSION["size"] == 'A3' ){
    $item_size[$i++] = 'checked'; 
  }elseif($_SESSION["size"] == 'B5' ){
    $item_size[$i++] = 'checked'; 
  }
}
$m_i = 0;  

if(!empty($_POST["kakunin"])){
  $_SESSION["size"]=$_POST["size"];
  echo '<p>ご注文サイズ : ', $_POST['size'];
  exit;
}

$i = 0;
?>

<form action="" method="post">
  <p>ご注文サイズを選択してください</p>
  <div>
    <input type="radio" name="size" value="B5" <?=$item_size[$i++]?> >B5
    <input type="radio" name="size" value="A4" <?=$item_size[$i++]?>>A4
    <input type="radio" name="size" value="B4" <?=$item_size[$i++]?>>B4
    <input type="radio" name="size" value="A3" <?=$item_size[$i++]?>require>A3
    <p><input type="submit" value="確認へ" name="kakunin">
  </div>
</form>