<?php require '../header.php'; ?>
<pre> <!-- このタグでコードの改行が反映する -->
<?php
  var_dump(isset($_REQUEST['age'])) ;
  var_dump(isset($_REQUEST['onamae'])) ;
  var_dump(!empty($_REQUEST['age'])) ;
  var_dump(!empty($_REQUEST['onamae'])) ;
 
?>
<?php require '../footer.php'; ?>