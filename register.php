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
    $Username = $_POST["username"];
    $Password = $_POST["password"];
    $Confirm = $_POST["confirm"];
    $Email = $_POST["email"];
    $Phonenumber = $_POST["phonenumber"];

    if ($Password !== $Confirm)
    {
        $_SESSION['error_message'] = "Passwords do not match. Please try again.";
        header ("Location: Register.html");
        exit();
    }
    else
    {
        $query = "INSERT INTO User (username, password, email, phonenumber) VALUES ('$Username', '$Password', '$Email', '$Phonenumber')";
        if (mysqli_query($conn, $query))
        {
            header ("Location: Login.html");
            exit();
        }
        else
        {
        echo "Registration failed: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>

