
<?php
	$alpha = range('A','Z');
	for($i=0;$i<=4;$i++)
	{
		for($k=4;$k>$i;$k--)
		{
			echo"&nbsp&nbsp";
		}
		for($j=0;$j<=$i;$j++)
		{
			echo $alpha[$j]."&nbsp&nbsp";
		}
	echo"<br>";
	}
?>
