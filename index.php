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
		<form class="in" method="post">
			<table>
				<tr>
					<td align="center">Email:</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td align="center">Password:</td>
					<td><input type="Password" name="password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="login" value="Sign In"></td>
					<td><input type="submit" name="register" value="Sign Up"></td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php
if(isset($_POST['register']))
{
	header("location: register.php");
}
if(isset($_POST['login']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$c = mysqli_connect("localhost","root","","zakuma");
	$query = "select * from details2 where email = '$email' and password = '$password'";
	$r = mysqli_query($c,$query);
	$res = mysqli_fetch_array($r);
	if($res == TRUE)
	{	
		session_start();
		$_SESSION['id'] = $res['id'];
		$_SESSION['user'] = $res['name'];
		$_SESSION['dob'] = $res['dob'];
		$_SESSION['gender'] = $res['gender'];
		$_SESSION['hob'] = $res['hobbies'];
		$_SESSION['city'] = $res['city'];
		$_SESSION['email'] = $res['email'];
		
		header("location: home.php");	
	}
	else
	{
		echo "Invalid username/password";
	}
	
}

?>