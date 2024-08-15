<?php
session_start();
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT User.username, User.email, User.PIC, PIC.projectname 
          FROM User 
          INNER JOIN PIC ON User.email = PIC.recruiters";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Create an array to store recruiters and their projects
$recruiters = array();

while ($row = mysqli_fetch_assoc($result)) {
    $recruiterEmail = $row['username'];
    if (!isset($recruiters[$recruiterEmail])) {
        $recruiters[$recruiterEmail] = array();
    }
    $recruiters[$recruiterEmail][] = $row;
}
?>


<!DOCTYPE html>
<html lang="en" style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Recruiters</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
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
    <style>
    .switch {
        position: relative;
        display: inline-block;
        width: 34px;
        height: 20px;
    }
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
    }
    .slider:before {
        position: absolute;
        content: "";
        height: 14px;
        width: 14px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
    }
    input:checked + .slider {
        background-color: #4CAF50; /* Change background color when checked */
    }
    input:checked + .slider:before {
        transform: translateX(14px);
    }
    .slider.round {
        border-radius: 34px;
    }
    .slider.round:before {
        border-radius: 50%;
    }
    .u-container-style {
    padding: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
    border: 3px solid #000;
    border-radius: 20px; /* Adjusted for curved corners */
    background-color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.u-radius {
    border-radius: 20px !important; 

}


    .u-text-1 {
        font-size: 18px;
        font-weight: bold;
        margin: 10px 0;
    }
    .project-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin: 5px 0;
        --radius: 20px;
    }
    .u-btn {
        background-color: #f00;
        color: #fff;
        padding: 5px 10px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s;
    }
    .u-btn:hover {
        background-color: #d00;
    }

    </style>

</head>
<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en">
<header class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-clearfix u-header" id="sec-1c6a" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
    <div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
                <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                    <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                    </g></svg>
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
                    <li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="Blacklists.html" style="padding: 10px 0px;">Blacklists</a>
                        <div class="u-nav-popup">
                            <ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12">
                                <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Lists_PIC.php">Lists</a></li>
                                <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Projects.php">Projects</a></li>
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
                       
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="images/image.png" alt="" data-image-width="512" data-image-height="512">
    </div>
</header>

<section class="u-clearfix u-section-1" id="sec-a620">
    <div class="u-clearfix u-sheet u-sheet-1">
        <?php foreach ($recruiters as $recruiterName => $projects) {
            // Get the PIC status for the current recruiter
            $picStatus = $projects[0]['PIC'] === 'true' ? 'checked' : '';
        ?>
            <div class="u-border-3 u-border-grey-90 u-container-style u-expanded-width u-group u-shape-round u-group u-radius">
                <div class="u-container-layout u-container-layout-1">
                    <!-- Use the $picStatus to set the checkbox state -->
                    <label class="switch <?php echo $picStatus ? 'switch-green' : ''; ?>">
                        <input type="checkbox" id="toggle-<?php echo $recruiterName; ?>" onclick="togglePIC('<?php echo $recruiterName; ?>')" <?php echo $picStatus; ?>>
                        <span class="slider round"></span>
                    </label>
                    <h3 class="u-text u-text-default u-text-1"><?php echo $recruiterName; ?></h3>
                    <?php foreach ($projects as $project) { ?>
                        <div class="project-box">
                            <h6 class="u-text u-text-default u-text-2">- <?php echo $project['projectname']; ?></h6>
                            <form method='POST' action='Projects.php' style='display:inline;'>
                            </form>
                            <form method='POST' action='Project_Recruiters.php' style='display:inline;'>
                                <input type='hidden' name='project_name' value="<?php echo htmlspecialchars($project['projectname']); ?>">
                                <button type='submit' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-2'>View</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>


<script>
function togglePIC(recruiterName) {
    var checkbox = document.getElementById('toggle-' + recruiterName);
    var picStatus = checkbox.checked;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'toggle_pic.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // Update the checkbox state based on the response from the server
                var response = xhr.responseText.trim(); // Remove leading/trailing whitespace
                if (response === 'true' || response === 'false') {
                    console.log('PIC status updated successfully');
                    checkbox.checked = response === 'true';
                    if (response === 'true') {
                        checkbox.parentElement.classList.add('switch-green');
                    } else {
                        checkbox.parentElement.classList.remove('switch-green');
                    }
                } else {
                    console.error('Invalid response from server');
                }
            } else {
                console.error('Error updating PIC status: ' + xhr.responseText);
            }
        }
    };
    xhr.send('username=' + recruiterName + '&PIC=' + picStatus);
}
</script>

</body>
</html>

<?php $conn->close(); ?>
