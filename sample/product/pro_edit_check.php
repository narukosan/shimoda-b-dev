<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
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
<title>まる自動車販売店</title>
</head>
<body>

<?php

require_once('../common/common.php');

$post=sanitize($_POST);
$pro_code=$post['code'];
$pro_name=$post['name'];
$pro_price=$post['price'];
$pro_maker=$post['maker'];
$pro_color=$post['color'];
$pro_distance=$post['distance'];
$pro_stock=$post['stock'];
$pro_gazou_name_old=$post['gazou_name_old'];
$pro_gazou=$_FILES['gazou'];

if($pro_name=='')
{
	print '商品名が入力されていません。<br />';
}
else
{
	print '商品名:';
	print $pro_name;
	print '<br />';
}

if(preg_match('/^[0-9]+$/',$pro_price)==0)
{
	print '価格をきちんと入力してください。<br />';
}
else
{
	print '価格:';
	print $pro_price;
	print '円<br />';
}



if($pro_maker=='')
{
	print 'メーカーが入力されていません。<br />';
}
else
{
	print 'メーカー:';
	print $pro_maker;
	print '<br />';
}



if($pro_color=='')
{
	print '色が入力されていません。<br />';
}
else
{
	print '色:';
	print $pro_color;
	print '<br />';
}


if(preg_match('/^[0-9]+$/',$pro_distance)==0)
{
	print '距離をきちんと入力してください。<br />';
}
else
{
	print '距離:';
	print $pro_distance;
	print 'km<br />';
}


if(preg_match('/^[0-9]+$/',$pro_stock)==0)
{
	print '在庫をきちんと入力してください。<br />';
}
else
{
	print '在庫:';
	print $pro_stock;
	print '台<br />';
}


if($pro_gazou['size']>0)
{
	if($pro_gazou['size']>1000000)
	{
		print '画像が大き過ぎます';
	}
	else
	{
		move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
		print '<img src="./gazou/'.$pro_gazou['name'].'">';
		print '<br />';
	}
}


if($pro_name=='' || preg_match('/^[0-9]+$/',$pro_price)==0 || $pro_maker=='' || $pro_color=='' || preg_match('/^[0-9]+$/',$pro_distance)==0 || $pro_gazou['size']>1000000)

{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print '上記のように変更します。<br />';
	print '<form method="post" action="pro_edit_done.php">';
	print '<input type="hidden" name="code" value="'.$pro_code.'">';
	print '<input type="hidden" name="name" value="'.$pro_name.'">';
	print '<input type="hidden" name="price" value="'.$pro_price.'">';
        print '<input type="hidden" name="maker" value="'.$pro_maker.'">';
	print '<input type="hidden" name="color" value="'.$pro_color.'">';
        print '<input type="hidden" name="distance" value="'.$pro_distance.'">';
	print '<input type="hidden" name="stock" value="'.$pro_stock.'">';
	print '<input type="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old.'">';
	print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}

?>
</body>
</html>