<?php
class Seiseki{
  protected $class_total = []; //配列として初期化
  protected $name;
  protected $scores;

  public function set($name , $scores){ 
    $this->name = $name;
    $this->scores = $scores;
    $this->sum();
  }

  public function get(){
    arsort($this->class_total); // 値で降順ソート
    return $this->class_total;
  }

  protected function sum(){
    $this->class_total += 
      [ $this->name => array_sum($this->scores) ];
  }

  public function avg(){
    $avg = array_sum($this->scores)/count($this->scores);
    echo $this->name .'さんの平均 '. $avg. '点<br>';
  }
}


/* 継承した子クラス
    親クラスの機能をすべて引き継いでいる
*/
class Seiseki_child extends Seiseki{

  public function get(){
    arsort($this->class_total); // 値で降順ソート
     foreach ($this->class_total as $key => $value) {
       echo "<li>$key さんの合計は $value 点です</li>";
     }
  }
}


$seseki = new Seiseki_child(); //インスタンス作成
$seseki->set('佐藤',[90,88,77]); $seseki->avg(); 
$seseki->set('伊藤',[66,54,44]); $seseki->avg(); 
$seseki->set('後藤',[55,53,88]); $seseki->avg(); 
$seseki->get() ;

/*
  Bクラスの合計とAクラスの合計を比較してください
    加藤,[82,59,62,65]
    衛藤,[52,69,82,44]
    遠藤,[82,99,24,32]
*/ 
$sesekiB = new Seiseki_child(); //インスタンス作成
$sesekiB->set('加藤',[82,59,62,65]);  
$sesekiB->set('衛藤',[52,69,82,44]);  
$sesekiB->set('遠藤',[82,99,24,32]);  
$sesekiB->get() ;