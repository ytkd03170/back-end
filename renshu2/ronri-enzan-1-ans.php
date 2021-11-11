<pre style="font: normal 1.1em/125% Consolas">

複数の条件がある場合の条件式 &&(AND) ||(OR)
AND → 論理積
OR → 	論理和

1.まだ食べておらず,所持金が500円以上なら"買える",どちらか１方でも満たせなければ"買えない"
と画面表示しなさい｡

食べてない : 1 食べた : 0
所持金ある : 1 所持金ない : 0

<?php 
  $tabeta = true; //食べてないの意味だとする
  $shojikin = 500;

  if( $tabeta && $shojikin >= 500){
    echo '"買える"';
  }else{
    echo '"買えない"';
  }


?>



2.所持金が400円以上あるか,商品券があれば買える,どちらか１方でも満たせれば"買える"
	所持金ある : 1 所持金ない : 0
	商品券ある : 1 商品券ない : 0

<?php 
  $shojikin = 500;
  $shohinken = false;

  if($shohinken || $shojikin >= 500){
    echo '"買える"';
  }else{
    echo '"買えない"';
  }
