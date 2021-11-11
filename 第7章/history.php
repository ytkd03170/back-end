<?php
	session_start(); 
	// set_cookie();
	// header(); これらも文字を吐き出す前に開始

require 'header3.php'; 

if (isset($_SESSION['customer'])) {
	$sql_purchase=$pdo->prepare(
		'select * from purchase where customer_id=? order by id desc');
	$sql_purchase->execute([$_SESSION['customer']['id']]);
	
	foreach ($sql_purchase as $row_purchase) {
		$sql_detail=$pdo->prepare(
			'select * from purchase_detail,product where purchase_id=? and product_id=id');
		$sql_detail->execute([$row_purchase['id']]);
			
		//foreach前にすると履歴なくても表示されるがforeachの中じゃないと繰り返されない。
		echo '<table><tr><th>商品番号</th><th>商品名</th>', 
				'<th>価格</th><th>個数</th><th>小計</th></tr>';
		$total=0;
		
	foreach ($sql_detail as $row_detail) {
			$subtotal=$row_detail['price']*$row_detail['count'];
			$total+=$subtotal;
?>		
	<tr>
		<td> <?=$row_detail['id']?></td>
		<td><a href="detail.php?id=<?=$row_detail['id']?>"> 
			<?=$row_detail['name']?></a>
		</td>
		<td> <?=$row_detail['price']?></td>
		<td> <?=$row_detail['count']?></td>
		<td> <?=$subtotal?></td>
	</tr>
<?php		} ?>
		<tr><td colspan="4">合計</td>
				<td> <?=$total?></td>
		</tr>
	</table>
	<hr>
<?php	
}

} else {
	echo '購入履歴を表示するには、ログインしてください。';
}
?>
<?php require '../footer.php'; ?>