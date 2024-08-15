<?php
include "settings.php";
session_start();

$conn = @mysqli_connect ($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Projects</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Projects.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.8.8, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": ""
        }
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Lists_PIC">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en">
<header class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-clearfix u-header" id="sec-1c6a" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
    <div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
                <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                    <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect></g></svg>
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
                    <li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="Projects.php" style="padding: 10px 0px;">Projects</a>
                        <div class="u-nav-popup">
                            <ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12">
                                <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Blacklists.html">Blacklists</a></li>
                                <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Lists_PIC.php">Lists</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="PICcontrol.php" style="padding: 10px 0px;">Recruiters</a></li>
                </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-inner-container-layout u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Projects.php">Projects</a>
                                <div class="u-nav-popup">
                                    <ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12">
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Blacklists.html">Blacklist</a></li>
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Lists.html">Lists</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="PICcontrol.php">Recruiters</a></li>
                        </ul>
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="images/image.png" alt="" data-image-width="512" data-image-height="512">
    </div>
</header>

<section class="u-clearfix u-section-1" id="sec-ba46">
    <div class="u-clearfix u-sheet u-sheet-1">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve and sanitize the project name from the form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['free_project_name'])) {
                $free_project_name = htmlspecialchars($_POST['free_project_name'], ENT_QUOTES, 'UTF-8');

                $email = $_SESSION['email'];

                // Prepare the SQL statement with a placeholder
                $addquery = "UPDATE PIC SET recruiters = ? WHERE projectname = ?";
                $stmt = $conn->prepare($addquery);
                        
                // Check if the preparation was successful
                if ($stmt === false) {
                    die('Prepare failed: ' . htmlspecialchars($conn->error));
                }
                        
                // Bind the email and project name parameters to the placeholders
                $stmt->bind_param("ss", $email, $free_project_name);
          
                // Execute the statement
                if ($stmt->execute() === false) {
                    die('Execute failed: ' . htmlspecialchars($stmt->error));
                }
            } else {
                $free_project_name = 'No project name provided';
            }
            
            if (isset($_POST['end_project_name'])) {
                $end_project_name = htmlspecialchars($_POST['end_project_name'], ENT_QUOTES, 'UTF-8');

                // Delete rows from `PIC` table
                if (!empty($end_project_name)) {
                    // Assuming multiple project names could be passed as a comma-separated string
                    $end_project_names = explode(',', $end_project_name);
                    $placeholders = implode(',', array_fill(0, count($end_project_names), '?'));

                    $endquery = "DELETE FROM `PIC` WHERE `projectname` IN ($placeholders)";
                    $sdts = $conn->prepare($endquery);

                    if ($sdts === false) {
                        die('Prepare failed: ' . htmlspecialchars($conn->error));
                    }

                    // Bind parameters dynamically
                    $types = str_repeat('s', count($end_project_names));
                    $sdts->bind_param($types, ...$end_project_names);

                    if ($sdts->execute() === false) {
                        die('Execute failed: ' . htmlspecialchars($sdts->error));
                    }

                    $sdts->close();
                        }
                    }
                }
            }
        ?>
    <?php
    $email = $_SESSION['email'];

    // Prepare the SQL statement with a placeholder
    $query = "SELECT * FROM PIC WHERE recruiters = ?";
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
    
    // Check if there are any results
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $SESSION['projectName'] = $row['projectname'];

            echo "<div class='u-border-3 u-border-grey-90 u-container-style u-expanded-width u-group u-radius u-shape-round u-group-2'>
                    <div class='u-container-layout u-container-layout-1'>
                        <h2 class='u-text u-text-1'>Project name:" . htmlspecialchars($row['projectname'])."</h2>
                        <form method='POST' action='Projects.php' style='display:inline;'>
                            <input type='hidden' name='end_project_name' value=".htmlspecialchars($row['projectname']).">
                            <button type='submit' name='email' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-1'>End</button>
                            <input type='hidden' name='project_name' value=".htmlspecialchars($row['projectname']).">
                            <button type='submit' formaction='Project_Recruiters.php' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-2'>View</button>
                        </form>
                    </div>
                </div>";
        }
    }
    ?>

    <?php
    $emptyQuery = "SELECT * FROM PIC WHERE recruiters = ''";
    $result = mysqli_query($conn, $emptyQuery);

    // Check if there are any results
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='u-border-3 u-border-grey-90 u-container-style u-expanded-width u-group u-radius u-shape-round u-group-2'>
            <div class='u-container-layout u-container-layout-2'>
              <h2 class='u-text u-text-2'>Project name: " . htmlspecialchars($row['projectname']) . "</h2>
                <form method='POST' action='Projects.php' style='display:inline;'>
                    <input type='hidden' name='free_project_name' value=".htmlspecialchars($row['projectname']).">
                    <button type='submit' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-3'>Accept</button>
                </form>
            </div>
          </div>";
        }
    }
    ?>
    </div>
  </section>

</body>
</html>
