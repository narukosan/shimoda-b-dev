<?php
//DEBUG処理の切り替え　　本番運用時にはFALSEに変更すること
define('DEBUG',TRUE);//デバッグ時
//define('DEBUG',FALSE);本番運用時
?>
<?php

function gengo($seireki)
{
	if(1868<=$seireki && $seireki<=1911)
	{
		$gengo='明治';
	}

	if(1912<=$seireki && $seireki<=1925)
	{
		$gengo='大正';
	}

	if(1926<=$seireki && $seireki<=1988)
	{
		$gengo='昭和';
	}

	if(1989<=$seireki)
	{
		$gengo='平成';
	}

	return($gengo);
}

function sanitize($before)
{
	foreach($before as $key=>$value)
	{
		$after[$key]=htmlspecialchars($value);
	}
	return $after;
}

function pulldown_year()
{
	print '<select name="year">';
	print '<option value="2013">2013</option>';
	print '<option value="2014">2014</option>';
	print '<option value="2015">2015</option>';
	print '<option value="2016">2016</option>';
	print '<option value="2017">2017</option>';
	print '</select>';
}

function pulldown_month()
{
	print '<select name="month">';
	print '<option value="01">01</option>';
	print '<option value="02">02</option>';
	print '<option value="03">03</option>';
	print '<option value="04">04</option>';
	print '<option value="05">05</option>';
	print '<option value="06">06</option>';
	print '<option value="07">07</option>';
	print '<option value="08">08</option>';
	print '<option value="09">09</option>';
	print '<option value="10">10</option>';
	print '<option value="11">11</option>';
	print '<option value="12">12</option>';
	print '</select>';
}

function pulldown_day()
{
	print '<select name="day">';
	print '<option value="01">01</option>';
	print '<option value="02">02</option>';
	print '<option value="03">03</option>';
	print '<option value="04">04</option>';
	print '<option value="05">05</option>';
	print '<option value="06">06</option>';
	print '<option value="07">07</option>';
	print '<option value="08">08</option>';
	print '<option value="09">09</option>';
	print '<option value="10">10</option>';
	print '<option value="11">11</option>';
	print '<option value="12">12</option>';
	print '<option value="13">13</option>';
	print '<option value="14">14</option>';
	print '<option value="15">15</option>';
	print '<option value="16">16</option>';
	print '<option value="17">17</option>';
	print '<option value="18">18</option>';
	print '<option value="19">19</option>';
	print '<option value="20">20</option>';
	print '<option value="21">21</option>';
	print '<option value="22">22</option>';
	print '<option value="23">23</option>';
	print '<option value="24">24</option>';
	print '<option value="25">25</option>';
	print '<option value="26">26</option>';
	print '<option value="27">27</option>';
	print '<option value="28">28</option>';
	print '<option value="29">29</option>';
	print '<option value="30">30</option>';
	print '<option value="31">31</option>';
	print '</select>';
}

function pulldown_type()
{
	print '<select name="type">';
	print '<option value="トヨタ">トヨタ</option>';
	print '<option value="日産">日産</option>';
	print '<option value="ホンダ">ホンダ</option>';
	print '<option value="三菱">三菱</option>';
	print '<option value="マツダ">マツダ</option>';
	print '<option value="スバル">スバル</option>';
	print '</select>';
}
function pulldown_price()
{
	print '<select name="price">';
	print '<option value="～30万円">～30万円</option>';
	print '<option value="～50万円">～50万円</option>';
	print '<option value="～100万円">～100万円</option>';
	print '<option value="～200万円">～200万円</option>';
	print '<option value="～300万円">～300万円</option>';
	print '<option value="～500万円">～500万円</option>';
        print '<option value="500万円以上">500万円以上</option>';
	print '</select>';
}
function pulldown_distance()
{
	print '<select name="distance">';
	print '<option value="1万km以下">1万km以下</option>';
	print '<option value="1～3万km">1～3万km</option>';
	print '<option value="3～5万km">3～5万km</option>';
	print '<option value="5～10万km">5～10万km</option>';
	print '<option value="10～15万km">10～15万km</option>';
	print '<option value="15万km以上">15万km以上</option>';
	print '</select>';
}


?>

