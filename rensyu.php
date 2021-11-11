<?php
  function month($n, $id) {
    $select = "<select name='$n' id='$id' >";
    for ($i=1; $i <13 ; $i++) {
      $select .= "<option> $i ";
    }
    $select .='</select>月';
    return $select;
  }

  $m1 = 'm1';
  $id1 = 'id1';
  echo month($m1 ,$id1);
?>