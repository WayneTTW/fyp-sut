<?php
session_start();

// Include necessary files and database connection
require_once "settings.php";

// Check if projectname parameter is set in the URL
if(isset($_GET['projectname'])) {
    $projectname = $_GET['projectname'];

    // Fetch project details from the database based on the project name
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM PIC WHERE projectname = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $projectname);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if project exists
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display form for editing project details
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Project</title>
            <!-- Add your CSS stylesheets or link to external stylesheets here -->
        </head>
        <body>

        <h2>Edit Project</h2>
        <form action="update_project.php" method="POST">
            <input type="hidden" name="projectname" value="<?php echo htmlspecialchars($row['projectname']); ?>">
            <!-- Add input fields for editing project details here -->
            <label for="client">Client:</label>
            <input type="text" id="client" name="client" value="<?php echo htmlspecialchars($row['client']); ?>"><br><br>

            <label for="applicants">Applicants:</label>
            <input type="text" id="applicants" name="applicants" value="<?php echo htmlspecialchars($row['applicants']); ?>"><br><br>

            <label for="priority">Priority:</label>
            <input type="number" id="priority" name="priority" value="<?php echo htmlspecialchars($row['priority']); ?>"><br><br>

            <label for="remarks">Remarks:</label>
            <input type="text" id="remarks" name="remarks" value="<?php echo htmlspecialchars($row['remarks']); ?>"><br><br>

            <input type="submit" value="Submit">
        </form>

        </body>
        </html>

        <?php
    } else {
        echo "Project not found.";
    }

    // Close database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Project name parameter is missing.";
}
?>