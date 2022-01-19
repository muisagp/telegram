<?php
//https://api.telegram.org/bot197662262:AAH5Q0jrpzTZeasI8dQVxwFNXUNSTHaA1MI/getUpdates?offset=142757037&timeout=2&limit=1
$homepage = file_get_contents('https://api.telegram.org/bot197662262:AAH5Q0jrpzTZeasI8dQVxwFNXUNSTHaA1MI/getUpdates');
//echo $homepage;
$c=explode("\"message\":", $homepage);
$jml=count($c);
for($i=0;$i<=$jml;$i++)
	{
	//echo"$c[$i]";
	$d=explode(',', $c[$i]);
	$e=count($d);
	for($j=0;$j<=$e; $j++)
		{
		echo"$j. $d[$j]<br>";
		}
	echo"<br><hr>";
	}
?>