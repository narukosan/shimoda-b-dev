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

try
{

$post=sanitize($_POST);
$pro_name=$post['name'];
$pro_price=$post['price'];
$pro_maker=$post['maker'];
$pro_color=$post['color'];
$pro_distance=$post['distance'];
$pro_gazou_name=$post['gazou_name'];

 if($pro_price<=300000){
     $pro_price2='～30万円';
}else if($pro_price<=500000){
    $pro_price2='～50万円';
}elseif($pro_price<=1000000){
    $pro_price2='～100万円';
}elseif($pro_price<=2000000){
    $pro_price2='～200万円';
}elseif($pro_price<=3000000){
    $pro_price2='～300万円';
}elseif($pro_price<=5000000){
    $pro_price2='～500万円';
}else{
    $pro_price2='500万円以上';
}

if($pro_distance<=10000){
    $pro_distance2='1万km以下';
 }elseif($pro_distance<=30000){
     $pro_distance2='1～3万km';
 }elseif($pro_distance<=50000){
     $pro_distance2='3～5万km';
 }elseif($pro_distance<=100000){
     $pro_distance2='5～10万km';
 }elseif($pro_distance<=150000){
     $pro_distance2='10～15万km';
 }else{
    $pro_distance2='15万km以上';
 }

if (DEBUG) {
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
else{
$dbServer = '127.0.0.1';
$dbUser = $_SERVER['MYSQL_USER'];
$dbPass = $_SERVER['MYSQL_PASSWORD'];
$dbName = $_SERVER['MYSQL_DB'];
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
$dbh = new PDO($dsn, $dbUser, $dbPass);
}

$sql='INSERT INTO mst_product(name,price,maker,color,distance,gazou,stock,price2,distance2) VALUES (?,?,?,?,?,?,?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$pro_name;
$data[]=$pro_price;
$data[]=$pro_maker;
$data[]=$pro_color;
$data[]=$pro_distance;
$data[]=$pro_gazou_name;
$data[]=1;
$data[]=$pro_price2;
$data[]=$pro_distance2;
$stmt->execute($data);

$dbh=null;

print $pro_name;
print 'を追加しました。<br />';

}
catch(Exception$e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="pro_list.php">戻る</a>

</body>
</html>