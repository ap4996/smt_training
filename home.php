<?php
session_start();
$id = $_SESSION['id'];

$con = mysqli_connect("localhost","root","","zakuma");
$sql = "select * from details2 where id = '$id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);

echo "To edit your information click Edit";

if(isset($_POST['logout']))
{	
	session_destroy();
	header("location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style type="text/css">
		table
		{
			border-collapse: collapse;
			border: 2px solid black;
		}
		.a
		{
			font-weight: bold;
		}
	</style>
</head>
<body>
	<table border="1">
	<tr class="a">
		<td>ID</td>
		<td>Email</td>
		<td>Name</td>
		<td>Gender</td>
		<td>Hobbies</td>
		<td>Date of Birth</td>
		<td>City</td>
		<td>Action</td>
	</tr>
	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['gender']; ?></td>
		<td><?php echo $row['hobbies']; ?></td>
		<td><?php echo $row['dob']; ?></td>
		<td><?php echo $row['city']; ?></td>
		<td><a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a></td>
	</tr>
</table>
<br><br>
<form method="post">
	<input type="submit" name="logout" value="LOGOUT">	
</form>

</body>
</html>
