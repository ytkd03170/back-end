<?php
$class_total = []; //配列として初期化

function sum($name , $scores){
  global $class_total; // グローバル変数を使う場合

  $class_total+=[ $name=>array_sum($scores) ];
}

sum('佐藤',[90,88,77]);
sum('伊藤',[66,54,44]);
sum('後藤',[55,53,88]);
 
arsort($class_total); // 値で降順ソート
print_r($class_total);
//→ [佐藤] => 255 [後藤] => 196 [伊藤] => 164 
