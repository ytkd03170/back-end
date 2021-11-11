<pre style="font: normal 1.1em/125% Consolas">

https://ultimai.org/mdlsrc/pazl/waterSrider.html
ここを開いて､フローチャートを完成させつつ
単一のif文で評価式を作って正しく分岐させてください｡


<?php
	$h=120;  //身長
	$a = 11; //age
	$p = false;  //parents
	
	if( $p || $h >= 120 || $a >= 11){
		echo "乗れる \n";
		
	}else{
		echo "乗れない \n";
		
	}
?>
	
	
	チャレンジャーなら難易度が高いこっち
		https://ultimai.org/mdlsrc/pazl/waterSrider2.html

<?php 
	$w = 23; //(kg)
	$s = 'あり';
	
	if( $w < 100 && $s == 'なし' && ($p || $h >= 120 || $a >= 11) )
		echo "乗れる \n";
	else
		echo "乗れない \n";