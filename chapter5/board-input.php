<?php require '../header.php';?>
<p>投稿するメッセージを入力してください。</p>
<form action="board-output.php" method="get">
<input type="text" name="message">
<input type="submit" value="投稿">
</form>
<?php require '../footer.php';?>