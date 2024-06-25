<html>
	<body>
		<form method="post">
			Enter a number:
			<input type="number" name="n1">
			<input type="submit" value="Submit">
		</form>
	</body>
</html>
<?php
	if($_POST)
	{
		$num = $_POST['n1'];
		$factorial = 1;  
		for ($x=$num; $x>=1; $x--)   
		{  
			$factorial = $factorial * $x;  
		}  
		echo "Factorial of $num is $factorial";  
	}
?>