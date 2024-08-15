<?php
include "settings.php";
session_start();

$conn = @mysqli_connect ($host, $user, $pwd, $sql_db);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Table List">
    <meta name="description" content="">
    <title>Project_Recruiters</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Project_Recruiters.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.8.8, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    <style>
    #thead {
      display: none;
    }
    </style>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Project_Recruiters">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en"><header class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-clearfix u-header" id="sec-1c6a" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-30 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="Lists_PIC.php" style="padding: 10px 0px;">Lists</a><div class="u-nav-popup"><ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12"><li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Blacklists.html">Blacklist</a>
</li><li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Projects.php">Projects</a>
</li></ul>
</div>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="PICcontrol.php" style="padding: 10px 0px;">Recruiters</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Lists_PIC.html">Lists</a><div class="u-nav-popup"><ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12"><li class="u-nav-item"><a class="u-button-style u-nav-link">Blacklist</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link">Attend</a>
</li></ul>
</div>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="PICcontrol.php">Recruiters</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="images/image.png" alt="" data-image-width="512" data-image-height="512">
      </div></header>
      <?php
              $email = $_SESSION['email'];

              // Prepare the SQL statement with a placeholder
              $query = "SELECT * FROM User WHERE email = ?";
              $stmt = $conn->prepare($query);
              
              // Check if the preparation was successful
              if ($stmt === false) {
                  die('Prepare failed: ' . htmlspecialchars($conn->error));
              }
              
              // Bind the email parameter to the placeholder
              $stmt->bind_param("s", $email);
              
              // Execute the statement
              $stmt->execute();
              
              // Get the result
              $result = $stmt->get_result(); 

              if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['recruiter_name'] = $row['username'];
                }
              }

              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Retrieve and sanitize the project name from the form submission
                if (isset($_POST['project_name'])) {
                  $_SESSION['project_name'] = htmlspecialchars($_POST['project_name'], ENT_QUOTES, 'UTF-8');
                  }
                }
              ?>

    <section class="u-clearfix u-section-1" id="sec-e013">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-border-3 u-border-grey-dark-1 u-container-style u-group u-radius u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h5 class="u-text u-text-default u-text-1">Project: <?php echo htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8'); ?></h5>
            
            <h5 class="u-text u-text-default u-text-2">Recruiters: <?php echo htmlspecialchars($_SESSION['recruiter_name'], ENT_QUOTES, 'UTF-8'); ?></h5>
        
            <form method='POST' action='Project_Recruiters.php'>
                <input type='hidden' name='project_name' value="<?php echo htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8'); ?>">
                <button type='submit'  name='pass' class="u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-1">Pass</button>

                <input type='hidden' name='project_name' value="<?php echo htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8'); ?>">
                <button type='submit' name='attend' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-2'>Attend</button>

                <input type='hidden' name='project_name' value="<?php echo htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8'); ?>">
                <button type='submit' name='fail' class="u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-3">Fail</button>
            </form>

            <form method='POST' action='Add_Applicants.html'>
                <input type='hidden' name='project_name' value="<?php echo htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8'); ?>">
                <button type='submit' id= "add" name='add' class="u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-4">Add</button>
            </form>
            
            <div class="">
              <div class="u-container-layout u-valign-bottom u-container-layout-2">
                <form action="Project_Recruiters.php" method="GET">
                  <input type="text" name="search" placeholder="Search by Applicant's Name or IC">
                  <button type="submit" name="searchBtn">Search</button>
                </form>
              </div>
            </div>
            <div class="u-border-2 u-border-grey-75 u-container-style u-group u-radius u-shape-round u-group-3">
              <div class="u-container-layout u-container-layout-3">
              <?php
              // Check if the search query is provided
              if (isset($_GET['searchBtn'])) {
                // Get the search query from the GET parameters
                $search = '%' . $_GET['search'] . '%';

                // Prepare the SQL query to search for the project name or client
                $searchQuery = "SELECT * FROM Applicants WHERE status LIKE ? OR date LIKE ? OR name LIKE ? OR IC LIKE ? OR contact_num LIKE ? OR email LIKE ?";
                // Prepare and execute the query
                try {
                    $stmt = $conn->prepare($searchQuery);

                    // Check if the preparation was successful
                    if ($stmt === false) {
                        die('Prepare failed: ' . htmlspecialchars($conn->error));
                    }

                    // Bind parameters to the placeholders
                    $stmt->bind_param("ssssss", $status, $search, $search, $search, $search, $search);

                    // Execute the statement
                    $stmt->execute();

                    // Get the result
                    $searchResult = $stmt->get_result();

                    // Check if there are any results
                    if ($searchResult->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($searchResult)) {
                              echo "<div class='u-border-3 u-border-grey-90 u-container-style u-expanded-width u-group u-radius u-shape-round u-group-1'>
                                    <div class='u-container-layout u-container-layout-1'>";      
                              echo "<table border='1' width='100%'>\n";
                              echo "<tr id='thead'>\n"
                                  . "<th scope='col'>Date</th>\n"
                                  . "<th scope='col'>Name</th>\n"
                                  . "<th scope='col'>IC</th>\n"
                                  . "<th scope='col'>Contact Number</th>\n"
                                  . "<th scope='col'>Email</th>\n"
                                  . "<th scope='col'>Project Name</th>\n"
                                  . "<th scope='col'>PIC</th>\n"
                                  . "<th scope='col'>Remark</th>\n"
                                  . "<th scope='col'>Status</th>\n"
                                  . "</tr>\n";  
                                  
                                  echo "<tr id='tbody'>\n";
                                  echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['contact_num'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['PIC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "</tr>";
                              
                                  echo "</table>\n
                                    </div>
                                  </div> ";
                            }
                    } else {
                        echo "No records found.";
                    }
                } catch (Exception $e) {
                    echo 'Query failed: ' . $e->getMessage();
                }
              }

              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                  // Retrieve and sanitize the project name from the form submission
                  if (isset($_POST['attend']) ) {
                      $project_name = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');
                      $_SESSION['status'] = "attend";

                      // Define the query
                      $attendQuery = "SELECT * FROM Applicants WHERE project = ? AND status = 'attend'";

                      // Prepare and execute the query
                      try {
                        $stmt = $conn->prepare($attendQuery);
    
                      // Check if the preparation was successful
                      if ($stmt === false) {
                          die('Prepare failed: ' . htmlspecialchars($conn->error));
                      }
                      
                      // Bind the email parameter to the placeholder
                      $stmt->bind_param("s", $project_name);
                      
                      // Execute the statement
                      $stmt->execute();
                      
                      // Get the result
                      $result = $stmt->get_result(); 

                          // Check if there are any results
                          if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              echo "<div class=''>
                                    <div class='u-container-layout u-container-layout-1'>";      
                              echo "<table border='1' width='100%'>\n";
                              echo "<tr id='thead'>\n"
                                  . "<th scope='col'>Date</th>\n"
                                  . "<th scope='col'>Name</th>\n"
                                  . "<th scope='col'>IC</th>\n"
                                  . "<th scope='col'>Contact Number</th>\n"
                                  . "<th scope='col'>Email</th>\n"
                                  . "<th scope='col'>Project Name</th>\n"
                                  . "<th scope='col'>PIC</th>\n"
                                  . "<th scope='col'>Remark</th>\n"
                                  . "<th scope='col'>Status</th>\n"
                                  . "</tr>\n";  
                                  
                                  echo "
                                  <form id='blacklistForm' method='POST' action='Blacklists.php' style='display:inline;' >
        <input type='hidden' name='blacklist' value=''>
        <button type='button' id='blacklistBtn' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-1'>Blacklist</button>
    </form>";
                                   echo "
    <script>
        document.getElementById('blacklistBtn').addEventListener('click', function() {
            if (confirm('Are you sure you want to blacklist this applicant?')) {
                document.getElementById('blacklistForm').submit();
            }
        });
    </script>
";
                              echo "
                                  <form method='POST' action='Project_Recruiters.php' style='display:inline;' >
                                    <input type='hidden' name='pass_applicant' value=". htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') .">
                                    <button type='submit' name='pass_applicant' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-2'>Pass</button>
                                  </form>

                                  <form method='POST' action='Project_Recruiters.php' style='display:inline;'>
                                    <input type='hidden' name='fail_applicant' value=". htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') .">
                                    <button type='submit' name='fail_applicant' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-3'>Fail</button>
                                  </form>
                                  <tr id='tbody'>\n";
                                 
                                  echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['contact_num'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['PIC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                  echo "</tr>";
                              
                                  echo "</table>\n
                                    </div>
                                  </div> ";
                                    }
                          } else {
                              echo "No records found.";
                          }
                      } catch (PDOException $e) {
                          echo 'Query failed: ' . $e->getMessage();
                      }
                  } 
                  
                  if (isset($_POST['pass_applicant'])) {
                      // Sanitize form inputs
                      $applicant_email = htmlspecialchars($_POST['pass_applicant'], ENT_QUOTES, 'UTF-8');
                      
                      // Check if session variables are set
                      if (!isset($_SESSION['email']) || !isset($_SESSION['project_name'])) {
                          die("Session variables not set.");
                      }
                      
                      // Sanitize session variables
                      $PIC = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
                      $project = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');

                      // Define the query
                      $updatePass = "UPDATE Applicants SET status = 'pass' WHERE email = ? AND PIC = ? AND project = ?";
                      
                      // Prepare and execute the query
                      try {
                          $stmt = $conn->prepare($updatePass);

                          // Check if the preparation was successful
                          if ($stmt === false) {
                              throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
                          }

                          // Bind parameters to the statement
                          $stmt->bind_param("sss", $applicant_email, $PIC, $project);

                          // Execute the statement
                          if ($stmt->execute()) {
                              echo "Data updated successfully.";
                          } else {
                              throw new Exception('Execution failed: ' . htmlspecialchars($stmt->error));
                          }
                      } catch (Exception $e) {
                          // Log the error or handle it gracefully
                          echo "An error occurred: " . $e->getMessage();
                      }
                  }

                  if (isset($_POST['fail_applicant'])) {
                    // Sanitize form inputs
                    $applicant_email = htmlspecialchars($_POST['fail_applicant'], ENT_QUOTES, 'UTF-8');
                    
                    // Check if session variables are set
                    if (!isset($_SESSION['email']) || !isset($_SESSION['project_name'])) {
                        die("Session variables not set.");
                    }
                    
                    // Sanitize session variables
                    $PIC = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
                    $project = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');

                    // Define the query
                    $updateFail = "UPDATE Applicants SET status = 'fail' WHERE email = ? AND PIC = ? AND project = ?";
                    
                    // Prepare and execute the query
                    try {
                        $stmt = $conn->prepare($updateFail);

                        // Check if the preparation was successful
                        if ($stmt === false) {
                            throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
                        }

                        // Bind parameters to the statement
                        $stmt->bind_param("sss", $applicant_email, $PIC, $project);

                        // Execute the statement
                        if ($stmt->execute()) {
                            echo "Data updated successfully.";
                        } else {
                            throw new Exception('Execution failed: ' . htmlspecialchars($stmt->error));
                        }
                    } catch (Exception $e) {
                        // Log the error or handle it gracefully
                        echo "An error occurred: " . $e->getMessage();
                    }
                }

                  // Retrieve and sanitize the project name from the form submission
                  if (isset($_POST['pass']) ) {
                    $project_name = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');
                    $_SESSION['status'] = "pass";

                    // Define the query
                    $attendQuery = "SELECT * FROM Applicants WHERE project = ? AND status = 'pass'";

                    // Prepare and execute the query
                    try {
                      $stmt = $conn->prepare($attendQuery);
  
                    // Check if the preparation was successful
                    if ($stmt === false) {
                        die('Prepare failed: ' . htmlspecialchars($conn->error));
                    }
                    
                    // Bind the email parameter to the placeholder
                    $stmt->bind_param("s", $project_name);
                    
                    // Execute the statement
                    $stmt->execute();
                    
                    // Get the result
                    $result = $stmt->get_result(); 

                    // Check if there are any results
                    if ($result->num_rows > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='u-border-3 u-border-grey-90 u-container-style u-expanded-width u-group u-radius u-shape-round u-group-1'>
                              <div class='u-container-layout u-container-layout-1'>";      
                        echo "<table border='1' width='100%'>\n";
                        echo "<tr id='thead'>\n"
                            . "<th scope='col'>Date</th>\n"
                            . "<th scope='col'>Name</th>\n"
                            . "<th scope='col'>IC</th>\n"
                            . "<th scope='col'>Contact Number</th>\n"
                            . "<th scope='col'>Email</th>\n"
                            . "<th scope='col'>Project Name</th>\n"
                            . "<th scope='col'>PIC</th>\n"
                            . "<th scope='col'>Remark</th>\n"
                            . "<th scope='col'>Status</th>\n"
                            . "</tr>\n";  
                            
                            echo "<tr id='tbody'>\n";
                            echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['contact_num'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['PIC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "</tr>";
                        
                            echo "</table>\n
                              </div>
                            </div> ";
                        }
                     }else {
                            echo "No records found.";
                        }
                    } catch (PDOException $e) {
                        echo 'Query failed: ' . $e->getMessage();
                    }
                }

                // Retrieve and sanitize the project name from the form submission
                if (isset($_POST['fail']) ) {
                  $project_name = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');
                  $_SESSION['status'] = "fail";

                  // Define the query
                  $attendQuery = "SELECT * FROM Applicants WHERE project = ? AND status = 'fail'";

                  // Prepare and execute the query
                  try {
                    $stmt = $conn->prepare($attendQuery);

                  // Check if the preparation was successful
                  if ($stmt === false) {
                      die('Prepare failed: ' . htmlspecialchars($conn->error));
                  }
                  
                  // Bind the email parameter to the placeholder
                  $stmt->bind_param("s", $project_name);
                  
                  // Execute the statement
                  $stmt->execute();
                  
                  // Get the result
                  $result = $stmt->get_result(); 

                      // Check if there are any results
                      if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<div class='u-border-3 u-border-grey-90 u-container-style u-expanded-width u-group u-radius u-shape-round u-group-1'>
                                <div class='u-container-layout u-container-layout-1'>";      
                          echo "<table border='1' width='100%'>\n";
                          echo "<tr id='thead'>\n"
                              . "<th scope='col'>Date</th>\n"
                              . "<th scope='col'>Name</th>\n"
                              . "<th scope='col'>IC</th>\n"
                              . "<th scope='col'>Contact Number</th>\n"
                              . "<th scope='col'>Email</th>\n"
                              . "<th scope='col'>Project Name</th>\n"
                              . "<th scope='col'>PIC</th>\n"
                              . "<th scope='col'>Remark</th>\n"
                              . "<th scope='col'>Status</th>\n"
                              . "</tr>\n";  
                              
                              echo "<tr id='tbody'>\n";
                              echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                              echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                              echo "<td>" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                              echo "<td>" . htmlspecialchars($row['contact_num'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                              echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                              echo "<td>" . htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                              echo "<td>" . htmlspecialchars($row['PIC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                              echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                              echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                              echo "</tr>";
                          
                              echo "</table>\n
                                </div>
                              </div> ";
                          }
                       }else {
                          echo "No records found.";
                      }
                  } catch (PDOException $e) {
                      echo 'Query failed: ' . $e->getMessage();
                  }
              }
              }
              ?>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1a6f">
      
    </footer>
  
</body></html>