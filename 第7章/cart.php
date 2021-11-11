<?php
if (!empty($_SESSION['product'])) {
  ?>
<table>
  <th>商品番号</th><th>商品名</th>
  <th>価格</th><th>個数</th><th>小計</th>
<?php
    $total=0;
    foreach ($_SESSION['product'] as $id=>$product) {
?>
  <tr>
    <td> <?=$id?> </td>
    <td><a href="detail.php?id=<?=$id?>"><?=$product['name']?></a></td>
    <td> <?=$product['price']?> </td>
    <td><input type="number" min="0" name="count"></td>
<?php
// var_dump($product['price'],$product['count']);
//<?=number_format($product['count'])←個数
    $subtotal=$product['price']*$product['count'];
		$total+=($subtotal*1.08);
    
?>
    <td> <?=number_format($subtotal)?> </td>
    <td><a href="cart-delete.php?id=<?=$id?>" onclick="return confirm('削除しますか？')"> 削除 </a></td>
		<td><a href="">更新</a></td>
  </tr>
<?php
    } 
?>
  <tr>
    <td>消費税</td><td>軽減税率(8％)</td>
    <td><?=number_format($total*0.08)?></td><td>合計</td><td><?=number_format($total)?></td>
    <td></td>
  </tr>
</table>
<?php
} else {
  echo 'カートに商品がありません。';
}
?>