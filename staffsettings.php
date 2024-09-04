<!-- settings.php -->



<?php
        session_start();

        // Check if the user is logged in
        if (!isset($_SESSION['staffid'])) {
            // Redirect to the login page if not logged in
            header("Location: portal-login.php");
            
            exit();
        }



        // connectect to your database (replace with your credentials)
        require('./connect.php');
        // Check connectection
        if ($connect->connect_error) {
            die("connectection failed: " . $connect->connectect_error);
        }

        // Retrieve themes and colors from the database
        $sql = "SELECT * FROM staffthemes";
        $result = $connect->query($sql);

        // Close the database connectection
        $connect->close();
?>

<?php

    //CHANGE PASSWORD PROCESSOR
    require('./connect.php');
    // session_start();

    if (isset($_SESSION['staffid'])) {
        $staffId = $_SESSION['staffid'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['oldpass']) && isset($_POST['newpass'])) {
            $oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass'];

            // Retrieve the stored password hash for the user
            $stmt = $connect->prepare("SELECT password FROM staff WHERE staffid = ?");
            $stmt->bind_param('s', $staffId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $stored_password_hash = $row['password'];

                // Use password_verify() to check if the entered old password matches the stored hash
                if (password_verify($oldpass, $stored_password_hash)) {
                    // Old password is correct, proceed to hash and store the new password
                    $hashed_new_password = password_hash($newpass, PASSWORD_DEFAULT);

                    $update_stmt = $connect->prepare("UPDATE staff SET password = ? WHERE staffid = ?");
                    $update_stmt->bind_param('ss', $hashed_new_password, $staffId);
                    $update_result = $update_stmt->execute();

                    if ($update_result) {
                        //echo "Password updated successfully. You can now <a href='portal-login.php'>login</a> with your new password.";
                        echo "<script>
                                alert('Password updated successfully. You can now login with your new password.');
                                    window.location = './staffsettings.php';
                            </script>";
        


                    } else {
                        //echo "Failed to update password. Please try again.";
                        echo "<script>
                                alert('Failed to update password. Please try again.');
                                    window.location = './staffsettings.php';
                            </script>";
                    }
                    $update_stmt->close();
                } else {
                    //echo "Old password is incorrect.";
                    echo "<script>
                                alert('Old password is incorrect.');
                                    window.location = './staffsettings.php';
                            </script>";
                }
            } else {
                echo "Invalid staff ID.";
            }

            $stmt->close();
            $connect->close();
        } else {
            //echo "Invalid request.";
        }
    } else {
        echo "<script>
                alert('User not logged in. Please log in to change password.');
                window.location = './staffsettings.php';
            </script>";
    }
?>
  
  <?php

    //NAME UPDATE
    require('./connect.php'); // This assumes you have a connect.php file for DB connection setup
    //session_start();

    if (isset($_SESSION['staffid'])) {
        $staffId = $_SESSION['staffid'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usetname'])) {
            $newName = trim($_POST['usetname']);

            // Validate the new name
            if (!empty($newName)) {
                // Prepare the update statement
                $update_stmt = $connect->prepare("UPDATE staff SET name = ? WHERE staffid = ?");
                $update_stmt->bind_param('ss', $newName, $staffId);
                $update_result = $update_stmt->execute();

                if ($update_result) {
                    echo "<script>
                            alert('Name updated successfully.');
                            window.location = './staffsettings.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Failed to update name. Please try again.');
                            window.location = './staffsettings.php';
                        </script>";
                }

                $update_stmt->close();
            } else {
                echo "<script>
                        alert('Name cannot be empty.');
                        window.location = './staffsettings.php';
                    </script>";
            }

            $connect->close();
        } else {
            // echo "<script>
            //         alert('Invalid request.');
            //         window.location = './staffsettings.php';
            //     </script>";
        }
    } else {
        echo "<script>
                alert('User not logged in. Please log in to update name.');
                window.location = './staffsettings.php';
            </script>";
    }
?>

<?php
    //PHONE UPDATE
    require('./connect.php'); // This assumes you have a connect.php file for DB connection setup
   // session_start();

    if (isset($_SESSION['staffid'])) {
        $staffId = $_SESSION['staffid'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['uphone'])) {
            $newNum = trim($_POST['uphone']);

            // Validate the new name
            if (!empty($newNum)) {
                // Prepare the update statement
                $update_stmt = $connect->prepare("UPDATE staff SET phone = ? WHERE staffid = ?");
                $update_stmt->bind_param('ss', $newNum, $staffId);
                $update_result = $update_stmt->execute();

                if ($update_result) {
                    echo "<script>
                            alert('Phone Number updated successfully.');
                            window.location = './staffsettings.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Failed to update Phone Number. Please try again.');
                            window.location = './staffsettings.php';
                        </script>";
                }

                $update_stmt->close();
            } else {
                echo "<script>
                        alert('Phone Number cannot be empty.');
                        window.location = './staffsettings.php';
                    </script>";
            }

            $connect->close();
        } else {
            // echo "<script>
            //         alert('Invalid request.');
            //         window.location = './staffsettings.php';
            //     </script>";
        }
    } else {
        echo "<script>
                alert('User not logged in. Please log in to update name.');
                window.location = './staffsettings.php';
            </script>";
    }
?>

<?php
    //UPDATE EMAIL
    require('./connect.php'); // This assumes you have a connect.php file for DB connection setup
    //session_start();

    if (isset($_SESSION['staffid'])) {
        $staffId = $_SESSION['staffid'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['uemail'])) {
            $newEmail = trim($_POST['uemail']);

            // Validate the new name
            if (!empty($newEmail)) {
                // Prepare the update statement
                $update_stmt = $connect->prepare("UPDATE staff SET email = ? WHERE staffid = ?");
                $update_stmt->bind_param('ss', $newEmail, $staffId);
                $update_result = $update_stmt->execute();

                if ($update_result) {
                    echo "<script>
                            alert('Email updated successfully.');
                            window.location = './staffsettings.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Failed to update Email. Please try again.');
                            window.location = './staffsettings.php';
                        </script>";
                }

                $update_stmt->close();
            } else {
                echo "<script>
                        alert('Email cannot be empty.');
                        window.location = './staffsettings.php';
                    </script>";
            }

            $connect->close();
        } else {
            // echo "<script>
            //         alert('Invalid request.');
            //         window.location = './staffsettings.php';
            //     </script>";
        }
    } else {
        echo "<script>
                alert('User not logged in. Please log in to update name.');
                window.location = './staffsettings.php';
            </script>";
    }
?>

<?php
    //UPDATE GRADE
    require('./connect.php'); // This assumes you have a connect.php file for DB connection setup
    //session_start();

    if (isset($_SESSION['staffid'])) {
        $staffId = $_SESSION['staffid'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ugrade'])) {
            $newGrade = trim($_POST['ugrade']);

            // Validate the new name
            if (!empty($newGrade)) {
                // Prepare the update statement
                $update_stmt = $connect->prepare("UPDATE staff SET staffgrade = ? WHERE staffid = ?");
                $update_stmt->bind_param('ss', $newGrade, $staffId);
                $update_result = $update_stmt->execute();

                if ($update_result) {
                    echo "<script>
                            alert('Staff Grade updated successfully.');
                            window.location = './staffsettings.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Failed to update Staff Grade. Please try again.');
                            window.location = './staffsettings.php';
                        </script>";
                }

                $update_stmt->close();
            } else {
                echo "<script>
                        alert('Staff Grade cannot be empty.');
                        window.location = './staffsettings.php';
                    </script>";
            }

            $connect->close();
        } else {
            // echo "<script>
            //         alert('Invalid request.');
            //         window.location = './staffsettings.php';
            //     </script>";
        }
    } else {
        echo "<script>
                alert('User not logged in. Please log in to update name.');
                window.location = './staffsettings.php';
            </script>";
    }
?>

<?php
    //STREAM UPDATE
    require('./connect.php'); // This assumes you have a connect.php file for DB connection setup
    //session_start();

    if (isset($_SESSION['staffid'])) {
        $staffId = $_SESSION['staffid'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ustream'])) {
            $newStream = trim($_POST['ustream']);

            // Validate the new name
            if (!empty($newStream)) {
                // Prepare the update statement
                $update_stmt = $connect->prepare("UPDATE staff SET stream = ? WHERE staffid = ?");
                $update_stmt->bind_param('ss', $newStream, $staffId);
                $update_result = $update_stmt->execute();

                if ($update_result) {
                    echo "<script>
                            alert('Stream updated successfully.');
                            window.location = './staffsettings.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Failed to update Stream. Please try again.');
                            window.location = './staffsettings.php';
                        </script>";
                }

                $update_stmt->close();
            } else {
                echo "<script>
                        alert('Stream cannot be empty.');
                        window.location = './staffsettings.php';
                    </script>";
            }

            $connect->close();
        } else {
            // echo "<script>
            //         alert('Invalid request.');
            //         window.location = './staffsettings.php';
            //     </script>";
        }
    } else {
        echo "<script>
                alert('User not logged in. Please log in to update name.');
                window.location = './staffsettings.php';
            </script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Settings</title>
    <link rel="stylesheet" href="staffsetts.css">
    <!-- Include necessary stylesheets or libraries -->
</head>
<body id="mainSettbody">
<navbar class="navsettings">
    <div class="settnavtitlebox">
        <h1 class="navsetttitle">CPS System Settings</h1>
    </div>

    <div class="navsettinfobox">
        <div class="usericonsett" onclick="openDsetbox()">
            <img src="./images/cpslogomain.png" class="settunamepicx" width="50" alt="User Icon">
        </div>

        
        <div class="card" style="display: none;">
            <div class="card-border-top">
            </div>
            <div class="img">
                <img src="./images/cpslogomain.png" class="settunamepic" width="70" alt="Profile Picture">
            </div>
            <span> 
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

            </span>
            <p class="job">
                <span class="settsgrade">
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
                                      echo "<span style='font-size: 1.1rem' class='span-caps'>". $staffGrade. "</span>";

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
                </span> 
                <span class="settsstream">
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
                                      echo "<span style='font-size: 1.1rem' class='data-box'>Stream :" . $staffDetails['stream'] . "</span>";
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
                </span>
            </p>
            <button> 
                        <form  action="loggerout.php" method="post" style="display: inline;">
                            <input type="submit" class="cslogin" value="Logout" >
                        </form>
                </button>
        </div>

        
    </div>
</navbar>

<!--DIV for navigation panel-->
<main class="settingsMain">
    <!-- START SIDE NAV SETTINGS -->
    <!-- Contains the side nav elements -->
    <div class="sidenaviset">
        <div class="settnavtop">
                <!-- btn 1 -->
           
            <div id="setbtnDefault" class="settThemelabel settlabel white-bk" onclick="openSettings(event, 'setprofileUpdater')">
                <span class="setThemeicon">
                    <img src="./images/cpslogomain.png" width="50" alt="Theme icon">

                </span>
                <span class="setprofname setlabler">Profile</span>
            </div>
                <!-- btn 2 -->

            <div class="settThemelabel settlabel white-bk" onclick="openSettings(event, 'setdisplayUpdater')">
                <span class="setThemeicon">
                    <img src="./images/cpslogomain.png" width="50" alt="Theme icon">

                </span>
                <span class="setthemename setlabler">Display</span>
            </div>
                <!-- btn 3 -->

            <div class="settThemelabel settlabel white-bk" onclick="openSettings(event, 'setsoundUpdater')">
                <span class="setThemeicon">
                    <img src="./images/cpslogomain.png" width="50" alt="Theme icon">

                </span>
                <span class="setsoundname setlabler">Sound</span>
            </div>
                <!-- btn 4 -->

            <div class="settThemelabel settlabel white-bk" onclick="openSettings(event, 'setsecurityUpdater')">
                <span class="setThemeicon">
                    <img src="./images/cpslogomain.png" width="50" alt="Theme icon">

                </span>
                <span class="setsecurityname setlabler">Security</span>
            </div>
        </div>

        <div class="settnavbottom">
            <div class="settThemelabel settlabel white-bk">
                <span class="setThemeicon">
                    <img src="./images/cpslogomain.png" width="50" alt="Theme icon">

                </span>
                <span class="setthemename">Help</span>
            </div>

            <div class="settThemelabel settlabel white-bk" onclick="openTerms()">
                <span class="setThemeicon">
                    <img src="./images/cpslogomain.png" width="50" alt="Theme icon">

                </span>
                <span class="setthemename">Terms & Privacy</span>
            </div>
        </div>
    </div>

    <!-- END - SIDE NAV SETTINGS -->
    <div class="settmainContent">
                <!-- tabc 1 -->

            <div id="setprofileUpdater" class="setprofileUpdater settingstab ">
                <p class="tabtitle">Profile Settings</p>
                <!-- box 1 -->
                <div class="profilesettbox">
                    <div class="profpicsetbox">
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
                                                          echo '<img id="profiledash_img" style="height:5pc; width: 5pc; border-radius: 100%;"  src="' . $imgPath . '" alt="Profile Image">';
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
                        
                        <form action="./profilestaffUp.php" method="post" class="stud_upload_actions" enctype="multipart/form-data">
                        <label for="studprof_upload"  class="Btn">Edit 
                            <svg class="svg" viewBox="0 0 512 512">
                            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                        </label>
                            <!-- <label for="studprof_upload">Update</label> -->
                            <input type="file" name="profileimg" id="studprof_upload" style="display: none;">
                            <button type="submit" class="nameofsavebtn">Save</button>

                          </form>

                    </div>

                </div>

                <!-- box 2 -->

                <div class="profnamesettbox settboxout">
                        <!--Acts as a button to open the edit box -->
                    <div class="profboxinner settboxin gray-bk">
                        <div class="nameboxsett insetin">
                            <img src="./images/cpslogomain.png" alt="Icon for Name" width="25" class="iconforlabel">
                                <!-- Get name from db -->
                            <span class="nametagsett taglabel">
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
                                      echo "<p class='data-box'>Name :" . $staffDetails['name'] . "</p>";
                                      
                                      
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
                            </span>
                        </div>
                        <div class="editterboxsett">
                            <button class="Btn" onclick="opennameSet()">Edit 
                                <svg class="svg" viewBox="0 0 512 512">
                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                            </button>
                        </div>
                    </div>

                        <!--open the edit box -->
                    <div id="editboxprofName" class="editbox" style="display:none;">
                        <span class="editbox__title">Change Name</span>
                        
                        <form action="./staffsettings.php" method="POST" class="editbox__form">
                            <input required value="" name="usetname" type="text" placeholder="" />
                            <div class="flex-edbox">
                            <button type="submit" class="editbox__button">Save</button>
                            <button type="button" class="editbox__button" onclick="closenameSet()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- box 3 -->

                <div  class="phonenamesettbox settboxout">
                    <div class="phoneboxinner settboxin gray-bk">
                        <div class="phoneboxsett insetin">
                            <img src="./images/cpslogomain.png" alt="Icon for Name" width="25" class="iconforlabel">
                                <!-- Get Phone from db -->
                            <span class="phonetagsett taglabel">
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
                                      echo "<p class='data-box'>Phone :" . $staffDetails['phone'] . "</p>";

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
                            </span>
                        </div>
                        <div class="editterboxsett">
                            <button class="Btn" onclick="openphoneSet()">Edit 
                                <svg class="svg" viewBox="0 0 512 512">
                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!--open the edit box -->
                    <div id="editboxPhone" class="editbox" style="display:none;">
                        <span class="editbox__title">Change Phone Number</span>
                        
                        <form action="./staffsettings.php" method="POST" class="editbox__form">
                            <input required value="" name="uphone" type="text" placeholder="" />
                            <div class="flex-edbox">
                            <button type="submit" class="editbox__button">Save</button>
                            <button type="button" class="editbox__button" onclick="closephoneSet()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- box 4 -->

                <div class="emnamesettbox settboxout">
                    <div class="emailboxinner settboxin gray-bk">
                        <div class="emboxsett insetin">
                            <img src="./images/cpslogomain.png" alt="Icon for Name" width="25" class="iconforlabel">
                                <!-- Get email from db -->
                            <span class="emtagsett taglabel">
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
  
                                      echo "<p class='data-box'>Email: " . $staffDetails['email'] . "</p>";

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
                            </span>
                        </div>
                        <div class="editterboxsett">
                            <button class="Btn" onclick="openemailSet()">Edit 
                                <svg class="svg" viewBox="0 0 512 512">
                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!--open the edit box -->
                    <div id="editboxEmail" class="editbox" style="display:none;">
                        <span class="editbox__title">Change Email</span>
                        
                        <form action="./staffsettings.php" method="post" class="editbox__form">
                            <input required value="" name="uemail" type="email" placeholder="" />
                            <div class="flex-edbox">
                            <button type="submit" class="editbox__button">Save</button>
                            <button type="button" class="editbox__button" onclick="closeemailSet()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- box 5 -->

                <div class="gradenamesettbox  settboxout">
                    <div class="gradeboxinner settboxin gray-bk">
                        <div class="gradeboxsett insetin">
                            <img src="./images/cpslogomain.png" alt="Icon for Name" width="25" class="iconforlabel">
                                <!-- Get grade from db -->
                            <span class="gradetagsett taglabel">
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
                            </span>
                        </div>
                        <div class="editterboxsett">
                            <button class="Btn" onclick="opengradeSet()">Edit 
                                <svg class="svg" viewBox="0 0 512 512">
                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!--open the edit box -->
                    <div id="editboxGrade" class="editbox" style="display:none;">
                        <span class="editbox__title">Change Grade/Class</span>
                        
                        <form action="./staffsettings.php" method="post" class="editbox__form">
                            <input required value="" name="ugrade" type="text" placeholder="" />
                            <div class="flex-edbox">
                            <button type="submit" class="editbox__button">Save</button>
                            <button type="button" class="editbox__button" onclick="closegradeSet()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- box 6 -->


                <div class="strmnamesettbox  settboxout">
                    <div class="streamsettinner settboxin gray-bk">
                        <div class="strmboxsett insetin">
                            <img src="./images/cpslogomain.png" alt="Icon for Name" width="25" class="iconforlabel">
                                <!-- Get stream from db -->
                            <span class="strmtagsett taglabel">
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
                                      echo "<p class='data-box'>Stream: " . $staffDetails['stream'] . "</p>";
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
                            </span>
                        </div>
                        <div class="editterboxsett">
                            <button class="Btn" onclick="openstreamSet()">Edit 
                                <svg class="svg" viewBox="0 0 512 512">
                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!--open the edit box -->
                    <div id="editboxStream" class="editbox" style="display:none;">
                        <span class="editbox__title">Change Stream</span>
                        
                        <form action="./staffsettings.php" method="post" class="editbox__form">
                            <input required name="ustream" value="" type="text" placeholder="" />
                            <div class="flex-edbox">
                            <button type="submit" class="editbox__button">Save</button>
                            <button type="button" class="editbox__button" onclick="closestreamSet()">Cancel</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- box 7 -->

                <div class="passnamesettbox  settboxout">
                   <div class="passsettinner settboxin gray-bk">
                        <div class="passboxsett insetin">
                            <img src="./images/cpslogomain.png" alt="Icon for Name" width="25" class="iconforlabel">
                                <!-- Get Password from db -->
                            <span class="passtagsett taglabel">Password</span>
                        </div>
                        <div class="editterboxsett">
                            <button class="Btn" onclick="openpassSet()">Edit 
                                <svg class="svg" viewBox="0 0 512 512">
                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                            </button>
                        </div>
                   </div>

                   <!--open the edit box -->
                    <div id="editboxPass" class="editbox" style="display:none;">
                        
                    <form action="./staffsettings.php" method="post" class="editbox__form">
                        <label for="settingsOldpass" class="editbox__title">Old Password</label>
                        <input id="settingsOldpass" name="oldpass" required type="password" placeholder="Enter old password" />
                        
                        <label for="settingsNewpass" class="editbox__title">New Password</label>
                        <input id="settingsNewpass" name="newpass" required type="password" placeholder="Enter new password" />
                        
                        <div class="flex-edbox">
                            <button type="submit" class="editbox__button">Save</button>
                            <button type="button" class="editbox__button" onclick="closepassSet()">Cancel</button>
                        </div>
                    </form>

                    </div>
                </div>

            </div>
                <!-- tabc 2 -->

            <div id="setdisplayUpdater" class="setdisplayUpdater settingstab">
                <p class="tabtitle">Display & Themes</p>

                <div class="themesetbox settboxin gray-bk">
                    <div class="insetthemebox insetin">
                        <img src="./images/cpslogomain.png" width="25" alt="Theme Icon">
                        <span class="inthemesetname setlabeltitle">Toggle Theme</span>
                    </div>
                    <section title=".slideThree">
                            <!-- .slideThree -->
                        <div class="slideThree">  
                            <input type="checkbox" value="None" id="slideThree" name="check"/>
                            <label for="slideThree"></label>
                        </div>
                            <!-- end .slideThree -->
                    </section>
                </div>



                <!-- <div class="nav_pan_inner">         
                    <form action="savestaffsettings.php" method="post">
                        <label for="bkcolor">Select main theme:</label>
                        <input type="color" id="bkcolor" name="color" value="#ff0000"> 
                        
                        <label for="txtColor">Select text color:</label>
                        <input type="color" id="txtColor" name="txtcolor" value="#fff">

                        
                        <label for="centralColor">Select Central theme:</label>
                        <input type="color" id="centralColor" name="centcolor" value="#fff">


                        <label for="centralColor">Select Inner Container theme:</label>
                        <input type="color" id="centralColor" name="hwrapcolor" value="#fff">


                        <input type="submit" value="Save Preferences">
                    </form>
                </div> -->
            </div>
                <!-- tabc 3 -->

            <div id="setsoundUpdater" class="setsoundUpdater settingstab">
                <p class="tabtitle">Sound & Notifications</p>
            </div>
                <!-- tabc 4 -->

            <div id="setsecurityUpdater" class="setsecurityUpdater settingstab">
                <p class="tabtitle">Security & Privacy</p>
                <div class="gradenamesettbox  settboxout">
                    <div class="gradeboxinner settboxin gray-bk">
                        <div class="gradeboxsett insetin">
                            <img src="./images/cpslogomain.png" alt="Icon for Name" width="25" class="iconforlabel">
                                <!-- Get grade from db -->
                            <span class="gradetagsett taglabel">
                                Delete Account
                            </span>
                        </div>
                        <div class="editterboxsett">
                            <button class="Btn" onclick="opendeleteSet()"> 
                            <form  action="deleteStaffaccount.php" method="post" style="display: inline;">
                                <input type="submit" class="cslogin" value="Delete" >
                            </form>
                            </button>
                        </div>
                    </div>

                    
                    
                </div>
            </div>
            
            <div id="setTermsbox" class="setttermsnpri modal" style="display:none;">
                    <article class="modal-container">
                        <header class="modal-container-header">
                            <span class="modal-container-title">
                                <svg aria-hidden="true" height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 9V4H5v16h6.056c.328.417.724.785 1.18 1.085l1.39.915H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8v1h-7zm-2 2h9v5.949c0 .99-.501 1.916-1.336 2.465L16.5 21.498l-3.164-2.084A2.953 2.953 0 0 1 12 16.95V11zm2 5.949c0 .316.162.614.436.795l2.064 1.36 2.064-1.36a.954.954 0 0 0 .436-.795V13h-5v3.949z" fill="currentColor"></path>
                                </svg>
                                Terms and Services
                            </span>
                            <button class="icon-button" onclick="closeTerms()">
                                <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="currentColor"></path>
                                </svg>
                            </button>
                        </header>
                    <section class="modal-container-body rtf">
                        <span>Copyright - 2024 Denis King'ori (Dev King)</span>

                        <p>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:</p>
                        <p>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.</p>
                        <p>THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
                        </p>
                    </section>
                    <footer class="modal-container-footer">
                        <button class="tbutton is-ghost">Decline</button>
                        <button class="tbutton is-primary">Accept</button>
                    </footer>
                    </article>
            </div>
    </div>

</main>



        

</body>
<script src="./staffsetts.js"></script>
</html>
