<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "re";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if($conn->connect_error) {
	die("Unable to connect".$conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$uname = $_POST["username"];
	$pass = $_POST["password"];          // username as admin
	                                    //password as anything' or 'x'='x
	//Making sure that SQL Injection doesn't work
	// $unames = mysqli_real_escape_string($conn, $uname);//test or 1=1
	// $pass = mysqli_real_escape_string($conn, $pass);
	$sql = "SELECT * FROM login WHERE userid = '$unames' AND password = '$pass'";
	$result = $conn->query($sql);
	if($result->num_rows>0) {
		echo "Welcome, user!";
	} else {
		echo "Incorrect Username/Password";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Portal</title>
	<style type="text/css">
		input[type=text],input[type=password] {
			padding: 16px;
			margin: 8px;
			border: 1px solid #f1f1f1;
			letter-spacing: 1px;
			border-radius: 3px;
			width: 240px;
		}
		input[type=submit] {
			margin-left: 8px;
			width: 274px;
			border-radius: 3px;
			border: 1px solid #4285f4;
			background-color: #4285f4;
			padding: 16px;
			color: white;
			font-weight: 600;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<form action="index.php" method="POST" autocomplete="off">
		<input type="text" name="username" placeholder="Username" /><br />
		<input type="text" name="password" placeholder="********" /><br />
		<input type="submit" name="login" value="LOGIN" />
	</form>
</body>
</html>