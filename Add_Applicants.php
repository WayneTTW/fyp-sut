<?php
include "settings.php";
session_start();

$conn = @mysqli_connect ($host, $user, $pwd, $sql_db);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Ensure the database connection is established
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize the input data
    $date = $_POST["date"];
    $name = $_POST["name"];
    $IC = $_POST["IC"];
    $contactNum = $_POST["contactNum"];
    $applicant_email = $_POST["applicant_email"];
    $projectname = $_SESSION["project_name"];
    $PIC = $_SESSION["email"];
    $remark = $_POST["remark"];
    $status = "attend";

    // Prepare the SQL query using prepared statements
    $query = "INSERT INTO Applicants (date, name, IC, contact_num, email, project, PIC, remark, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Check if the preparation was successful
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind the parameters to the SQL query
    $stmt->bind_param("sssssssss", $date, $name, $IC, $contactNum, $applicant_email, $projectname, $PIC, $remark, $status);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        header("Location: Project_Recruiters.php");
        exit();
    } else {
        echo "Execution failed: " . htmlspecialchars($stmt->error);
    }

    // Close the statement
    $stmt->close();
}
?>