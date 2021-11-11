<?php
  $ua = $_SERVER['HTTP_USER_AGENT'];
  echo $ua;
  $ua_list = ['iPhone','iPad','iPod','Android','touch']
  $user_agent = 'pc';
  foreach($ua_list as $value){
    if(strpos($subject,'bc') !== false){
    //'abcd'のなかに'bc'が含まれている場合
    $user_agent = 'sp';
    break;}
  }
?>