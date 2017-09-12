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
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td align="center">Date of birth:</td>
					<td><input type="Date" name="dob"></td>
				</tr>
				<tr>
					<td align="center">Gender:</td>
					<td><input type="radio" name="gender" value="male">Male<br>
						<input type="radio" name="gender" value="female">Female<br>
						<input type="radio" name="gender" value="other">Other
					</td>
				</tr>
				<tr>
					<td align="center">Hobbies:</td>
					<td><input type="checkbox" name="hobby[]" value="Singing">Singing<br>
						<input type="checkbox" name="hobby[]" value="Dancing">Dancing<br>
						<input type="checkbox" name="hobby[]" value="Swimming">Swimming<br>
						<input type="checkbox" name="hobby[]" value="Others">Others<br></td>
				</tr>
				<tr>
					<td align="center">City:</td>
					<td><select name="city">
						<option value="default">Select City</option>
						<option value="Bidar">Bidar</option>
						<option value="Bangalore">Bangalore</option>
						<option value="Hyderabad">Hyderabad</option>
					</select></td>
				</tr>
				<tr>
					<td align="center">Email:</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td align="center">Password:</td>
					<td><input type="Password" name="password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="register" value="Sign In"></td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php
if(isset($_POST['register']))
{
	$name = $_POST['name']; 
	$dob = $_POST['dob']; 
	$gender = $_POST['gender'];
	$hobbies = implode(",", $_POST['hobby']);
	$city = $_POST['city'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$c = mysqli_connect("localhost","root","","zakuma");
	$query = "insert into details2(name,dob,gender,hobbies,city,email,password) values('$name','$dob','$gender','$hobbies','$city','$email','$password')";
	$res = mysqli_query($c,$query);
	if($res == TRUE)
	{
		header("location: index.php");
	}
}
?>