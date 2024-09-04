<?php
//THE SCRIPT UPLOADS ASSIGNMENTS TO BOTH assignments (teachers db) and stdassignments(students-db)

session_start();

// Check if the user is logged in
if (!isset($_SESSION['staffid'])) {
    // Redirect to the login page if not logged in
    header("Location: portal-login.php");
    exit();
}

// Check if the staff's staffid is set in the session (user is logged in)
if (isset($_SESSION['staffid'])) { 
    // Get the logged-in user's staffid from the session
    $loggedInstaffid = $_SESSION['staffid'];

    require('./connect.php');

    // Function to sanitize user inputs
    function sanitize_input($input) {
        return htmlspecialchars(trim($input));
    }

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $assignname = isset($_POST['assignname']) ? sanitize_input($_POST['assignname']) : '';
        $dateuploaded = isset($_POST['dateuploaded']) ? sanitize_input($_POST['dateuploaded']) : '';
        $assigntr = isset($_POST['assigntr']) ? sanitize_input($_POST['assigntr']) : '';
        $assigntype = isset($_POST['assigntype']) ? sanitize_input($_POST['assigntype']) : '';
        $assigngrade = isset($_POST['assigngrade']) ? sanitize_input($_POST['assigngrade']) : '';
        $assignduedate = isset($_POST['duedate']) ? sanitize_input($_POST['duedate']) : '';
        $assignintructs = isset($_POST['assignintructs']) ? sanitize_input($_POST['assignintructs']) : '';

        if ($assignname && $dateuploaded && $assigntr && $assigntype && $assigngrade && $assignduedate && $assignintructs) {
            require "./connect.php";

            // Check if the assignment already exists in the "assignments" table
            $check_query = "SELECT * FROM assignmentsnew WHERE assignname=?";
            $check_stmt = $connect->prepare($check_query);
            $check_stmt->bind_param('s', $assignname);
            $check_stmt->execute();
            $result = $check_stmt->get_result();

            // Check if the assignment already exists in the "stdassignments" table
            $check_std_query = "SELECT * FROM stdassignments WHERE assignname=?";
            $check_std_stmt = $connect->prepare($check_std_query);
            $check_std_stmt->bind_param('s', $assignname);
            $check_std_stmt->execute();
            $std_result = $check_std_stmt->get_result();

            if ($result->num_rows > 0 || $std_result->num_rows > 0) {
                echo "<script>
                        alert('Assignment already exists. Please choose a different name.');
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
                        $insert_query = "INSERT INTO assignmentsnew (staffid, assignname, dateuploaded, assigntr, assigntype, assigngrade, assignduedate, assigninstructs, assignfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $insert_stmt = $connect->prepare($insert_query);
                        $insert_stmt->bind_param('sssssssss', $loggedInstaffid, $assignname, $dateuploaded, $assigntr, $assigntype, $assigngrade, $assignduedate, $assignintructs, $targetFile);

                        // Prepare SQL to insert into stdassignments
                        $insert_std_query = "INSERT INTO stdassignments (assignname, dateuploaded, assigntr, assigntype, assigngrade, assignduedate, assigninstructs, assignfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                        $insert_std_stmt = $connect->prepare($insert_std_query);
                        $insert_std_stmt->bind_param('ssssssss', $assignname, $dateuploaded, $assigntr, $assigntype, $assigngrade, $assignduedate, $assignintructs, $targetFile);

                        // Execute both inserts
                        if ($insert_stmt->execute() && $insert_std_stmt->execute()) {
                            echo "<script>
                                    alert('Assignment Uploaded Successfully!');
                                    window.location.href = './staffdashboard.php';
                                  </script>";
                        } else {
                            echo "<script>
                                    alert('Error uploading assignment. Please try again.');
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
            echo "<script>
                    alert('All fields are required');
                    window.location.href = './staffdashboard.php';
                  </script>";
        }
    }

} else {
    echo "<p>User not logged in.</p>";
}

?>
