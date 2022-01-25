<?php
	$title=$_POST['title'];
	$price=$_POST['price'];
	//$author=mysqli_escape_string((string)$_POST['author']);
	
	$con=mysqli_connect('localhost','root');
	$author=mysqli_real_escape_string($con,(string)$_POST['author']);
	mysqli_select_db($con,'BRM_DB');

	$q= "INSERT INTO book (title,price,author) values('$title',$price,'$author')";
	$status=mysqli_query($con,$q);
	mysqli_close($con);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			Insertion of Data
		</title>
	</head>
	<body>
		<h1>Book Record Management</h1>
		<p>
			<?php
				if($status==1)
					echo "Record Inserted";
				else
					echo "Insertion Failed";
			?>
		</p>
		Do you want to insert more record?<a href="insertForm.php"> Click Here</a></br>
		Return to home page<a href="home.php"> Click Here</a>
	</body>
</html>