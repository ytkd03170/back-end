<?php
/*
  ユーザー定義関数 (組み込みではない)
  同じ処理を複数回行う場合,その処理をまとめる目的
  例) 月の選択を3箇所に出したい場合
  function 名前(){} ← 必須
  呼ばないと動かない
*/ 
  
  function month($date){
    echo "<select name='$date'>";
    for ($i=1; $i < 13 ; $i++) { 
      echo "<option> $i ";
    }
    echo '</select>月';
  }
  month('m1'); //← 関数の呼び方
  month('m2');
  $inc = function (x) { 
  return x + 1;
};

  month('m3');
  ?>
<script>
  function month( date){
    document.write( `<select name='${date}'>`);
    for ( let i=1; i < 13 ; i++) { 
      document.write( '<option>'+ i );
    }
    document.write ('</select>月');
  }
  month('m1'); //← 関数の呼び方
  month('m2');
  month('m3');
</script>
<pre>
    ()の役割
    呼ぶ方では関数に渡したい値を入れる,関数側はそれを受け取る
    これをjavascriptで書き換えてみましょう