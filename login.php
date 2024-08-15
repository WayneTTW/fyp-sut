<?php
session_start();

require_once "settings.php";

$conn = @mysqli_connect ($host, $user, $pwd, $sql_db);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $Password = $_POST["password"];
    $Email = $_POST["email"];
    
    $query = "SELECT * FROM User WHERE password = '$Password' AND email = '$Email' ";
    $result = mysqli_query($conn, $query);
    
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $Email && $row['password'] === $Password && $row['PIC'] === 'true'){
            $_SESSION['email'] = $Email;
            $_SESSION['password'] = $Password; 
            $_SESSION['logged_in'] = true;
            $_SESSION['PIC'] = true;
            header("Location: Lists_PIC.php");
            exit();
        }  
        elseif($row['email'] === $Email && $row['password'] === $Password && $row['PIC'] === 'false'){
            $_SESSION['email'] = $Email;
            $_SESSION['password'] = $Password; 
            $_SESSION['PIC'] = false;
            $_SESSION['logged_in'] = true;
            header("Location: Projects.php");
            exit();
        }  
    }else {
        header ("Location: Login.html"); 
        exit();
    }
       
    mysqli_close($conn);
}
?>



