<!--GETS assessment no. and name, and grades and auploads them to grades table grades -->

<?php
require('./connect.php');

// Function to sanitize user inputs
function sanitize_input($input) {
    // Implement your sanitization logic here
    // For example, you can use mysqli_real_escape_string() or other methods
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
        // Add your database connection logic here if it's not already included
        require "./connect.php";

        // Check if the regno already exists in the database
        $check_query = "SELECT * FROM assignments WHERE assignname=?";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bind_param('s', $assignname);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>
                    alert('Assignment already exists. Please choose a different name.');
                    window.location.href = './staffdashboard.php';
                  </script>";
        } else {

                       



            // Prepare the SQL statement using a prepared statement to prevent SQL injection
            $insert_stmt = $connect->prepare("INSERT INTO assignments (assignname, dateuploaded, assigntr, assigntype, assigngrade, assignduedate, assigninstructs, assignfile)  
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            
            if ($insert_stmt) {
                
                
                // Bind parameters and execute the query
                $insert_stmt->bind_param('ssssssss', $assignname, $dateuploaded, $assigntr, $assigntype, $assigngrade, $assignduedate, $assignintructs, $targetFile);
                $insert_stmt->execute();

                // Check if the query was successful
                if ($insert_stmt->affected_rows > 0) {
                    echo "<script>
                            alert('Assignment Uploaded Successful!');
                            window.location.href = './staffdashboard.php';

                          </script>";
                } else {
                    echo "<script>
                            alert('Kindly try again');
                            window.location.href = './staffdashboard.php';

                          </script>";
                
                } 

            // Close the statement for insertion
            $insert_stmt->close();
            }
        }

        // Close the connection and statement for checking regno
        $check_stmt->close();
        $connect->close();
    } else {
        echo "<script>
                alert('All fields are required');
                window.location.href = './staffdashboard.php';

              </script>";
    }
}


?>