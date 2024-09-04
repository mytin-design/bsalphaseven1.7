<?php
// Check whether the user is logged in
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: portal-login.php");
    exit();
}

require('./connect.php');

// Function to sanitize user inputs
function sanitize_input($input) {
    // Implement your sanitization logic here
    // For example, you can use mysqli_real_escape_string() or other methods
    return htmlspecialchars(trim($input));
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve logged-in user's username
    $loggedinuser = $_SESSION['username'];

    // Sanitize form inputs
    $assignname = sanitize_input($_POST['assignname']);
    $dateuploaded = sanitize_input($_POST['dateuploaded']);
    $assigntr = sanitize_input($_POST['assigntr']);
    $assigntype = sanitize_input($_POST['assigntype']);
    $assigngrade = sanitize_input($_POST['assigngrade']);

    // Check if all required fields are filled
    if ($assignname && $dateuploaded && $assigntr && $assigntype && $assigngrade) {
        // File upload handling
        $targetDirectory = "uploads/"; // Directory to store uploaded files
        $targetFile = $targetDirectory . basename($_FILES["assignfile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "<script>
                    alert('Sorry, file already exists.');
                    window.location.href = './learnerdash.php';

                  </script>";
            $uploadOk = 0;
        }

        // Check file size (adjust the size limit as needed)
        if ($_FILES["assignfile"]["size"] > 5000000) {
            echo "<script>
                    alert('Sorry, your file is too large.');
                    window.location.href = './learnerdash.php';

                  </script>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>
                    alert('Sorry, your file was not uploaded.');
                    window.location.href = './learnerdash.php';

                  </script>";
        } else {
            // Attempt to upload file
            if (move_uploaded_file($_FILES["assignfile"]["tmp_name"], $targetFile)) {
                // File uploaded successfully, proceed with database insertion
                require "./connect.php";

                // Check if the assignment already exists in the database
                $check_query = "SELECT * FROM stdassignments WHERE assignname=?";
                $check_stmt = $connect->prepare($check_query);
                $check_stmt->bind_param('s', $assignname);
                $check_stmt->execute();
                $result = $check_stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<script>
                            alert('Assignment already exists. Please choose a different code.');
                            window.location.href = './learnerdash.php';

                          </script>";
                } else {
                    // Insert assignment details into the database
                    $insert_query = "INSERT INTO stdassignments (username, assignname, dateuploaded, assigntr, assigntype, assigngrade, assignfile)  
                                    VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $insert_stmt = $connect->prepare($insert_query);

                    if ($insert_stmt) {
                        // Bind parameters and execute the query
                        $insert_stmt->bind_param('sssssss', $loggedinuser, $assignname, $dateuploaded, $assigntr, $assigntype, $assigngrade, $targetFile);
                        $insert_stmt->execute();

                        // Check if the query was successful
                        if ($insert_stmt->affected_rows > 0) {
                            echo "<script>
                                    alert('Assignment Uploaded Successfully!');
                                    window.location.href = './learnerdash.php';
                                      
                                  </script>";
                        } else {
                            echo "<script>
                                    alert('Failed to upload assignment. Please try again.');
                                    window.location.href = './learnerdash.php';

                                  </script>";
                        }

                        // Close the statement for insertion
                        $insert_stmt->close();
                    }
                }

                // Close the connection and statement for checking assignment existence
                $check_stmt->close();
                $connect->close();
            } else {
                echo "<script>
                        alert('Sorry, there was an error uploading your file.');
                        window.location.href = './learnerdash.php';

                      </script>";
            }
        }
    } else {
        echo "<script>
                alert('All fields are required');
                window.location.href = './learnerdash.php';

              </script>";
    }
} else {
    echo "<script>
            alert('Invalid request.');
            window.location.href = './learnerdash.php';

          </script>";
}
?>
