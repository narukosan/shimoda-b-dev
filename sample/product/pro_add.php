<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていませんyo。<br />';
	print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
	exit();
}
else
{
	print $_SESSION['staff_name'];
	print 'さんログイン中<br />';
	print '<br />';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

商品追加<br />
<br />
<form method="post" action="pro_add_check.php" enctype="multipart/form-data">
商品名を入力してください。<br />
<input type="text" name="name" style="width:200px"><br />
価格を入力してください。<br />
<input type="text" name="price" style="width:50px"><br />
メーカーを入力してください。<br />
<input type="pulldown" name="maker" style="width:200px"><br />
<?php
require_once('../common/common.php');
?>

価格
<?php pulldown_price(); ?><br />
走行距離
<?php pulldown_distance(); ?><br />
色を入力してください。<br />
<input type="text" name="color" style="width:50px"><br />
距離を入力してください。<br />
<input type="text" name="distance" style="width:50px"><br />
画像を選んでください。<br />
<input type="file" name="gazou" style="width:400px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="ＯＫ">
</form>

</body>
</html>