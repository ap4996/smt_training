<?php
session_start();
$id = $_GET['id'];
$c = mysqli_connect("localhost","root","","zakuma");
$res = mysqli_query($c,"select * from details2 where id = '$id'");
$r = mysqli_fetch_array($res);
$h = explode(",", $r['hobbies']);
if(isset($_POST['edit']))
{
	$name = $_POST['name']; 
	$dob = $_POST['dob']; 
	$gender = $_POST['gender'];
	$hobbies = implode(",", $_POST['hobby']);
	$city = $_POST['city'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query1 = "UPDATE details2 SET name='$name',dob='$dob',gender='$gender',hobbies='$hobbies',city='$city',email='$email', password = '$password' WHERE id = '$id'";
	$res1 = mysqli_query($c,$query1);
	if($res1==TRUE)
		header("location:home.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Zakuma
		</title>
		<style type="text/css">
			.out
			{
				background-color: grey;
				height: 100%;
				width: 100%;
			}
			.in
			{
				background-color: rgba(255,255,255,0.3);
				height: 21%;
				width: 31%;
				margin-top: 15%;
				margin-left: 25%;
			}
			input[type="text"], input[type="password"], input[type="submit"]
			{
				height: 45px;
				width: 225px;
			}
		</style>
	</head>
	<body class="out">
		<form class="in" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td align="center">Name:</td>
					<td><input type="text" name="name" value="<?php echo $r['name']; ?>"></td>
				</tr>
				<tr>
					<td align="center">Date of birth:</td>
					<td><input type="Date" name="dob" value="<?php echo $r['dob']; ?>"></td>
				</tr>
				<tr>
					<td align="center">Gender:</td>
					<td><input type="radio" name="gender" value="male" <?php if($r['gender']=="male") { echo "checked=:checked"; } ?>>Male<br>
						<input type="radio" name="gender" value="female" <?php if($r['gender']=="female") { echo "checked=:checked"; } ?>>Female<br>
						<input type="radio" name="gender" value="other" <?php if($r['gender']=="other") { echo "checked=:checked"; } ?>>Other
					</td>
				</tr>
				<tr>
					<td align="center">Hobbies:</td>
					<td><input type="checkbox" name="hobby[]" value="Singing" <?php if(in_array("Singing", $h)) { echo "checked=:checked"; } ?>>Singing<br>
						<input type="checkbox" name="hobby[]" value="Dancing" <?php if(in_array("Dancing", $h)) { echo "checked=:checked"; } ?>>Dancing<br>
						<input type="checkbox" name="hobby[]" value="Swimming" <?php if(in_array("Swimming", $h)) { echo "checked=:checked"; } ?>>Swimming<br>
						<input type="checkbox" name="hobby[]" value="Others" <?php if(in_array("Others", $h)) { echo "checked=:checked"; } ?>>Others<br></td>
				</tr>
				<tr>
					<td align="center">City:</td>
					<td><select name="city">
						<option value="default" <?php if($r['city']=="default") { echo "selected=:selected"; } ?>>Select City</option>
						<option value="Bidar" <?php if($r['city']=="Bidar") { echo "selected=:selected"; } ?>>Bidar</option>
						<option value="Bangalore" <?php if($r['city']=="Bangalore") { echo "selected=:selected"; } ?>>Bangalore</option>
						<option value="Hyderabad" <?php if($r['city']=="Hyderabad") { echo "selected=:selected"; } ?>>Hyderabad</option>
					</select></td>
				</tr>
				<tr>
					<td align="center" >Email:</td>
					<td><input type="text" name="email" value="<?php echo $r['email']; ?>"></td>
				</tr>
				<tr>
					<td align="center">Password:</td>
					<td><input type="Password" name="password" value="<?php echo $r['password']; ?>"></td>
				</tr>
				<tr>
					<td><input type="submit" name="edit" value="EDIT"></td>
				</tr>
			</table>
		</form>
	</body>
</html>