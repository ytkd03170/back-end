<pre>
年齢が入力されていることをチェックしてから判定してください
0~2は 乳児園 
3以上は保育園と出す
不足したコードを追加してください｡

<?php
	$_POST['age'] = 0 ; // ← 入力されたのと同じ

	if( isset($_POST['age'] ))
		if(	$_POST['age'] < 3){
			echo "乳児園 \n";

		}else{
			echo "保育園 \n";

		}


		var_dump( isset($_POST['age']) );
		var_dump( !empty($_POST['age']) ) ;
?>

 isset と !emptyはどちらも値が入ってるかのチェックに使うが
 0 と '' (空文字)の判定に違いがある

 <?php
 $a='';

 var_dump( isset($a) );
 var_dump( !empty($a) ) ;