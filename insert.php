<?php
include "connection.php"; // Using database connection file here

if(isset($_POST['submit']))
{		
    $vehicle = $_POST['Vehicle'];
    $time = $_POST['Time'];
    $employee = $_POST['Employee'];
    $problem = $_POST['Problem'];
    $insert = mysqli_query($conn,"INSERT INTO `appointments`(`Time`, `CustomerVehicle`, `EmployeeName`, `ProblemName`) VALUES ('$time','$vehicle','$employee','$problem')");

    if(!$insert)
    {
        echo mysqli_error();
    }
    else
    {
        echo "Records added successfully.";
    }
}

mysqli_close($conn); // Close connection
header("Location: /home.php");
?>