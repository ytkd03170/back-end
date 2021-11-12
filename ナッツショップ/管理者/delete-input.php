<?php session_start();
	require '../connect.php'; 

	if(isset(	$_SESSION['respons'] )){
// ここにBootstrapのalertを出す
		echo $_SESSION['respons'];
		$_SESSION['respons'] = null;
	}
?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>
<?php

foreach ($pdo->query('select * from product') as $row) {
	if($row['onsale'] === 1) {
		$text = '販売中';
	}else{
		$text = '<span style="color:red">販売停止</span>';
	}	
	
	echo "<tr>
		<td> $row[id], </td>
		<td> $row[name] </td>
		<td> $row[price] </td>
		<td> <a href='delete-output.php?id=$row[id]'>$text</a>
		</td>
	 </tr>
	 \n";
}
?>
</table>
