<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style3.css" rel="stylesheet" type="text/css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Car Fixers</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Appointment Form</h2>
			<p>Please enter your correct details for your appointment application, <?=$_SESSION['name']?>!</p
				<form name = "form1" action="modified.php" method = "post" enctype = "multipart/form-data" >
	            <div class = "container">
	                <div class = "form_group">
	                    <label>First Name:</label>
	                    <input type = "text" name = "fname" value = "" required/>
	                </div>
	                <div class = "form_group">
	                    <label>Last Name:</label>
	                    <input type = "text" name = "lname" value = "" required />
	                </div>
	                <div class = "form_group">
	                    <label>Last Name:</label>
	                    <input type = "text" name = "lname" value = "" required/>
	                </div>
	                <div class = "form_group">
	                    <label>Password:</label>
	                    <input type = "password" name = "pwd" value = "" required/>
	                </div>
	            </div>
	        </form>
		</div>
	</body>
</html>
