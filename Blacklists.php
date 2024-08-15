<?php
include "settings.php";
session_start();

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

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
    <title>Blacklists</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Blacklists.css" media="screen">
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

<section class="u-clearfix u-section-1" id="sec-bc4f">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-3 u-border-grey-90 u-container-style u-expanded-width u-group u-radius u-shape-round u-group-1">
            <div class="u-container-layout u-container-layout-1"></div>
        </div>
    </div>
</section>
<section class="u-align-center u-clearfix u-section-1" id="sec-d18b">
    <div class="u-align-left u-clearfix u-sheet u-sheet-1">
      <div class="u-table u-table-responsive u-table-1">
        <table class="u-table-entity">
          <colgroup>
            <col width="33.3%">
            <col width="33.3%">
            <col width="33.400000000000006%">
          </colgroup>
          <thead class="u-black u-table-header u-table-header-1">
            <tr style="height: 38px;">
              <th class="u-border-1 u-border-black u-table-cell">Project</th>
              <th class="u-border-1 u-border-black u-table-cell">Applicant</th>
              <th class="u-border-1 u-border-black u-table-cell">Status</th>
            </tr>
          </thead>
          <tbody class="u-table-body">
            <?php
              // Fetch the blacklisted applicants
              $query = "SELECT * FROM Blacklist";
              $result = $conn->query($query);

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo "<tr style='height: 64px;'>";
                      echo "<td class='u-border-1 u-border-grey-30 u-table-cell'>" . htmlspecialchars($row["project_name"], ENT_QUOTES, 'UTF-8') . "</td>";
                      echo "<td class='u-border-1 u-border-grey-30 u-table-cell'>" . htmlspecialchars($row["applicant_name"], ENT_QUOTES, 'UTF-8') . "</td>";
                      echo "<td class='u-border-1 u-border-grey-30 u-table-cell'>" . htmlspecialchars($row["status"], ENT_QUOTES, 'UTF-8') . "</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr style='height: 64px;'><td colspan='3' class='u-border-1 u-border-grey-30 u-table-cell'>No blacklisted applicants found.</td></tr>";
              }

              $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
            </section>

</body>
</html>