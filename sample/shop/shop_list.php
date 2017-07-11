<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
	print 'ようこそゲスト様　';
	print '<a href="member_login.html">会員ログイン</a><br />';
	print '<br />';
}
else
{
	print 'ようこそ';
	print $_SESSION['member_name'];
	print ' 様　';
	print '<a href="member_logout.php">ログアウト</a><br />';
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


$sql='SELECT code,name,price,maker,color,distance,stock,price2,distance2 FROM mst_product WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '商品一覧<br /><br />';

?>
<form method="post" action="">
キーワード<br />
<input type="text" name="keyword"><br />
<input type="submit" value="検索">
</form> 
<br />

キーワードを選んでください。<br />
<form method="post"action="">
メーカー
<?php pulldown_type(); ?>
価格
<?php pulldown_price(); ?>
走行距離
<?php pulldown_distance(); ?>
<br />
<input type="submit" value="絞り込み">
</form>
<br />

<?php

//フリーキーワード
$keyword='';
if(isset($_POST['keyword'])){
    $keyword=$_POST['keyword'];
}
if($keyword!==''){
    print $keyword.'が含まれる';
    print '<br />';
}
//固定キーワード
$maker='';
$price='';
$distance='';
if(isset($_POST['type'])){
   $maker=$_POST['type'];
   $price=$_POST['price'];
   $distance=$_POST['distance'];
}
if($maker!==''){
    print $maker.' '.$price.','.$distance.'に一致する商品';
    print '<br />';
}

while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
        $maker2=$rec['maker'];
        $price2=$rec['price2'];
        $distance2=$rec['distance2'];
	if($rec==false)
	{
		break;
	}
        $disp=0;
        //キーワードが空、または、キーワードが含まれるとき表示
        if(($keyword==='')&&($maker==='')){
            $disp=1;
        }
        else if(($maker==='')&&(strpos($rec['name'],$keyword)!==false)){
            $disp=1;
        }
        else if(($keyword==='')&&((strpos($maker2,$maker)!==false)&&(strpos($price2,$price)!==false)&&(strpos($distance2,$distance)!==false))){
            $disp=1;
        }

        if($disp===1){
	print '<a href="shop_product.php?procode='.$rec['code'].'">';
	print $rec['name'].'---';
	print $rec['price'].'円,';
        print $rec['maker'].'製,';
        print $rec['color'].'色,';
        print $rec['distance'].'km';
	print '</a>';
	print '<br />';
        }
}
    

print '<br />';
print '<a href="shop_cartlook.php">カートを見る</a><br />';

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

</body>
</html>