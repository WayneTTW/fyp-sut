<?php
session_start();
require_once "settings.php";

// Connect to the database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the username from the POST data
    $recruiterName = mysqli_real_escape_string($conn, $_POST['username']);
    
    // Retrieve the current PIC status from the database
    $query = "SELECT PIC FROM User WHERE username = '$recruiterName'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        http_response_code(500);
        echo "Error retrieving PIC status: " . mysqli_error($conn);
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    $currentPICStatus = $row['PIC'];

    // Toggle the PIC status
    $newPICStatus = ($currentPICStatus === 'true') ? 'false' : 'true';

    // Update the PIC status in the User table
    $updateQuery = "UPDATE User SET PIC = '$newPICStatus' WHERE username = '$recruiterName'";

    if (mysqli_query($conn, $updateQuery)) {
        // Return the updated PIC status
        echo $newPICStatus;
    } else {
        http_response_code(500);
        echo "Error updating PIC status: " . mysqli_error($conn);
    }
} else {
    http_response_code(400);
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
