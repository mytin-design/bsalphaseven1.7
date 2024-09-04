
<?php
session_start();


// Check if the user is logged in
if (!isset($_SESSION['staffid'])) {
  // Redirect to the login page if not logged in
  header("Location: portal-login.php");
  
  exit();
}

// Set session timeout duration (e.g., 5 minutes)
$timeout_duration = 300;

// Check if the user is already logged in
if (isset($_SESSION['last_activity'])) {
    // Calculate the session lifetime
    $elapsed_time = time() - $_SESSION['last_activity'];

    // If the elapsed time is greater than the timeout duration, destroy the session
    if ($elapsed_time > $timeout_duration) {
        session_unset();
        session_destroy();
        header("Location: portal-login.php"); // Redirect to login page
        exit();
    }
}

// Update last activity time
$_SESSION['last_activity'] = time();
?>
<?php
//session_start();



require('./connect.php'); // Include your database connection script

// Retrieve updated user preferences from the database
$staffid = $_SESSION['staffid'];
$stmt = $connect->prepare("SELECT * FROM staffsettings WHERE staffid = ?");
$stmt->bind_param('s', $staffid);
$stmt->execute();
$result = $stmt->get_result();

$userPreferences = $result->fetch_assoc(); // Fetch user preferences

$stmt->close();
$connect->close();

// Use retrieved preferences to customize the dashboard
// Example usage of retrieved preferences to style the dashboard
?>


<!-- ====User  Learner home Page====-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CPS Staff: Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:title" content="CPS Teachers: Dashboard">
        <meta property="og:image" content="https://www.presence.co.ke/ke/docs/root/images">
        <meta property="og:url" content="https://www.presence.co.ke">
        <meta name="keywords" content="Payment, Loans, Employee data, employment system, manage employee">
        <meta name="description" content="CPS monitoring monitoring and grading system">
        <link rel="stylesheet" href="./staffdash.css">
        <link rel="icon" href="./images/cpslogomain.png">
        
        <style>
                  body {
                background-color : <?php echo $userPreferences['color']; ?> !important;

              }

              * {
                color : <?php echo $userPreferences['txtcolor']; ?> !important;

              }

              .central {
                background-color : <?php echo $userPreferences['centcolor']; ?> !important;

              }

              .holdwrap {
                background-color : <?php echo $userPreferences['hwrapcolor']; ?> !important;

              }


        </style>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

     </head>
     <body>
          <main class="wrapper">
                <header class="dashboard">

                  <!--  This div houses the home icon and site name-->
                  <div class="home_box">
                      <img id="home-box-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAACXBIWXMAAAsTAAALEwEAmpwYAAAETklEQVR4nO2X0U9aVxzHTZYt2/P+gvVlyZb0L9hLuZiBBpM+mO1hjU1slvRp2cO6ey+zILi1Ahdt62wr3Ku2Si1bVrWXuuC0rjoBYZU2Llh1VrCudrJpdVMB5bucWzEqOBBI4zK+yS8c7j3nez7n+zs8UFT0f5Hn2LF3XRSlJUXGRYcKSi6fdFEURpTKKCky3nr28mETUO7i4gkC4lEoouMVFZinaayazVirq0O4qgpTp07BW1IS24INDctkF1xy+XsvBWpEoYhMVlZKIAQoUeR7qmdTlZXwKpUSrDtfySa1T6GI7U1qbUda2619kWpGc4cPmmwm7dvVQuXuVNwy2TsjFHXEJZN94i4u9mbkkck1GKaoikzad9BWeQ5wNfZ6E6ZtIxdF2f3Hj++7MNGSrY2yuj+evbBKZZR4p9qTsBCmXYCBEyfStq8oTxpJcw0ISxKgr7Q0/7+0DJTqGvhKSpIBE+3LZ1JZJyuX+3YBeijqzZ0TNRr7a2eMvJI2WOrVnDCk5oQwY+RXaYMlznLCyhfm5hBj4rtpo4VhDJaj+21I3klzTHw3WUPWEg/iRTxZszBIG6zmM6am9z++evXVnWv3Mkn6lLO/QQxZk/AHbbTCYLm5fss5hD7XKDwPAng4Pi199rv8sHX3xbUXW2Nkntos+MmBEj5krOb4UfKu1mKPOof9cf/EDAIzv2FybgGB4FP4J4K493MAVzocEcmD48OfGyy0RtP8esrTflZrfZvlhLmz9a1R56APS8t/IZ02NzcxFZxD663eDcZoBWviHVIZrRAHvJsz84sILiynrdmFFfh+mUZNY3tMbeafEJYkQNpgLScnWfl7Fdno8exT6BvaokarPTrzbCkjsCTQ8DIIA2HZFzAXLT5fkdLIBi5RKQFLafHISZ29P1dAolzgEoCERaXuemsbUMWKwkl918ahAdR3bagYkd8GLGMc9tOcE4cF8DTnBGEqAAYLCWahYOEO5qhgIcEcFSwkmKOChQT/CwmurUfwYHwanb0/oeH6bdQ02lBV3wqGE6BraIeR/xbWb76X/go8fjKPeDyeGvD35/A/CqH77ggu33DgfJMdLPH4uh11LZ242TOIYf8j/DoXRii8khmgvedHqLlmMCYBmsud0AoD0Ld5UWPz48uOMeht96G75obW0gtNQ4e05qsrHbjr9iMSjSEUXsbY9Bwa2x3Su7OXbNA0OVHd6pbW1nSMSV66Nh+0fD80jd+BNvHQXbqOofuB9IBVDXbU2EZhEBdg7FlKW+c7Z6FtGYTa3CIlfeFaF1hzC6qFAZzrDGXkUSs+k0Kounjj3wB/gL7NB+OdPzMyTdrk9jw0ll5oLU5pnI0H2VvX5gVh2QMo6spYB3Kpj87dixkciyBFxrn6qVhH9TZgebn9FRUtKsrUYnk2pWLEyjK1Y/1DfX/kA31fhIxfPMvSjxYVhKkon1Ixd46WsWIjKTLOq/lh1j8FN58Ku9gLFAAAAABJRU5ErkJggg==">
                      <a href="./staffdashboard.php" style="text-decoration: none;" class="home_title home-title-home"> Welcome, 
                          <?php
                              require('./connect.php'); // Include your database connection setup
                              //session_start();

                              // Check if the user is logged in by verifying the session
                              if (isset($_SESSION['staffid'])) {
                                  $staffId = $_SESSION['staffid'];

                                  // Prepare and execute a query to get the full name of the user
                                  $stmt = $connect->prepare("SELECT name FROM staff WHERE staffid = ?");
                                  $stmt->bind_param('s', $staffId);
                                  $stmt->execute();
                                  $result = $stmt->get_result();

                                  // Check if a result was found
                                  if ($result->num_rows > 0) {
                                      $row = $result->fetch_assoc();
                                      $fullName = htmlspecialchars($row['name']); // Sanitize output to prevent XSS

                                      // Extract the first name from the full name
                                      $nameParts = explode(' ', $fullName);
                                      $firstName = $nameParts[0];

                                      // Output the greeting
                                      echo "Hi, $firstName!";
                                  } else {
                                      echo "Hi, guest!";
                                  }

                                  // Close the statement and connection
                                  $stmt->close();
                                  $connect->close();
                              } else {
                                  echo "Hi, guest!";
                              }
                          ?>
                      </a>
                  </div>


                  <!-- Container for two buttons: a request payment and loan/advance request buttons-->
                  <div class="request_btns">
                     <!--we should have buttons if we have javascript - but let us use anchor tags so that we can link to target pages-->

                      <a href="#" id="pay_req"><abbrev title="Class Teacher">
                            <?php 
                                // Check if the staff ID is set in the session (user is logged in)
                                if (isset($_SESSION['staffid'])) {
                                  // Get the logged-in user's Staff ID from the session
                                  $loggedInStaffID = $_SESSION['staffid'];

                                  // Establish a database connection
                                  require("./connect.php");

                                  // Prepare SQL statement to fetch name based on the staff ID
                                  $sql = "SELECT staffgrade FROM staff WHERE staffid = ?";
                                  $stmt = $connect->prepare($sql);

                                  // Bind the staff ID parameter to the SQL statement
                                  $stmt->bind_param("s", $loggedInStaffID);

                                  // Execute the prepared statement
                                  $stmt->execute();

                                  // Get the result
                                  $result = $stmt->get_result();

                                  // Check if a row is returned
                                  if ($result->num_rows > 0) {
                                      // Fetch the name associated with the Staff ID
                                      $row = $result->fetch_assoc();
                                      $staffGrade = $row['staffgrade'];

                                      // Display the name of the logged-in user
                                      echo "<span class='span-caps'>". $staffGrade. "</span>";

                                      // You can use $staffName for further processing/display
                                  } else {
                                      echo "Class not found.";
                                  }

                                  // Close prepared statement and database connection
                                  $stmt->close();
                                  $connect->close();
                                } else {
                                  // If the user is not logged in, display a message or redirect to the login page
                                  echo "<p>User not logged in.</p>";
                                }
                            ?>
                          </abbrev>
                      </a>
                      <a href="#" id="loan_advance"><abbrev title="Status">

                          <?php 
                            // Check if the staff ID is set in the session (user is logged in)
                                  if (isset($_SESSION['staffid'])) {
                                    // Get the logged-in user's Staff ID from the session
                                    $loggedInStaffID = $_SESSION['staffid'];

                                    // Establish a database connection
                                    require("./connect.php");

                                    // Prepare SQL statement to fetch name based on the staff ID
                                    $sql = "SELECT status FROM staff WHERE staffid = ?";
                                    $stmt = $connect->prepare($sql);

                                    // Bind the staff ID parameter to the SQL statement
                                    $stmt->bind_param("s", $loggedInStaffID);

                                    // Execute the prepared statement
                                    $stmt->execute();

                                    // Get the result
                                    $result = $stmt->get_result();

                                    // Check if a row is returned
                                    if ($result->num_rows > 0) {
                                        // Fetch the name associated with the Staff ID
                                        $row = $result->fetch_assoc();
                                        $staffStatus = $row['status'];

                                        // Display the name of the logged-in user
                                        echo "<span class='span-caps'>". $staffStatus. "</span>";


                                        // You can use $staffName for further processing/display
                                    } else {
                                        echo "Status not found.";
                                    }

                                    // Close prepared statement and database connection
                                    $stmt->close();
                                    $connect->close();
                                  } else {
                                    // If the user is not logged in, display a message or redirect to the login page
                                    echo "<p>User not logged in.</p>";
                                  }
                          ?>
                        </abbrev>
                      </a>
                  </div>
                </header>

            
                <!--START IF: SIDE BAR FOR SCREENS > 960PX-->
                <!-- This is the side bar that houses options - or user navigation system -->
                
                <div class="options_sider">

                  <!-- In the following containers we have an icon and label that link to a respective page-->
                      <p class="padder navbar default" onclick="openSec(event, 'profile')" id="opendefault">
                                  <span class="icon" id="profile_settings_icon">
                          
                                    <!-- <img src="./images/upwork_up.jpg" width="25" alt="User" class="user_image"> -->
                                    <?php
                                        // Start the session to access session variables
                                        //session_start();

                                      if (isset($_SESSION['staffid'])) {
                                          require('./connect.php');

                                          // Retrieve the image path from the database for the logged-in user
                                          $loggedInStaffId = $_SESSION['staffid'];
                                          $getImageQuery = "SELECT profileimg FROM staff WHERE staffid = ?";
                                          $getImageStmt = $connect->prepare($getImageQuery);

                                          if ($getImageStmt) {
                                              $getImageStmt->bind_param('s', $loggedInStaffId); // Assuming staffid is a string
                                              if ($getImageStmt->execute()) {
                                                  $getImgResult = $getImageStmt->get_result();

                                                  if ($getImgResult) {
                                                      if ($getImgResult->num_rows > 0) {
                                                          $col = $getImgResult->fetch_assoc();
                                                          $imgPath = $col['profileimg'];

                                                          // Display the image in HTML
                                                          echo '<img id="profiledash_img" style="height:1.5pc; width: 1.5pc; border-radius: 100%;"  src="' . $imgPath . '" alt="Profile Image">';
                                                      } else {
                                                          echo 'Profile image not found.';
                                                      }
                                                  } else {
                                                      echo 'Error fetching image result: ' . $connect->error;
                                                  }

                                                  // Free result set
                                                  $getImgResult->free_result();
                                              } else {
                                                  echo 'Error executing image query: ' . $getImageStmt->error;
                                              }

                                              // Close database statement
                                              $getImageStmt->close();
                                          } else {
                                              echo 'Error in preparing image query: ' . $connect->error;
                                          }

                                          // Close database connection
                                          $connect->close();
                                      } else {
                                          echo 'User is not logged in.';
                                      }
                                    ?>


                                  </span>
                                  <span class="label" id="profSetLabel">My Profile</span>
                      </p>


                    <p class="padder navbar" onclick="openSec(event, 'jobs')">
                      <span class="icon" id="jobData">
                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                        </span>
                      <span class="label" id="JobDataLabel">CourseWork</span>
                    </p>    
                
                    <p class="padder navbar" onclick="openSec(event, 'community')">
                    <span class="icon" id="comnty">
                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                      </span>
                      <span class="label" id="communityLabel">Community</span>
                    </p>
    
                    <p class="padder navbar" onclick="openSec(event, 'employees')">
                    <span class="icon" id="empProg">
                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                      </span>
                    <span class="label" id="empProgLabel">Staff's Programs</span>
                    </p>
    
                    <p class="padder navbar" onclick="openSec(event, 'help')">
                      <span class="icon" id="assistUser">
                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                      </span>
                      <span class="label" id="assistUserLabel">Help</span>
                    </p>
    
                    <div class="padder navbar" onclick="logout()">
                      <span href="" class="icon" id="signOut">
                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                      </span>
                        <form  action="loggerout.php" method="post" style="display: inline;">
                          <input type="submit" class="cslogin" value="Logout" style="background-color: transparent; padding: 0 1pc; border: none;" >
                      </form>
                      <!-- <span class="label" id="signOutLabel">Sign Out</span> -->
                    </div>
    
                </div>
                <!--END IF - SIDE NAV FOR SCREENS > 9660PX-->


                <!--START IF SIDE NAV FOR SCREENS BELOW 900PX -->

                <div class="staffsideNav" id="staffsideNav">

                  <!--Close the staffsidenav -->
                  <p id="closerStaffer" class="closeStaffer" onclick="closeStaffer()">&times;</p>
                            <!-- In the following containers we have an icon and label that link to a respective page-->

                  <p class="padder navbar default" onclick="openSec(event, 'profile')" id="opendefault">
                            <span class="icon" id="profile_settings_icon">                       
                                <!-- <img src="./images/upwork_up.jpg" width="25" alt="User" class="user_image"> -->
                                <?php
                                  // Start the session to access session variables
                                  //session_start();

                                  if (isset($_SESSION['staffid'])) {
                                      require('./connect.php');

                                      // Retrieve the image path from the database for the logged-in user
                                      $loggedInStaffId = $_SESSION['staffid'];
                                      $getImageQuery = "SELECT profileimg FROM staff WHERE staffid = ?";
                                      $getImageStmt = $connect->prepare($getImageQuery);

                                      if ($getImageStmt) {
                                          $getImageStmt->bind_param('s', $loggedInStaffId); // Assuming staffid is a string
                                          if ($getImageStmt->execute()) {
                                              $getImgResult = $getImageStmt->get_result();

                                              if ($getImgResult) {
                                                  if ($getImgResult->num_rows > 0) {
                                                      $col = $getImgResult->fetch_assoc();
                                                      $imgPath = $col['profileimg'];

                                                      // Display the image in HTML
                                                      echo '<img id="profiledash_img" style="height:1.5pc; width: 1.5pc; border-radius: 100%;"  src="' . $imgPath . '" alt="Profile Image">';
                                                  } else {
                                                      echo 'Profile image not found.';
                                                  }
                                              } else {
                                                  echo 'Error fetching image result: ' . $connect->error;
                                              }

                                              // Free result set
                                              $getImgResult->free_result();
                                          } else {
                                              echo 'Error executing image query: ' . $getImageStmt->error;
                                          }

                                          // Close database statement
                                          $getImageStmt->close();
                                      } else {
                                          echo 'Error in preparing image query: ' . $connect->error;
                                      }

                                      // Close database connection
                                      $connect->close();
                                  } else {
                                      echo 'User is not logged in.';
                                  }
                                ?>
                            </span>
                            <span class="label" id="profSetLabel">My Profile</span>
                  </p>


                  <p class="padder navbar" onclick="openSec(event, 'jobs')">
                    <span class="icon" id="jobData">
                      <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                      </span>
                    <span class="label" id="JobDataLabel">CourseWork</span>
                  </p>                    
                  <p class="padder navbar" onclick="openSec(event, 'community')">
                    <span class="icon" id="comnty">
                      <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                      </span>
                    <span class="label" id="communityLabel">Community</span>
                  </p>
   
                  <p class="padder navbar" onclick="openSec(event, 'employees')">
                      <span class="icon" id="empProg">
                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                      </span>
                      <span class="label" id="empProgLabel">Learner's Programs</span>
                  </p>
   
                  <p class="padder navbar" onclick="openSec(event, 'help')">
                    <span class="icon" id="assistUser">
                      <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                        </span>
                    <span class="label" id="assistUserLabel">Help</span>
                  </p>
   
                  <div class="padder navbar" onclick="logout()">
                    <span href="" class="icon" id="signOut">
                      <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                      </span>
                        <form  action="loggerout.php" method="post" style="display: inline;">
                            <input type="submit" class="cslogin" value="Logout" style="background-color: transparent; padding: 0 1pc; border: none;" >
                        </form>
                    <!-- <span class="label" id="signOutLabel">Sign Out</span> -->
                  </div>
                </div>
                <button class="openStaffer" id="openStaffer" onclick="openStaffer()">&#9776;</button>


                <!-- END IF - SIDE NAV BELOW 900PX -->


                <!-- ================== ================ =======   CENTRAL BOX ====================== =======================-->
             

                <div class="central">
                    <!--Optimization - 11/11/2022-->
                    <!--Container holds all tab contents - holder-->
                    <!-- option on sider onclick - specified page should appear on the central holder-->
                    <!--Profile contents-->
                    <div id="profile" class="holdwrap holder profile_settings">
                    
                      <div class="profileHolder">
                          <form method="post" action="#" class="prof_pic_box">
                            <abbrev id="show_user_name" title="<?php echo $_SESSION['staffid']; ?>"><a href="#">
                                <?php
                                      // Start the session to access session variables
                                      //session_start();

                                      if (isset($_SESSION['staffid'])) {
                                          require('./connect.php');

                                          // Retrieve the image path from the database for the logged-in user
                                          $loggedInStaffId = $_SESSION['staffid'];
                                          $getImageQuery = "SELECT profileimg FROM staff WHERE staffid = ?";
                                          $getImageStmt = $connect->prepare($getImageQuery);

                                          if ($getImageStmt) {
                                              $getImageStmt->bind_param('s', $loggedInStaffId); // Assuming staffid is a string
                                              if ($getImageStmt->execute()) {
                                                  $getImgResult = $getImageStmt->get_result();

                                                  if ($getImgResult) {
                                                      if ($getImgResult->num_rows > 0) {
                                                          $col = $getImgResult->fetch_assoc();
                                                          $imgPath = $col['profileimg'];

                                                          // Display the image in HTML
                                                          echo '<img style="height:15pc; width: 15pc; border-radius: .4pc;"  src="' . $imgPath . '" alt="Profile Image">';
                                                      } else {
                                                          echo 'Profile image not found.';
                                                      }
                                                  } else {
                                                      echo 'Error fetching image result: ' . $connect->error;
                                                  }

                                                  // Free result set
                                                  $getImgResult->free_result();
                                              } else {
                                                  echo 'Error executing image query: ' . $getImageStmt->error;
                                              }

                                              // Close database statement
                                              $getImageStmt->close();
                                          } else {
                                              echo 'Error in preparing image query: ' . $connect->error;
                                          }

                                          // Close database connection
                                          $connect->close();
                                      } else {
                                          echo 'User is not logged in.';
                                      }
                                ?>                          
                              </a>
                            </abbrev>
                          </form>


                          <form action="./profilestaffUp.php" method="post" class="stud_upload_actions" enctype="multipart/form-data">
                            <label for="studprof_upload">Update</label>
                            <input type="file" name="profileimg" id="studprof_upload" style="display: none;">
                            <button type="submit" class="nameofsavebtn">Save</button>

                          </form>


                          <div class="admin_links_panel adp">
                              <a href="./staffsettings.php" role="button" class="adminpanel adpbtn" target="_blank">Admin Panel</a>
                              <a href="./cpsmarkssystem.php" target="_blank" class="adpbtn" rel="noopener noreferrer">Online system</a>
                          </div>
                      </div>
                    
                      <div class="user-info">
                        <!--THE DISPLAY CONTENT MAY DIFFER FROM THE CLASS NAMES AS THE SCRIPT IS BORROWED FROM THE ORIGINAL DASHBOARD SCRIPT -->
                          <?php
                              // Include your connection file
                              require("./connect.php"); // Adjust the path as needed

                              // Start the session to access session variables
                              //session_start();

                              // Check if the staff ID is set in the session (user is logged in)
                              if (isset($_SESSION['staffid'])) {
                                  $loggedInStaffID = $_SESSION['staffid'];

                                  // Prepare SQL statement to fetch details based on the staff ID
                                  $sql = "SELECT * FROM staff WHERE staffid = ?";
                                  $stmt = $connect->prepare($sql);

                                  // Bind the staff ID parameter to the SQL statement
                                  $stmt->bind_param("s", $loggedInStaffID);

                                  // Execute the prepared statement
                                  $stmt->execute();

                                  // Get the result
                                  $result = $stmt->get_result();

                                  // Check if a row is returned
                                  if ($result->num_rows > 0) {
                                      // Fetch the staff details
                                      $staffDetails = $result->fetch_assoc();

                                      // Display staff details if found
                                      echo "<p class='data-box'>Staff ID: " . $staffDetails['staffid'] . "</p>";
                                      echo "<p class='data-box'>Name: " . $staffDetails['name'] . "</p>";
                                      echo "<p class='data-box'>Phone: " . $staffDetails['phone'] . "</p>";
                                      echo "<p class='data-box'>Email: " . $staffDetails['email'] . "</p>";
                                      echo "<p class='data-box'>Role: " . $staffDetails['role'] . "</p>";
                                      echo "<p class='data-box'>Gender: " . $staffDetails['gender'] . "</p>";
                                      echo "<p class='data-box'>Basic Pay: " . $staffDetails['basicpay'] . "</p>";
                                      echo "<p class='data-box'>Department: " . $staffDetails['department'] . "</p>";
                                      echo "<p class='data-box'>Nationality: " . $staffDetails['nationality'] . "</p>";



                                      // echo "<p class='data-box'>" ."<a href='./thisfile.html'>View More</a>". "</p>";
                                      
                                      // Add a data attribute to the "View More" link with the student ID
                                      echo "<p class='data-box'><a href='javascript:void(0);' class='view-more-link' data-staff-id='{$loggedInStaffID}'>View More</a></p>";
                                      // Display other staff details as needed
                                  } else {
                                      echo "<p>Staff details not found for Staff ID: $loggedInStaffID</p>";
                                  }

                                  // Close prepared statement
                                  $stmt->close();
                              } else {
                                  echo "<p>User not logged in. Please log in to view the staff details.</p>";
                              }

                              // Close the database connection
                              $connect->close();
                          ?>

                            <script>
                                $(document).ready(function() {
                                    $(".view-more-link").click(function() {
                                        // Get the student ID from the data attribute
                                        var staffID = $(this).data("staff-id");

                                        // Redirect to another page with the student ID as a parameter
                                        // window.location.href = "viewstaffmore.php?staffID=" + staffID;
                                        // Open viewmore.php in a new tab
                                    window.open('viewstaffmore.php?staffID=' + staffID, '_blank');
                                    });
                                });
                            </script>
                      </div>

                    </div>

                    <!--Job description-->
                    <div id="jobs" class="holdwrap job_holder job_settings">
                          <div class="assignBtns">
                              <a href="#" class="assign_btn" id="main_assign_tab" onclick="openAssignsec(event, 'assignUpload')">Subject Registration</a>
                              <a href="#" class="assign_btn"  onclick="openAssignsec(event, 'availableAssigns')">SchoolWork</a>
                              <a href="#" class="assign_btn"  onclick="openAssignsec(event, 'completedAssigns')">Completed Assignments</a>

                          </div>
                                      
                                      
                          <!--TAB ONE - OPTIMIZED AS ON 25TH JUNE 2024-->
                                <!--SUBJECT REGISTRATION-->
                                <div class="upload_section ass_tab" id="assignUpload">                                    
                                  <h3 class="upload_sec_title">Subject Registration</h3>
                            
                                  <hr class="stuHr">
                            
                                  <div class="job_history boxer">
                                    <!--Btns for reg subjects-->                                      
                                        <div class="regsubjbtns">
                                          <button id="regstaffsubjbtnmain" class="regsubjbtn" onclick="openstregSubj(event, 'registerstaffTable')">Register</button>
                                          <button class="regsubjbtn" onclick="openstregSubj(event, 'regstaffSubjstable')">Registered</button>
                                        </div>
                                                          
                                        <div class="regContainers">                          
                                            <form id="registerstaffTable" action="subjectstaffreg.php" method="post" class="regtab upload_subj">
                                              <!-- Display for viewport > 900px -->

                                              <!-- Display for viewports < 900px AND -->

                                              <!-- Display for viewports less than 500px -->
                                              <div class="job_table smaller-view">
                                                  <!-- Start Subject No -->
                                                  <div class="table-diver-no table-diver-small">
                                                      <div>No.</div>
                                                      <div>1</div>
                                                  </div>
                                                  <!-- End Subject No -->

                                                  <!-- Start Subject Code -->
                                                  <div class="table-diver-code table-diver-small">
                                                      <div>Subj. Code</div>
                                                      <select name="subjectcode" class="exfilter sflexinp" id="subjectcode">
                                                          <option class="optionVal" value="" disabled selected>--Select Subject Code--</option>
                                                          <option class="optionVal" value="Math0G1">MATH0G1</option>
                                                          <option class="optionVal" value="Math0G2">MATH0G2</option>
                                                          <!-- Add other options here -->
                                                      </select>
                                                  </div>
                                                  <!-- End Subject Code -->

                                                  <!-- Start Subject Name -->
                                                  <div class="table-diver-subject table-diver-small">
                                                      <div>Subject Name</div>
                                                      <select name="subjectname" class="exfilter sflexinp" id="subjectname">
                                                          <option class="optionVal" value="" disabled selected>--Select Subject Name--</option>
                                                          <option class="optionVal" value="Mathematics">Mathematics</option>
                                                          <option class="optionVal" value="English">English</option>
                                                          <!-- Add other options here -->
                                                      </select>
                                                  </div>
                                                  <!-- End Subject Name -->

                                                  <!-- Start Subject Class -->
                                                  <div class="table-diver-class table-diver-small">
                                                      <div>Class</div>
                                                      <select name="class" class="exfilter sflexinp" id="class">
                                                          <option class="optionVal" value="" disabled selected>--Select Grade/Class--</option>
                                                          <option class="optionVal" value="Grade One">Grade 1</option>
                                                          <option class="optionVal" value="Grade Two">Grade 2</option>
                                                          <!-- Add other options here -->
                                                      </select>
                                                  </div>
                                                  <!-- End Subject Class -->

                                                  <!-- Start Subject Stream -->
                                                  <div class="table-diver-stream table-diver-small">
                                                      <div>Stream</div>
                                                      <select name="stream" class="exfilter sflexinp" id="stream">
                                                          <option class="optionVal" value="" disabled selected>--Select Subject Stream--</option>
                                                          <option class="optionVal" value="X">X</option>
                                                          <option class="optionVal" value="Y">Y</option>
                                                          <!-- Add other options here -->
                                                      </select>
                                                  </div>
                                                  <!-- End Subject Stream -->

                                                  <!-- Start Subject Date -->
                                                  <div class="table-diver-date table-diver-small">
                                                      <div>Date</div>
                                                      <input type="date" class="table_input" name="date" id="subjectoneupDate">
                                                  </div>
                                                  <!-- End Subject Date -->

                                                  <!-- Start Subject Teacher -->
                                                  <div class="table-diver-teacher table-diver-small">
                                                      <div>Teacher</div>
                                                      <input type="text" class="table_input" name="teacher" id="subjectoneTr">
                                                  </div>
                                                  <!-- End Subject Teacher -->

                                                  <!-- Start Subject Status -->
                                                  <div class="table-diver-status table-diver-small">
                                                      <div>Status</div>
                                                      <!-- Add status input if needed -->
                                                  </div>
                                                  <!-- End Subject Status -->

                                                  <hr class="stuHr">

                                                  <div class="upload_submitter">
                                                      <button type="submit" class="up_submitter">Submit</button>
                                                  </div>
                                              </div>
                                            </form>


                                            <div id="regstaffSubjstable" class="regtab registeredSubjects">
                                                <!--Display table for registered subjects if need be-->
                                                  <?php
                                                      //Enable error reporting
                                                      error_reporting(E_ALL);
                                                      ini_set('display_errors', 1);
                                                      
                                                      // Your include statement
                                                      include 'staffregsubjects.php';
                                                  ?> 
                                            </div>
                                        </div>
                                  </div>                   
                                </div>
                          <!--END TAB ONE - OPTIMIZED AS ON 25TH JUNE 2024-->



                          <!--TAB 2-->
                          <!--Holds available assigns, subjects taken, etc-->
                          <div class="available_assigns ass_tab" id="availableAssigns">
                                  <!-- The Job description of user -->
                                <!--DIV ONE-->
                            
                                <div class="job_title boxer">
                                  <!--This page can be dynamic - because the teacher is taking classes in diff classes-->
                                        <?php 
                                          // Check if the staff ID is set in the session (user is logged in)
                                            if (isset($_SESSION['staffid'])) {
                                              // Get the logged-in user's Staff ID from the session
                                              $loggedInStaffID = $_SESSION['staffid'];

                                              // Establish a database connection
                                              require("./connect.php");

                                              // Prepare SQL statement to fetch name based on the staff ID
                                              $sql = "SELECT staffgrade FROM staff WHERE staffid = ?";
                                              $stmt = $connect->prepare($sql);

                                              // Bind the staff ID parameter to the SQL statement
                                              $stmt->bind_param("s", $loggedInStaffID);

                                              // Execute the prepared statement
                                              $stmt->execute();

                                              // Get the result
                                              $result = $stmt->get_result();

                                              // Check if a row is returned
                                              if ($result->num_rows > 0) {
                                                  // Fetch the name associated with the Staff ID
                                                  $row = $result->fetch_assoc();
                                                  $staffGrade = $row['staffgrade'];

                                                  // Display the name of the logged-in user
                                                  echo "<p class='job-title span-caps'>$staffGrade</p>";

                                                  // You can use $staffName for further processing/display
                                              } else {
                                                  echo "Class not found.";
                                              }

                                              // Close prepared statement and database connection
                                              $stmt->close();
                                              $connect->close();
                                            } else {
                                              // If the user is not logged in, display a message or redirect to the login page
                                              echo "<p>User not logged in.</p>";
                                            }
                                        ?>
                                </div>
                          
                                <hr class="stuHr">
                                <!--SKILLS OF THE USER-->
                                <!--DIV THREE-->
                                <!--THESE SUBJECTS WILL BE ADDED HERE AUTOMATICALLY AFTER REGISTRATION-->
                                <div class="skills_section boxer">
                                  <p class="skills_title">Enrolled Subjects</p>
                                  <div class="list_of_skills">
                                      <?php 
                                        // Enable error reporting
                                        error_reporting(E_ALL);
                                        ini_set('display_errors', 1);
                                        
                                        // Your include statement
                                        include 'regstaffrecords.php';
                                      ?>
                                  </div>
                                </div>


                                <hr class="stuHr">
                                <!-- Container for tab section for notes, exams and assignments-->
                                <!--There are two containers - The first is displayed when no subject has been registered 
                                The second is displayed when a subject has been registered-->
                                <!--DIV FOUR-->

                              <div class="tabsubjSection">
                                  <div class="subj_btns_holders">
                                      <button class="subj_btn_title" id="subj_main_btn" onclick="opensubjSec(event, 'subjAnnments')">Announcements</button>
                                      <button class="subj_btn_title" onclick="opensubjSec(event, 'subjNotes')">Notes</button>
                                      <button class="subj_btn_title" onclick="opensubjSec(event, 'subjAssignments')">Assignments</button>
                                      <button class="subj_btn_title" onclick="opensubjSec(event, 'subjExams')">Exams</button>
                                      <button class="subj_btn_title" onclick="opensubjSec(event, 'subjDiscussion')">Discussion</button>
                                  </div>
                                    <!--TAB SECTIONS FOR EACH OF THE ABOVE-->
                                  <div class="subj_content_wrapper">
                                    <!--THERE are the default containers - there should be containers that hold content when available-->
                                    <div class="subj-content_one subj_content" id="subjAnnments">
                                      <h3 class="subj_content_header">Announcements</h3>
                                      
                                      <hr class="stuHr">

                                      <div class="stafftab_header">
                                        <button id="annstabBtn" class="staannsbtn" onclick="openAnnstab(event, 'availAnns')">Available Announcements</button>
                                        <button class="staannsbtn" onclick="openAnnstab(event, 'uploadAnns')">Upload Announcements</button>
                                      </div>

                                      <hr class="stuHr">


                                      <div class="subj_cont_info">
                                            <!--Two tabs for notes and uploading notes-->
                                        <div id="availAnns" class="availAnns tabforavnotes annstabcont">
                                          <!-- <p class="subj_content_text">There are currently no Announcements. </p> -->
                                          <?php //include 'announcementsrecords.php';?>
                                          <?php
                                                      //Enable error reporting
                                                      error_reporting(E_ALL);
                                                      ini_set('display_errors', 1);
                                                      
                                                      // Your include statement
                                                      include 'announcementsrecords.php';
                                                  ?> 
                                        </div>

                                        <div id="uploadAnns" class="annstabcont uploadt_section asst_tab">
                                            <h3 class="upload_sec_title">Upload Announcements</h3>
                                            <hr class="stuHr">

                                            <div class="uploader_inner">
                                                <form action="annupload.php" method="post" class="uploader_form" id="annuploaderForm" enctype="multipart/form-data">
                                                  <!--The notesid should be generated automatically-->
                                                  <div class="uploader_box annsname">
                                                    <label for="annsName">Announcement Title:</label>
                                                    <input type="text" name="annsname" class="uploader_inputter" id="annsName" placeholder="Annoucement Title">
                                                  </div>

                                                  <div class="uploader_box annsupldate">
                                                    <label for="annsuplDate">Date Uploaded:</label> 
                                                    <input type="date" name="dateuploaded" class="uploader_inputter" id="annsuplDate">
                                                  </div>

                                                  <div class="uploader_box annsauthor">
                                                    <label for="annsAuthor">Author</label>
                                                    <input type="text" name="annsauthor" class="uploader_inputter" id="annsAuthor" placeholder="Annoucement Author">
                                                  </div>

                                                  <div class="uploader_box annstype">
                                                    <label for="annsType">Type/Subject:</label>
                                                    <select class="typeselector" name="annstype" id="annsType">
                                                      <option value="none" name="noneselected">Select</option>
                                                      <option value="admin" name="admin">Admin</option>
                                                      <option value="teachingstaff" name="teachingstaff">Teaching Staff</option>
                                                      <option value="nonteachingstaff" name="nonteachingstaff">Non-Teaching Staff</option>
                                                      <option value="general" name="general">General</option>
                                                      <option value="math" name="math">Mathematics</option>
                                                      <option value="english" name="english">English</option>
                                                      <option value="kisw" name="kisw">Kiswahili</option>
                                                      <option value="science" name="science">Science & Technology</option>
                                                      <option value="socialstudies" name="socialstudies">Social Studies</option>
                                                      <option value="cre" name="cre">C.R.E</option>
                                                      <option value="integratedsci" name="integratedsci">Integrated Science</option>
                                                      <option value="pretech" name="pretech">Pre-Technical Studies</option>
                                                      <option value="artcraft" name="artcraft">Creative Arts</option>
                                                      <option value="agrinu" name="agrinu">Agriculture & Nutrition</option>
                                                    </select>
                                                  </div>

                                                  <div class="uploader_box annsgrade">
                                                    <label for="annsType">Grade:</label>
                                                    <select class="typeselector" name="annsgrade" id="annsGrade">
                                                      <option value="none" name="noneselected">Select</option>
                                                      <option value="all" name="all">All</option>
                                                      <optgroup>
                                                        <option value="pp1" name="pp1">PP1</option>
                                                        <option value="pp2" name="pp2">PP2</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade One" name="gradeone">Grade One</option>
                                                        <option value="Grade Two" name="gradetwo">Grade Two</option>
                                                        <option value="Grade Three" name="gradethree">Grade Three</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Four" name="gradefour">Grade Four</option>
                                                        <option value="Grade Five" name="gradefive">Grade Five</option>
                                                        <option value="Grade Six" name="gradesix">Grade Six</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Seven" name="gradeseven">Grade Seven</option>
                                                        <option value="Grade Eight" name="gradeeight">Grade Eight</option>
                                                        <option value="Grade Nine" name="gradenine">Grade Nine</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Ten" name="gradeten">Grade Ten</option>
                                                        <option value="Grade Eleven" name="gradeeleven">Grade Eleven</option>
                                                        <option value="Grade Twelve" name="gradetwelve">Grade Twelve</option>
                                                      </optgroup>
                                                    </select>
                                                  </div>

                                                  <div class="uploader_box annsdetails">
                                                    <label for="annsDetails">Details</label>
                                                    <textarea rows="20" cols="20" name="annsdetails" class="uploader_inputter" id="annsAuthor" placeholder="Annoucement Details"></textarea>
                                                  </div>

                                                  <div class="uploader_box anns_file">
                                                    <label for="annsFile">Upload Annoucement File</label>
                                                    <input type="file" name="annsfile" class="uploader_inputter" id="annsFile">
                                                  </div>

                                                  <hr class="stuHr">

                                                  <div class="upload_submitter">
                                                    <button type="submit" class="up_submitter">Submit</button>
                                                  </div>

                                                </form>
                                            </div>
                                        </div>

                                      </div>


                                    </div>
                
                                    <div class="subj-content_two subj_content" id="subjNotes">
                                      <h3 class="subj_content_header">Notes</h3>
                                      <hr class="stuHr">
                                      
                                      <div class="stafftab_header">
                                        <button id="notetabBtn" class="stanotebtn" onclick="openNotestab(event, 'availNotes')">Available Notes</button>
                                        <button class="stanotebtn" onclick="openNotestab(event, 'uploadNotes')">Upload Notes</button>
                                      </div>
                                      
                                      <hr class="stuHr">
                                      
                                      <div class="subj_cont_info">
                                        <!--Two tabs for notes and uploading notes-->
                                        <div id="availNotes" class="tabforavnotes notestabcont">
                                          <!-- <p class="subj_content_text">There are currently no notes.</p> -->
                                              <?php include 'notesrecords.php';?>
                                        </div>

                                        <div id="uploadNotes" class="notestabcont uploadt_section asst_tab">
                                            <h3 class="upload_sec_title">Upload Notes</h3>
                                            <hr class="stuHr">

                                            <div class="uploader_inner">
                                                <form action="./notesupload.php" method="post" class="uploader_form" id="nuploaderForm" enctype="multipart/form-data">
                                                  <!--The notesid should be generated automatically-->
                                                  <div class="uploader_box assignreg">
                                                    <label for="assignregno">Notes Name:</label>
                                                    <input type="text" name="notesname" class="uploader_inputter" id="notesName" placeholder="Notes Subject Name">
                                                  </div>

                                                  <div class="uploader_box assignName">
                                                    <label for="assignname">Date Uploaded:</label> 
                                                    <input type="date" name="dateuploaded" class="uploader_inputter" id="nuploadDate">
                                                  </div>

                                                  <div class="uploader_box assigntr">
                                                    <label for="assigntr">Subject Teacher</label>
                                                    <input type="text" name="notestr" class="uploader_inputter" id="notestr" placeholder="Subject Teacher">
                                                  </div>

                                                  <div class="uploader_box notestype">
                                                    <label for="notesType">Type/Subject:</label>
                                                    <select class="typeselector" name="notestype" id="notesType">
                                                      <option value="none" name="noneselected">Select</option>
                                                      <option value="admin" name="admin">Admin</option>
                                                      <option value="teachingstaff" name="teachingstaff">Teaching Staff</option>
                                                      <option value="nonteachingstaff" name="nonteachingstaff">Non-Teaching Staff</option>
                                                      <option value="general" name="general">General</option>
                                                      <option value="math" name="math">Mathematics</option>
                                                      <option value="english" name="english">English</option>
                                                      <option value="kisw" name="kisw">Kiswahili</option>
                                                      <option value="science" name="science">Science & Technology</option>
                                                      <option value="socialstudies" name="socialstudies">Social Studies</option>
                                                      <option value="cre" name="cre">C.R.E</option>
                                                      <option value="integratedsci" name="integratedsci">Integrated Science</option>
                                                      <option value="pretech" name="pretech">Pre-Technical Studies</option>
                                                      <option value="artcraft" name="artcraft">Creative Arts</option>
                                                      <option value="agrinu" name="agrinu">Agriculture & Nutrition</option>
                                                    </select>
                                                  </div>

                                                  <div class="uploader_box notesgrade">
                                                    <label for="notesGrade">Grade:</label>
                                                    <select class="typeselector" name="notesgrade" id="notesGrade">
                                                      <option value="none" name="noneselected">Select</option>
                                                      <optgroup>
                                                        <option value="pp1" name="pp1">PP1</option>
                                                        <option value="pp2" name="pp2">PP2</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="gradeone" name="gradeone">Grade One</option>
                                                        <option value="gradetwo" name="gradetwo">Grade Two</option>
                                                        <option value="gradethree" name="gradethree">Grade Three</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="gradefour" name="gradefour">Grade Four</option>
                                                        <option value="gradefive" name="gradefive">Grade Five</option>
                                                        <option value="gradesix" name="gradesix">Grade Six</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="gradeseven" name="gradeseven">Grade Seven</option>
                                                        <option value="gradeeight" name="gradeeight">Grade Eight</option>
                                                        <option value="gradenine" name="gradenine">Grade Nine</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="gradeten" name="gradeten">Grade Ten</option>
                                                        <option value="gradeeleven" name="gradeeleven">Grade Eleven</option>
                                                        <option value="gradetwelve" name="gradetwelve">Grade Twelve</option>
                                                      </optgroup>
                                                    </select>
                                                  </div>
                                                  
                                                
                                                  <div class="uploader_box assign_file">
                                                    <label for="assignfile">Upload Notes</label>
                                                    <input type="file" name="notesfile" class="uploader_inputter" id="assignfile">
                                                  </div>

                                                  <hr class="stuHr">

                                                  <div class="upload_submitter">
                                                    <button type="submit" class="up_submitter">Submit</button>
                                                  </div>

                                                </form>
                                            </div>
                                        </div>
                                      </div>
                                      
                                    </div>

                                    <div class="subj-content_three subj_content" id="subjAssignments">
                                      <h3 class="subj_content_header">Assignments</h3>

                                      <hr class="stuHr">

                                      <div class="stafftab_header">
                                        <button id="asstabBtn" class="staassbtn" onclick="openAsstab(event, 'availAss')">Available Assignment</button>
                                        <button class="staassbtn" onclick="openAsstab(event, 'uploadAss')">Upload Assignment</button>
                                      </div>

                                      <hr class="stuHr">


                                      <div class="subj_cont_info">
                                              <!--Two tabs for notes and uploading notes-->
                                        <div id="availAss" class="tabforavnotes asstabcont">
                                          <!-- <p class="subj_content_text">There are currently no Assignments.</p> -->
                                          <?php include 'staffassignmentrecords.php'; ?>
                                        </div>

                                        <div id="uploadAss" class="asstabcont uploadt_section asst_tab">
                                            <h3 class="upload_sec_title">Upload Assignments</h3>
                                            <hr class="stuHr">

                                            <div class="uploader_inner">
                                                <form action="./staffassignupload.php" method="post" class="assuploader_form" id="uploaderForm" enctype="multipart/form-data">
                                                  <!--The notesid should be generated automatically-->
                                                  <div class="uploader_box assignreg">
                                                    <label for="assignregno">Assignment Name:</label>
                                                    <input type="text" name="assignname" class="uploader_inputter" id="notesName" placeholder="Assignment Name">
                                                  </div>

                                                  <div class="uploader_box assignupdate">
                                                    <label for="assignUpdate">Date Uploaded:</label> 
                                                    <input type="date" name="dateuploaded" class="uploader_inputter" id="assignUpdate">
                                                  </div>

                                                  <div class="uploader_box assigntr">
                                                    <label for="assignTr">Subject Teacher</label>
                                                    <input type="text" name="assigntr" class="uploader_inputter" id="assTr" placeholder="Subject Teacher">
                                                  </div>

                                                  <div class="uploader_box assigntype">
                                                    <label for="assignType">Type/Subject:</label>
                                                    <select class="typeselector" name="assigntype" id="assignType">
                                                      <option value="none" name="noneselected">Select</option>
                                                      <option value="general" name="general">General</option>
                                                      <option value="admin" name="admin">Admin</option>
                                                      <option value="teachingstaff" name="teachingstaff">Teaching Staff</option>
                                                      <option value="nonteachingstaff" name="nonteachingstaff">Non-Teaching Staff</option>
                                                      <option value="math" name="math">Mathematics</option>
                                                      <option value="english" name="english">English</option>
                                                      <option value="kisw" name="kisw">Kiswahili</option>
                                                      <option value="science" name="science">Science & Technology</option>
                                                      <option value="socialstudies" name="socialstudies">Social Studies</option>
                                                      <option value="cre" name="cre">C.R.E</option>
                                                      <option value="integratedsci" name="integratedsci">Integrated Science</option>
                                                      <option value="pretech" name="pretech">Pre-Technical Studies</option>
                                                      <option value="artcraft" name="artcraft">Creative Arts</option>
                                                      <option value="agrinu" name="agrinu">Agriculture & Nutrition</option>
                                                    </select>
                                                  </div>

                                                  <div class="uploader_box assgrade">
                                                    <label for="assGrade">Grade:</label>
                                                    <select class="typeselector" name="assigngrade" id="assGrade">
                                                      <option value="none" name="noneselected">Select</option>
                                                      <optgroup>
                                                        <option value="PP1" name="pp1">PP1</option>
                                                        <option value="PP2" name="pp2">PP2</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade One" name="gradeone">Grade One</option>
                                                        <option value="Grade Two" name="gradetwo">Grade Two</option>
                                                        <option value="Grade Three" name="gradethree">Grade Three</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Four" name="gradefour">Grade Four</option>
                                                        <option value="Grade Five" name="gradefive">Grade Five</option>
                                                        <option value="Grade Six" name="gradesix">Grade Six</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Seven" name="gradeseven">Grade Seven</option>
                                                        <option value="Grade Eight" name="gradeeight">Grade Eight</option>
                                                        <option value="Grade Nine" name="gradenine">Grade Nine</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Ten" name="gradeten">Grade Ten</option>
                                                        <option value="Grade Eleven" name="gradeeleven">Grade Eleven</option>
                                                        <option value="Grade Twelve" name="gradetwelve">Grade Twelve</option>
                                                      </optgroup>
                                                    </select>
                                                  </div>

                                                  <div class="uploader_box assignduedate">
                                                    <label for="assignDuedate">Deadline:</label>
                                                    <input type="date" name="duedate" class="uploader_inputter" id="assignDuedate">
                                                  </div>

                                                  <div class="uploader_box assignduedate">
                                                    <label for="assignInst">Instructions:</label>
                                                    <textarea rows="20" cols="20" name="assignintructs" class="uploader_inputter" id="assignInst"></textarea>
                                                  </div>

                                                  <div class="uploader_box assign_file">
                                                    <label for="assignFile">Upload Assignment</label>
                                                    <input type="file" name="assignfile" class="uploader_inputter" id="assignFile">
                                                  </div>

                                                  <hr class="stuHr">

                                                  <div class="upload_submitter">
                                                    <button type="submit" class="up_submitter">Submit</button>
                                                  </div>
                                                </form>
                                            </div>
                                        </div>

                                      </div>
                                      
                                    </div>
                
                                    <div class="subj-content_four subj_content" id="subjExams">
                                      <h3 class="subj_content_header">Past Papers/ Exams</h3>

                                      <hr class="stuHr">

                                      <div class="stafftab_header">
                                        <button id="examtabBtn" class="staexambtn" onclick="openExamtab(event, 'availExam')">Available Exams</button>
                                        <button class="staexambtn" onclick="openExamtab(event, 'uploadExam')">Upload Exam</button>
                                      </div>

                                      <hr class="stuHr">

                                      <div class="subj_cont_info">
                                                      <!--Two tabs for notes and uploading notes-->
                                        <div id="availExam" class="tabforavnotes examtabcont">
                                          <!-- <p class="subj_content_text">There are currently no Exams.</p> -->
                                          <?php include 'pastpapersrecords.php'; ?>

                                        </div>
                                        <div id="uploadExam" class="examtabcont uploadt_section asst_tab">
                                            <h3 class="upload_sec_title">Upload Past Papers/Exams</h3>
                                            <hr class="stuHr">

                                            <div class="uploader_inner">
                                                <form action="./pastpapersupload.php" method="post" class="uploader_form" id="exuploaderForm" enctype="multipart/form-data">
                                                  <!--The notesid should be generated automatically-->
                                                  <div class="uploader_box assignreg">
                                                    <label for="examName">Exam Name:</label>
                                                    <input type="text" name="examname" class="uploader_inputter" id="examName" placeholder="Exam Name">
                                                  </div>
                                                  <div class="uploader_box examupdate">
                                                    <label for="examUpdate">Date Uploaded:</label> 
                                                    <input type="date" name="dateuploaded" class="uploader_inputter" id="examUpdate">
                                                  </div>
                                                  <div class="uploader_box examtr">
                                                    <label for="examTr">Exam Teacher</label>
                                                    <input type="text" name="examtr" class="uploader_inputter" id="examTr" placeholder="Exam Teacher">
                                                  </div>
                                                  <div class="uploader_box examtype">
                                                    <label for="examType">Type/Subject:</label>
                                                    <select class="typeselector" name="examtype" id="examType">
                                                      <option value="none" name="noneselected">Select</option>
                                                      <option value="general" name="general">General</option>
                                                      <option value="admin" name="admin">Admin</option>
                                                      <option value="teachingstaff" name="teachingstaff">Teaching Staff</option>
                                                      <option value="nonteachingstaff" name="nonteachingstaff">Non-Teaching Staff</option>
                                                      <option value="math" name="math">Mathematics</option>
                                                      <option value="english" name="english">English</option>
                                                      <option value="kisw" name="kisw">Kiswahili</option>
                                                      <option value="science" name="science">Science & Technology</option>
                                                      <option value="socialstudies" name="socialstudies">Social Studies</option>
                                                      <option value="cre" name="cre">C.R.E</option>
                                                      <option value="integratedsci" name="integratedsci">Integrated Science</option>
                                                      <option value="pretech" name="pretech">Pre-Technical Studies</option>
                                                      <option value="artcraft" name="artcraft">Creative Arts</option>
                                                      <option value="agrinu" name="agrinu">Agriculture & Nutrition</option>
                                                    </select>
                                                  </div>

                                                  <div class="uploader_box examgrade">
                                                    <label for="examGrade">Grade:</label>
                                                    <select class="typeselector" name="examgrade" id="examGrade">
                                                      <option value="none" name="noneselected">Select</option>
                                                      <optgroup>
                                                        <option value="PP1" name="pp1">PP1</option>
                                                        <option value="PP2" name="pp2">PP2</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade One" name="gradeone">Grade One</option>
                                                        <option value="Grade Two" name="gradetwo">Grade Two</option>
                                                        <option value="Grade Three" name="gradethree">Grade Three</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Four" name="gradefour">Grade Four</option>
                                                        <option value="Grade Five" name="gradefive">Grade Five</option>
                                                        <option value="Grade Six" name="gradesix">Grade Six</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Seven" name="gradeseven">Grade Seven</option>
                                                        <option value="Grade Eight" name="gradeeight">Grade Eight</option>
                                                        <option value="Grade Nine" name="gradenine">Grade Nine</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Ten" name="gradeten">Grade Ten</option>
                                                        <option value="Grade Eleven" name="gradeeleven">Grade Eleven</option>
                                                        <option value="Grade Twelve" name="gradetwelve">Grade Twelve</option>
                                                      </optgroup>
                                                    </select>
                                                  </div>
                                                  
                                                  <div class="uploader_box exam_file">
                                                    <label for="examFile">Upload Exam</label>
                                                    <input type="file" name="examfile" class="uploader_inputter" id="examFile">
                                                  </div>

                                                  <hr class="stuHr">

                                                  <div class="upload_submitter">
                                                    <button type="submit" class="up_submitter">Submit</button>
                                                  </div>

                                                </form>
                                            </div>
                                        </div>
                                      </div>
                                      
                                    </div>

                                    <div class="subj-content_five subj_content" id="subjDiscussion">
                                      <h3 class="subj_content_header">Discussion</h3>
                                      <hr class="stuHr">
                                      <div class="stafftab_header">
                                        <button id="distabBtn" class="stadisbtn" onclick="openDistab(event, 'availDis')">Available Discussion</button>
                                        <button class="stadisbtn" onclick="openDistab(event, 'uploadDis')">Upload Discussion</button>
                                      </div>

                                      <hr class="stuHr">

                                      <div class="subj_cont_info">
                                              <!--Two tabs for notes and uploading notes-->
                                        <div id="availDis" class="tabforavnotes distabcont">
                                          <p class="subj_content_text">There are currently no Discussions.</p>

                                        </div>
                                        
                                        <div id="uploadDis" class="distabcont uploadt_section asst_tab">
                                            <h3 class="upload_sec_title">Start Discussions</h3>
                                            <hr class="stuHr">

                                            <div class="uploader_inner">
                                                <form action="./discussion.php" method="post" class="uploader_form" id="disuploaderForm" enctype="multipart/form-data">
                                                  <!--The notesid should be generated automatically-->
                                                  <div class="uploader_box assignreg">
                                                    <label for="disTitle">Discussion Title:</label>
                                                    <input type="text" name="distitle" class="uploader_inputter" id="disTitle" placeholder="Discussion Title">
                                                  </div>

                                                  <div class="uploader_box disupdate">
                                                    <label for="disUpdate">Date Uploaded:</label> 
                                                    <input type="date" name="disuploaded" class="uploader_inputter" id="disUpdate">
                                                  </div>

                                                  <div class="uploader_box disauthor">
                                                    <label for="disAuthor">Discussion Author</label>
                                                    <input type="text" name="disauthor" class="uploader_inputter" id="disAuthor" placeholder="Discussion Author">
                                                  </div>

                                                  <div class="uploader_box distype">
                                                    <label for="disType">Type/Subject:</label>
                                                    <select class="typeselector" name="distype" id="disType">
                                                      <option value="none" name="noneselected">Select</option>
                                                      <option value="admin" name="admin">Admin</option>
                                                      <option value="teachingstaff" name="teachingstaff">Teaching Staff</option>
                                                      <option value="nonteachingstaff" name="nonteachingstaff">Non-Teaching Staff</option>
                                                      <option value="general" name="general">General</option>
                                                      <option value="math" name="math">Mathematics</option>
                                                      <option value="english" name="english">English</option>
                                                      <option value="kisw" name="kisw">Kiswahili</option>
                                                      <option value="science" name="science">Science & Technology</option>
                                                      <option value="socialstudies" name="socialstudies">Social Studies</option>
                                                      <option value="cre" name="cre">C.R.E</option>
                                                      <option value="integratedsci" name="integratedsci">Integrated Science</option>
                                                      <option value="pretech" name="pretech">Pre-Technical Studies</option>
                                                      <option value="artcraft" name="artcraft">Creative Arts</option>
                                                      <option value="agrinu" name="agrinu">Agriculture & Nutrition</option>
                                                    </select>
                                                  </div>


                                                  <div class="uploader_box discgrade">
                                                    <label for="discGrade">Grade:</label>
                                                    <select class="typeselector" name="discgrade" id="discGrade">
                                                      <option value="none" name="noneselected">Select</option>
                                                      <optgroup>
                                                        <option value="PP1" name="pp1">PP1</option>
                                                        <option value="PP2" name="pp2">PP2</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade One" name="gradeone">Grade One</option>
                                                        <option value="Grade Two" name="gradetwo">Grade Two</option>
                                                        <option value="Grade Three" name="gradethree">Grade Three</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Four" name="gradefour">Grade Four</option>
                                                        <option value="Grade Five" name="gradefive">Grade Five</option>
                                                        <option value="Grade Six" name="gradesix">Grade Six</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Seven" name="gradeseven">Grade Seven</option>
                                                        <option value="Grade Eight" name="gradeeight">Grade Eight</option>
                                                        <option value="Grade Nine" name="gradenine">Grade Nine</option>
                                                      </optgroup>
                                                      <optgroup>
                                                        <option value="Grade Ten" name="gradeten">Grade Ten</option>
                                                        <option value="Grade Eleven" name="gradeeleven">Grade Eleven</option>
                                                        <option value="Grade Twelve" name="gradetwelve">Grade Twelve</option>
                                                      </optgroup>
                                                    </select>
                                                  </div>


                                                  <div class="uploader_box dis_file">
                                                    <label for="disFile">Upload File</label>
                                                    <input type="file" name="disfile" class="uploader_inputter" id="disFile">
                                                  </div>
                                                  
                                                  <hr class="stuHr">

                                                  <div class="upload_submitter">
                                                    <button type="submit" class="up_submitter">Submit</button>
                                                  </div>

                                                </form>
                                            </div>
                                        </div>

                                      </div>
                                      
                                    </div>
                                  </div>
                              </div>
                            
                          </div>

                          <!--TAB 3 - COMPLETED ASSIGN'S-->
                          <div class="completed_assigns ass_tab" id="completedAssigns">
                              <!-- The Job description of user -->
                              <!--DIV ONE-->
                      
                            <div class="job_title boxer">
                                  <?php 
                                    // Check if the staff ID is set in the session (user is logged in)
                                    if (isset($_SESSION['staffid'])) {
                                      // Get the logged-in user's Staff ID from the session
                                      $loggedInStaffID = $_SESSION['staffid'];

                                      // Establish a database connection
                                      require("./connect.php");

                                      // Prepare SQL statement to fetch name based on the staff ID
                                      $sql = "SELECT staffgrade FROM staff WHERE staffid = ?";
                                      $stmt = $connect->prepare($sql);

                                      // Bind the staff ID parameter to the SQL statement
                                      $stmt->bind_param("s", $loggedInStaffID);

                                      // Execute the prepared statement
                                      $stmt->execute();

                                      // Get the result
                                      $result = $stmt->get_result();

                                      // Check if a row is returned
                                      if ($result->num_rows > 0) {
                                          // Fetch the name associated with the Staff ID
                                          $row = $result->fetch_assoc();
                                          $staffGrade = $row['staffgrade'];

                                          // Display the name of the logged-in user
                                          echo "<p class='job-title'>$staffGrade Uploaded Assignments</p>";

                                          // You can use $staffName for further processing/display
                                      } else {
                                          echo "Class not found.";
                                      }

                                      // Close prepared statement and database connection
                                      $stmt->close();
                                      $connect->close();
                                    } else {
                                      // If the user is not logged in, display a message or redirect to the login page
                                      echo "<p>User not logged in.</p>";
                                    }
                                  ?>
                            </div>
                    

                            <hr class="stuHr">
                  

                            <!-- Work history table-->
                            <!--DIV FOUR-->
                            <div class="job_history boxer">
                            
                              <div class="job_hist_table">
                                      <?php
                                          // Enable error reporting
                                          error_reporting(E_ALL);
                                          ini_set('display_errors', 1);
                                          
                                          // Your include statement
                                          //Shows student assignments temporarily
                                          include 'staffcompletedrecords.php';
                                      ?>
                              </div>
                            </div>


                          </div>
                    </div>
                                        
                    <!--START COMMUNITY TAB  -->
                  
                  
                    <!--Community-->
                    <div id="community" class="holdwrap community_settings">
                      
                      <div class="comm_nav_panel">
                        <div class="trending">
                          <a href="#" id="stucommDef" onclick="openComms(event, 'stuNews')" class="comms-btn trending_btn">
                            <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                              <span class="trending_title">Trending news</span>
                          </a>
                        </div>

                        <!--Chats -->
                        <div class="chat_box">
                          <a href="#" onclick="openComms(event, 'studDiscord')" class="comms-btn chat_box-btn">
                            <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                            <span class="chat-title">Chats</span>
                          </a>
                        </div>
                      </div>

                      <!-- trending news box-->
                      <div id="stuNews" class="stuComms news">
                        <div class="newTopic-signal">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          <span class="newTopic-title">New Topics</span>
                        </div>
                        <article class="newTopic">
                          
                          <section class="sec_one">
                            <h2>Petty cash to be saved for bi-annual trips.

                            </h2>
                            <p class="">People from various departments have been talking about petty cash and how it can be used for meaningful, or well put, memorable usage. Yes! I know what you are thinking. And luckily you are not alone. Everyone has ideas. We were hoping to schedule a meeting here on discord, on Friday afternoon, say what we feel about this. As usual if you are not around please do not complain later. We expect to have a unanimous decision from all departments. You want pancakes for breakfast, a cold cocktail in the afternoon, presents, t-shirts, trips, parties - these are all possibilities we have heard around. Now, think about it, make sure your decision wins!</p>
                          </section>
                          <section class="sec_two">
                            <h2>New mandate on employee fingerprint authentication</h2>
                            <p class="">You have probably noticed it already; technology is all around us and we intend to join this wave. We have installed multiple systems in all departments, basically improving job performance and increasing job satisfaction. Now we thought of fingerprint authentications. This is still a debatable issue and we wish to receive your input as well. We installed the system fully in the administration block, for simulation purposes. As long as you are an employee of this company, your records are registered in the database and the system will easily recognize you. Therefore, most have encountered this powerful technology already. Do you like it? Tell us in the comments section.</p>
                          </section>
                          <section class="sec_three">
                            <h2 class="">Health Clinic, Monday 12th</h2>
                            <p class="">CPS Hopsital has continuously provided services to over 10 million Kenyans and over 50 million around Africa. With the use of latest technology, and expert physicians, we continue to excel in this area. As a branch of CPS, we will receive physicians on Monday 12th <em>Coming Monday</em></p>, for checkups in the following areas. <a href="" class="eye">Eye checkup</a>, <a href="" class="ear">ear checkups</a>, <a href="" class="r-lab">routine lab checks</a>, <a href="" class="dental">dental checkups</a>, and <a href="" class="gen-body">general body checks.</a> You can bring your family members if want to, as the services are a community thing. Consider this as one way the CPS are giving back to the community and as part of this great family we would like you to take part. So bring a friend, or two. 
                          </section>
                        </article>
                      </div>


                      <!--START CHAT SYSTEM-->
                      <!--chats section - discord-->
                      <div id="studDiscord" class="stuComms discord" >
                          <div class="your-contacts">
                            <div class="recent-box cont-box">
                              <P class="favs-contacts coms-cont">Recent</P>
                                <ul class="favs">
                                      <li>
                                        <div class="userChatProf"> 
                                            <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                            <span class="userChatName">John</span>
                                        </div>
                                        <span class="o-status">
                                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                        </span>
                                      </li>
                          
                                    <li>
                                        <div class="userChatProf"> 
                                            <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                            <span class="userChatName">Hellen</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                  </li>
                          
                                    <li>
                                          <div class="userChatProf"> 
                                              <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                              <span class="userChatName">Maria</span>
                                        </div>
                                        <span class="o-status">
                                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                        </span>
                                    </li>
                                    
                                    <li>
                                        <div class="userChatProf"> 
                                            <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                            <span class="userChatName">Job</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                    </li>
                          
                                    <li>
                                        <div class="userChatProf"> 
                                            <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                            <span class="userChatName">Hostev</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                    </li>
                          
                                    <li>
                                        <div class="userChatProf"> 
                                            <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                            <span class="userChatName">Lin</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                    </li>
                          
                                    <li>
                                        <div class="userChatProf"> 
                                            <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                            <span class="userChatName">Ola</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                  </li>
                          
                                    <li>
                                        <div class="userChatProf"> 
                                            <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                            <span class="userChatName">Melanie</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                    </li>
                                
                                </ul>
                            </div>
                              <div class="other-contacts cont-box">
                                <P class="other-contacts coms-cont">Other</P>
                                <ul class="favs">
                                    <li>
                                        <div class="userChatProf"> 
                                            <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                            <span class="userChatName">John</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                    </li>
                          
                                  <li>
                                      <div class="userChatProf"> 
                                          <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                          <span class="userChatName">Hellen</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                  </li>
                          
                                  <li>
                                      <div class="userChatProf"> 
                                          <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                          <span class="userChatName">Maria</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                  </li>
                                  
                                  <li>
                                      <div class="userChatProf"> 
                                          <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                          <span class="userChatName">Job</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                  </li>
                          
                                  <li>
                                      <div class="userChatProf"> 
                                          <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                          <span class="userChatName">Hostev</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                  </li>
                          
                                  <li>
                                      <div class="userChatProf"> 
                                          <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                          <span class="userChatName">Lin</span>
                                      </div>
                                      <span class="o-status">
                                        <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                      </span>
                                  </li>
                          
                                    <li>
                                        <div class="userChatProf"> 
                                          <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                          <span class="userChatName">Ola</span>
                                        </div>
                                        <span class="o-status">
                                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                        </span>
                                    </li>
                          
                                    <li>
                                        <div class="userChatProf"> 
                                            <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                                            <span class="userChatName">Melanie</span>
                                        </div>
                                        <span class="o-status">
                                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                        </span>
                                    </li>

                                </ul>
                              </div>
                          </div>
              
                          <div class="chat-room">
                            <div class="chatroom-holder">
                              <div class="current_message_contact">
                                <img src="./images/Denis-Profile.JPG" width="50" class="img_c_user" alt="currentUserProfile" srcset="">
                                <p class="current_user_data">+254719444041</p>
                                <div class="message_actions">
                                  <abbr title="Call">
                                    <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                  </abbr>
                                    <abbr title="Video call">
                                      <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                    </abbr>
                                </div>
                              </div>
                              <div class="message-container">
                                <!--container holds chats from user and other users - message boxex--> 
                                  <div class="message-box_1 msg_box">
                                    <p class="secondary_mesg">Hey, wanna grab a drink?</p>
                                  </div>
                                  <div class="message-box_2-1 msg_box">
                                    <p class="primary_mesg">Next week on friday maybe?</p>
                                  </div><br><br><br>
                                  <div class="message-box_2-2 msg_box">
                                    <p class="primary_mesg">You look great btw :-)</p>
                                  </div><br><br><br>
                                  <div class="message-box_1-2 msg_box">
                                    <p class="secondary_mesg">Thank you! What color is my dress?</p>
                                  </div><br>
                                  <div class="message-box_2-3 msg_box">
                                    <p class="primary_mesg">blue</p>
                                  </div>
                              
                                <br><br><br>
                              </div>
                              <form method="post" action="discord.php" class="chat-actions">
                                <!--add action btn - add picture, video, file, etc-->
                                    <label for="msg-file">
                                      <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                    </label>
                                    <input type="file" name="msg-file" id="msg-file" style="display: none;">
                                <!--where user writes -->
                                  <input type="text" class="chatting-box" placeholder="Write here ...">
                        
                                  <!--send btn-->
                                  <label for="dis-btn">
                                    <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                                  </label>
                                  <button type="submit" id="dis-btn" name="dis-btn" style="display: none;">
                                    
                                  </button>
                    
                              </form>
                    
                            </div>
                            
                          </div>
                      </div>
                    </div>

                    <!--END COMMUNITY TAB  -->


                    <!--START LEARNER PROGS TAB  -->

                    <!--LEARNER programs-->
                    <div id="employees" class="holdwrap emprog_settings">
                      <div class="programs">
                        <a href="#" id="openmainSection" onclick="openSection(event, 'lgames')" class="sectioncoms games-box prog-box">Games</a>
                        <a href="#" class="welfare-box prog-box" onclick="openSection(event, 'lwelfare')" class="sectioncoms">Welfare</a>
                        <a href="#" class="health prog-box" onclick="openSection(event, 'lclubs')" class="sectioncoms">Clubs</a>
                      </div>
                      <!--These tabs open when the buttons above are clicked - they contain games, welfare, and clubs-->
                      <!--TAB FOR GAMES-->
                      <div id="lgames" class="program-items">
                        <a href="" class="previous-scores prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Previous Scores</a>
                        <a href="#" class="info prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Announcements</a>
                        <a href="#" class="incoming-games prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Coming games</a>
                        <a href="#" class="teams prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Teams</a>
                        <a href="#" class="prizes prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Prizes</a>
                        <a href="#" class="coaches prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Coaches</a>
                      </div>

                      <!--TAB FOR WELFARE-->
                      <div id="lwelfare" class="program-items">
                        <a href="" class="previous-scores prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Previous Welfare</a>
                        <a href="#" class="info prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Welfare Announcements</a>
                        <a href="#" class="incoming-games prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Coming welfare</a>
                        <a href="#" class="teams prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Welfare</a>
                        <a href="#" class="prizes prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Welfare Prizes</a>
                        <a href="#" class="coaches prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Welfare Coaches</a>
                      </div>
                      
                      <!--TAB FOR CLUBS-->
                      <div id="lclubs" class="program-items">
                        <a href="" class="previous-scores prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Previous clubs</a>
                        <a href="#" class="info prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Club Announcements</a>
                        <a href="#" class="incoming-games prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Coming clubs</a>
                        <a href="#" class="teams prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Club Teams</a>
                        <a href="#" class="prizes prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Club Prizes</a>
                        <a href="#" class="coaches prog_box">
                          <img src="./images/cpslogomain.png" width="25" alt="User" class="user_image">
                          Club Coaches</a>
                      </div>
                    

                    </div>

                    <!--END LEARNER PROGS TAB  -->


                    <!--START HELP TAB  -->

                    <!--Help-->
                    <div id="help" class="holdwrap help_page">
                      <h2 class="faq">FAQ</h2>
                      <section class="faq-questions">
                          <ol>
                            <li>
                                <details>
                                    <summary>What is the relevance of this system?</summary>
                                    <p class="">CPS payment monitoring system has your personal information, including profile, job description, payment methods and hobbies. The information helps us to know our staffs, and provide them with a way to manage this information and especially their payments. Consider this as a shelf where you can store and sort everything about your job or work.</p>
                                </details>
                            </li>

                              <li>
                                  <details>
                                      <summary>Does my profile name have to match my payment method name?</summary>
                                    <p>Yes. Your profile name and the name used on your specified payment method must be similar. The system will automatically decline your payment method, if the name is different from that of your profile.</p>
                                  </details>
                              </li>
                              <li>
                                  <details>
                                      <summary>Problem with my payment processing</summary>
                                      <p class="">Several reasons:<br> &num; System registered name and payment name do not match. Consider requesting for a name change.<br>&num; Incorrect or expired payment card, method, details. Consider recheking payment methods validity and details;  <br> &num; If you are still facing the issue, <a href="#" class="agent">Talk to an Agent</a> </p>
                                  </details>
                              </li>
                              <li>
                                  <details>
                                      <summary>Do I have to fill the job description and profile?</summary>
                                      <p class="">Once you update your name and national id or passport, the system should automatically update the rest of your information. This information is based on the information provided to us by you on registration.</p>
                                  </details>
                              </li>
                              <li>
                                  <details>
                                      <summary>What happens if I am not able to pay my loan on time?</summary>
                                    <p class="">We will automatically deduct the loaned amount from your monthly pay.</p>
                                  </details>
                              </li>
                              <li>
                                  <details>
                                      <summary>What is the relevance of the community section?</summary>
                                      <p class="">All work without play makes jack a dull boy. This section holds a community where we can share ideas, talk business, or even about our families. We are a family after all!. We have a news section and a chat system that is secure as every conversation is deleted when the chat is closed. The option to delete is your choice and can be changed in settings.  </p>
                                  </details>
                              </li>
                              <li>
                                  <details>
                                      <summary>Employee Programs?</summary>
                                      <p class="">Again, all work without play makes Hariet a dull girl. Here you access games, and co-curricular activities among other engagements with your CPS family. CPS is a family and we wish to not only grow you financialy, but also physically and emotionally.</p>
                                  </details>
                              </li>
                          </ol>
                      </section>
                      <hr>
                      <div class="more-help">
                        Having an issue?
                        <ul>
                            <li><a href="tel:+254719444041" class="gent">Talk to an Agent?</a></li>
                            <li><a href="#" class="sug">Suggestions</a></li>
                        </ul>
                    </div>
                    </div>
                  
                  
                    <!--END HELP TAB  -->

                    <!--End Tabs-->
                </div>

          </main> 
          <footer class="foo_ads"></footer>

     </body>
     <script src="staffdash.js"></script>
     <script>
        // let inactivityTime = function () {
        //     let time;

        //     // Reset timer on user activity
        //     window.onload = resetTimer;
        //     document.onmousemove = resetTimer;
        //     document.onkeypress = resetTimer;
        //     document.onscroll = resetTimer;
        //     document.onclick = resetTimer;

        //     function logout() {
        //         alert("You are being logged out due to inactivity.");
        //         // Redirect to logout page or call logout function
        //         window.location.href = 'loggerout.php'; // Adjust the path as needed
        //     }

        //     function resetTimer() {
        //         clearTimeout(time);
        //         time = setTimeout(logout, 1000000);  // 300000 ms = 5 minutes
        //     }
        // };

        // inactivityTime();
    </script>
</html>
