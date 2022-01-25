<?php
	$size=sizeof($_POST);
	$records=$size/4; 
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'brm_db');
	
	for($i=1;$i<=$records;$i++)
	{
		$index1="bookid".$i;
		$bookid[$i]=$_POST[$index1];
		$index2="title".$i;
		$title[$i]=$_POST[$index2];
		$index3="price".$i;
		$price[$i]=$_POST[$index3];
		$index4="author".$i;
		//$author[$i]=$_POST[$index4];
		$author[$i]=mysqli_real_escape_string($con,(string)$_POST[$index4]);
	}
	
	
	
	for($i=1;$i<=$records;$i++)
	{
		$q="update book SET title='$title[$i]',price=$price[$i],author='$author[$i]' WHERE bookid=$bookid[$i]";
		
		
		mysqli_query($con,$q);
	
	}
	mysqli_close($con);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			Updation of Data
		</title>
	</head>
	<body>
		<h1>Book Record Management</h1>
		<p>
			<?php
				
					echo "Records Updated";
				
			?>
		</p>
		Return to Home Page<a href="Home.php"> Click Here</a>
	</body>
</html>