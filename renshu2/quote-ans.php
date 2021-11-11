選択肢が1999と出るようにしなさい｡
<select>
  
<?php
 $i = "1999";
 echo '<option> $i </option>';
 // ここ以下は全部正解
 echo '<option>', $i, '</option>';
 echo "<option> $i </option>";
?>
 <option><?=$i?></option> 
 
</select>