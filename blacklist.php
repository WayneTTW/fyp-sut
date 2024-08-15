<?php
include "settings.php";
session_start();

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $project_name = $_SESSION['project'];
    $recruiter_name = $_SESSION['PIC'];

    // Check if the recruiter is already blacklisted
    $check_sql = "SELECT * FROM Applicants WHERE project = ? AND PIC = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $project_name, $recruiter_name);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows == 0) {
        $sql = "INSERT INTO Blacklist (project, PIC, status) VALUES (?, ?, 'attend')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $project_name, $recruiter_name);
        
        if ($stmt->execute()) {
            // Redirect to the blacklist page after successful insertion
            header("Location: Blacklists.php");
            exit();
        } else {
            echo 'Error updating recruiter: ' . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8');
        }
    } else {
        echo 'This recruiter already exists in the blacklist for this project.';
    }
}
?>
