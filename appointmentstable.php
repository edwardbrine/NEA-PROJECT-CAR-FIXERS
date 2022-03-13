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
                <a href="home.php"><i class="fas fa-user-circle"></i>Home Page</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Appointment Form</h2>
			<p>Please select your choices for your appointment, <?=$_SESSION['name']?>!</p>
<form action="insert.php" method="POST">
  Employee:
  <select name='Employee'>
    <option disabled selected>-- Select Employee --</option>
    <?php
        include "connection.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT FirstName From employee_information");  // Use select query here 

        while($data = $records->fetch_assoc())
        {
            echo "<option value='". $data['FirstName'] ."'>" .$data['FirstName'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
  Problem:
  <select name='Problem'>
    <option disabled selected>-- Select Problem --</option>
    <?php
        include "connection.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT ProblemName From problems");  // Use select query here 

        while($data = $records->fetch_assoc())
        {
            echo "<option value='". $data['ProblemName'] ."'>" .$data['ProblemName'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
  Customer Vehicle : <input type="text" name='Vehicle' placeholder="Enter Vehicle Model" required>
  <br/>
  Time : <input type="text" name='Time' placeholder="Enter Time" required>
  <br/>
<button type="submit" name="submit" value="Submit">Submit</button>
</form>

		</div>
	</body>
</html>