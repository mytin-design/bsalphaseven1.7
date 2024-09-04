<?php
// THE SCRIPT UPLOADS ASSIGNMENTS TO BOTH assignments (teachers db) and stdassignments(students-db)

session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: portal-login.php");
    exit();
}

// Get the logged-in user's username from the session
$loggedInusername = $_SESSION['username'];

require('./connect.php');

// Function to sanitize user inputs
function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debug: Print the received POST data and FILES data
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";

    $assignid = isset($_POST['assignment_id']) ? sanitize_input($_POST['assignment_id']) : '';
    $assignname = isset($_POST['assignname']) ? sanitize_input($_POST['assignname']) : '';
    $dateuploaded = isset($_POST['dateuploaded']) ? sanitize_input($_POST['dateuploaded']) : '';
    $assigntr = isset($_POST['assigntr']) ? sanitize_input($_POST['assigntr']) : '';
    $assigntype = isset($_POST['assigntype']) ? sanitize_input($_POST['assigntype']) : '';
    $assigngrade = isset($_POST['assigngrade']) ? sanitize_input($_POST['assigngrade']) : '';
    $assignduedate = isset($_POST['assignduedate']) ? sanitize_input($_POST['assignduedate']) : '';
    $assigninstructs = isset($_POST['assigninstructs']) ? sanitize_input($_POST['assigninstructs']) : '';


    // Debug: Check if all fields are populated
    if (!$assignid) echo "Assign id is missing. ";
    if (!$assignname) echo "Assign name is missing. ";
    if (!$dateuploaded) echo "Date uploaded is missing. ";
    if (!$assigntr) echo "Assign trainer is missing. ";
    if (!$assigntype) echo "Assign type is missing. ";
    if (!$assigngrade) echo "Assign grade is missing. ";
    if (!$assignduedate) echo "Assign duedate is missing. ";
    if (!$assigninstructs) echo "Assign instructs is missing. ";


    if ($assignid && $assignname && $dateuploaded && $assigntr && $assigntype && $assigngrade && $assignduedate && $assigninstructs ) {
        // Check file upload
        if (isset($_FILES["assignfile"]) && $_FILES["assignfile"]["error"] == 0) {
            // File is present
            require "./connect.php";

            // Check if the assignment already exists in the "assignments" table
            $check_query = "SELECT * FROM stdcompletedassignsnew WHERE assignname=?";
            $check_stmt = $connect->prepare($check_query);
            $check_stmt->bind_param('s', $assignname);
            $check_stmt->execute();
            $result = $check_stmt->get_result();

            // Check if the assignment already exists in the "stdassignments" table
            $check_std_query = "SELECT * FROM staffcompletedassigns WHERE assignname=?";
            $check_std_stmt = $connect->prepare($check_std_query);
            $check_std_stmt->bind_param('s', $assignname);
            $check_std_stmt->execute();
            $std_result = $check_std_stmt->get_result();

            if ($result->num_rows > 0 || $std_result->num_rows > 0) {
                echo "<script>
                        alert('Completed Assignment file already exists. Please choose a different name.');
                        window.location.href = './staffdashboard.php';
                      </script>";
            } else {
                // File upload handling
                $targetDirectory = "uploads/";
                $targetFile = $targetDirectory . basename($_FILES["assignfile"]["name"]);
                $uploadOk = 1;
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Check file validity
                if (file_exists($targetFile)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                if ($_FILES["assignfile"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["assignfile"]["tmp_name"], $targetFile)) {
                        // Prepare SQL to insert into assignments
                        $insert_query = "INSERT INTO stdcompletedassignsnew (assignment_id, username, assignname, dateuploaded, assigntr, assigntype, assigngrade, assignduedate, assigninstructs, assignfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $insert_stmt = $connect->prepare($insert_query);
                        $insert_stmt->bind_param('ssssssssss', $assignid, $loggedInusername, $assignname, $dateuploaded, $assigntr, $assigntype, $assigngrade, $assignduedate, $assigninstructs, $targetFile);

                        // Prepare SQL to insert into stdassignments
                        $insert_std_query = "INSERT INTO staffcompletedassigns (assignment_id, assignname, dateuploaded, assigntr, assigntype, assigngrade, assignduedate, assigninstructs, assignfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $insert_std_stmt = $connect->prepare($insert_std_query);
                        $insert_std_stmt->bind_param('sssssssss', $assignid, $assignname, $dateuploaded, $assigntr, $assigntype, $assigngrade, $assignduedate, $assigninstructs, $targetFile);

                        // Execute both inserts
                        if ($insert_stmt->execute() && $insert_std_stmt->execute()) {
                            echo "<script>
                                    alert('Completed Assignment Uploaded Successfully!');
                                    window.location.href = './staffdashboard.php';
                                  </script>";
                        } else {
                            echo "<script>
                                    alert('Error uploading completed assignment. Please try again.');
                                    window.location.href = './staffdashboard.php';
                                  </script>";
                        }

                        // Close statements
                        $insert_stmt->close();
                        $insert_std_stmt->close();
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }

            // Close check statements
            $check_stmt->close();
            $check_std_stmt->close();
            $connect->close();
        } else {
            echo "File is missing or not uploaded correctly.";
        }
    } else {
        echo "<script>
                alert('All fields are required');
                window.location.href = './staffdashboard.php';
              </script>";
    }
}

?>
