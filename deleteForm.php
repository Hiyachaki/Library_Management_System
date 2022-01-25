<?php
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'brm_db');
	$q="SELECT * FROM book";
	$result=mysqli_query($con,$q);
	$num=mysqli_num_rows($result);
	mysqli_close($con);
?>


<!DOCTYPE html>
<html>
	<head>
		<title> Delete Book Records </title>
		<link rel="stylesheet" href="./CSS/viewStyle.css" />
	</head>
	<body>
		<h1> Book Record Management </h1>
		<form action="deletion.php" method="post">  <!takes all the values passed through input tag >
		<table id="view_table">
			<tr>
				<th>Book ID</th>
				<th>Title</th>
				<th>Price</th>
				<th>Author</th>
				<th>Select to Delete</th>
			</tr>
			<?php
				for($i=1;$i<=$num;$i++)
				{
					$row=mysqli_fetch_array($result)
			?>
				<tr>
					<td><?php echo $row['bookid']; ?></td>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><?php echo $row['author']; ?></td>
					<td><input type="checkbox" value="<?php echo $row['bookid']; ?>" name="b<?php echo $i; ?>" /></td>    <!name is required to send variables in the associative array $_POST[] , e.g. $_POST[b1]=1 (where 1 is the value corresponding to-bookid) >
				</tr>    <!value for checkbox will be passed to $_POST array only if checkbox is ticked >
			<?php
				}
			?>
			<tr>
				<td colspan="5"><input type="submit" value="Delete"/></td>  <! colspan="5" takes the cell space of 5 columns. Here, value decides the Caption in html >
			</tr>
		</table>
		</form>
	</body>
</html>