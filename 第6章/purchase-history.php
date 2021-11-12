<?php
require '../connect.php';
 

$shipping = isset( $_GET['shipp'] ) ? $_GET['shipp'] : 0 ;
$max = 5; // 1ページに表示する件数
$pages = isset( $_GET['pages'] ) ? ($_GET['pages']-1) * $max : 0 ;
$n = ''; 

if( !empty($_POST['id']) && !empty($_POST['shipping']) ){
  foreach ($_POST as $key => $value) 
    $post[$key] = htmlspecialchars($value,ENT_QUOTES);

    $sql = "UPDATE purchase SET shipping = ? WHERE id = ? ";
    $sth = $pdo->prepare($sql);
		$sth->bindValue(1, $post['shipping'], PDO::PARAM_INT);
		$sth->bindValue(2,  $post['id'], PDO::PARAM_INT);
		$success = $sth->execute();

    if($success){
      echo '変更しました';
    }else{
      echo '失敗';
    }
   
}

//ページャーのためのカウント
$sql= "SELECT COUNT(*)";

$sql_a = " FROM purchase as p
LEFT JOIN customer as c ON p.customer_id = c.id
WHERE shipping = ?";

  $counter=$pdo->prepare( $sql .$sql_a );
  $counter->execute([$shipping]);
  $count = $counter->fetchColumn();


$sql = "SELECT p.id,customer_id,name, email, shipping, created ";

  if( !empty( $_GET['customer_id'] ) ){
    $sql_a .= " AND p.customer_id = ? ";
    $args = [$shipping ,$_GET['customer_id'], $pages ,$max];
    
  }else{
    $args = [$shipping , $pages ,$max];
  }

  $sql_b = " ORDER BY p.id DESC LIMIT ? , ? " ;
  $purchase=$pdo->prepare( $sql .$sql_a .$sql_b ); // SQL文を連結
  $purchase->execute($args);

// var_dump(!empty( $_GET['customer_id'] ), $sql .$sql_a .$sql_b ,$args);
  $chk = array_fill(0,2,'');  //$chk[0]='' を2回行う
    $chk[$shipping] = ' checked'; 
?>

<!--<?php var_dump( $sql .$sql_a .$sql_b,$shipping , $pages ,$max) ?>-->
<p>
  <form id="fm1">
    <label><input class="pr" type="radio" name="shipp" value="0" <?=$chk[0]?>>未出荷</label>
    <label><input class="pr" type="radio" name="shipp" value="1" <?=$chk[1]?>>出荷済み</label>
  </form>
</p>
<table border="1"><tr><th>注文番号</th><th>個人情報</th><th>注文詳細</th><th>出荷</th><th>注文日</th></tr>

<?php


foreach ($purchase as $row) { 
 
  $tbl = "<tr> 
    <td> $row[id] </td>
    <td> $row[customer_id] $row[name] <br>$row[email] </td>
    ";
    $sql = "SELECT * FROM purchase_detail
    LEFT JOIN product ON product_id = id
    WHERE purchase_id = ?";

    $detail=$pdo->prepare( $sql );
    $detail->execute([$row['id']]);

  // var_dump([$row['id']],$detail->fetchAll());exit;

    $tbl .= "<td>";
      foreach ($detail as $row_detail) {
        //詳細を回す
        $tbl .= " $row_detail[name] × $row_detail[count] <br>";
      } 
    $tbl .= "</td>";

        $chk = array_fill(0,2,'');  //$chk[0]='' を2回行う
        $chk[$row['shipping']] = ' checked'; 
        // $n = isset($_GET['shipp']) ? (int)$_GET['shipp'] ^ 1 : 1 ;
        $n = isset($_GET['shipp']) ? $_GET['shipp']  : 0 ;
        $getp = isset($_GET['pages']) ? $_GET['pages'] : 1 ;

        $tbl .= "
          <td>
            <form method='post' action='?shipp=$n&pages=$getp'>
              <label><input type='radio' name='shipping' value='0' $chk[0]>未出荷 </label>
              <br><label><input type='radio' name='shipping' value='1' $chk[1]>出荷済み</label>
              <input type='hidden' name='id' value='$row[id]'>
              <input type='hidden' name='email' value='$row[email]'>
              <br> <input type='submit' value='変更'>
            </form>
          </td>
          <td>$row[created]</td>
       </tr> ";
  echo $tbl;
}
?>

</table>

<style>.nav{list-style:none;display:flex; padding:0}
.nav li{ border: solid 1px; margin: 3px;}
.nav li a{ text-decoration: none;display:block;padding: 0 7px;}
</style>
<ul class="nav">
<?php
  $p = ceil($count / $max);
  for( $i=1 ; $i <= $p ; $i++){
    echo "<li><a href='?pages=$i'> $i </a></li>";
  } 
?>

</ul>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $('.pr').change(function(){
    $('#fm1').submit();
  });
</script>