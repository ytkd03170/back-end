<?php
/* ファイルポインタをオープン */
$file = fopen("list.txt", "r"); 
$file2 = $file; 
 
/* ファイルを1行ずつ出力 */
	/*
		while ( $line = fgets($file) ) {
		下の2行分を1行でやってる
		ただし 	fgets関数は取り出したあとに行送りを自動で行う
			ファイルポインタを一つ進める
		 条件式()内では 代入した結果を判定している
	*/ 
  while ( fgets($file) == true ) {
    $line = fgets($file2); // 値が取り出せなくなるとfalseを返す関数
    echo $line;
  }
/* ファイルポインタをクローズ */
fclose($file);
?>
  if( $A = $a) 文法的には正しいのでエラーは出ない
  	ロジックは間違ってるので期待通りにはならない