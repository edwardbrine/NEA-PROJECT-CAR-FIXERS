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
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
                <div class="content">
        <table>
<tr>
<th>ID</th>
<th>Time</th>
<th>CustomerVehicle</th>
<th>EmployeeName</th>
<th>ProblemName</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "carfixers");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Time"] . "</td><td>" . $row["CustomerVehicle"] . "</td><td>" . $row["EmployeeName"] . "</td><td>" . $row["ProblemName"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results - No appointments Found...";}
$conn->close();
?>
</table>
        </div>
	</body>
</html>
