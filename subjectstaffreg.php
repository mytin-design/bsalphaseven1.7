<?php

//ADDS MANY SUBJECTS AT A TIME
// require('./connect.php');

// // Function to sanitize user inputs
// function sanitize_input($input) {
//     // Implement your sanitization logic here
//     // For example, you can use mysqli_real_escape_string() or other methods
//     return htmlspecialchars(trim($input));
// }

// // Check if user is logged in
// session_start();
// // if (!isset($_SESSION['staffid'])) {
// //     echo "<script>
// //             alert('Please log in before submitting subjects.');
// //             window.location = 'login.php'; // Redirect to your login page
// //           </script>";
// //     exit();
// // }

// // User is logged in, get the user ID
// $staffid = $_SESSION['staffid'];

// // Check if form is submitted
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Check if at least one row is submitted
//     // ... (Your existing code)

// // Check if at least one row is submitted
// if (isset($_POST['subjectcode'])) {
//     // Loop through the array of submitted rows
//     foreach ($_POST['subjectcode'] as $key => $subjectcode) {
//         // Sanitize and retrieve data for each row
//         $subjectcode = sanitize_input($subjectcode);
//         $subjectname = isset($_POST['subjectname'][$key]) ? sanitize_input($_POST['subjectname'][$key]) : '';
//         $class = isset($_POST['class'][$key]) ? sanitize_input($_POST['class'][$key]) : '';
//         $stream = isset($_POST['stream'][$key]) ? sanitize_input($_POST['stream'][$key]) : '';
        
//         $date = isset($_POST['date'][$key]) ? sanitize_input($_POST['date'][$key]) : '';
//         $teacher = isset($_POST['teacher'][$key]) ? sanitize_input($_POST['teacher'][$key]) : '';
//         $status = isset($_POST['status'][$key]) ? sanitize_input($_POST['status'][$key]) : '';

//         // Add your database connection logic here if it's not already included
//         require "./connect.php";

//         // Check if the subjectcode already exists for the specific user
//         $check_query = "SELECT * FROM staffsubjects WHERE staffid=? AND subjectcode=?";
//         $check_stmt = $connect->prepare($check_query);
//         $check_stmt->bind_param('ss', $staffid, $subjectcode);
//         $check_stmt->execute();
//         $result = $check_stmt->get_result();

//         if ($result->num_rows > 0) {
//             echo "<script>
//                     alert('Subject with code $subjectcode already exists for the user. Please choose a different subject code.');
//                     window.location.href = './staffdashboard.php';
//                   </script>";
//         } else {
//             // Prepare the SQL statement using a prepared statement to prevent SQL injection
//             $insert_stmt = $connect->prepare("INSERT INTO staffsubjects (staffid, subjectcode, subjectname,class, stream, date, teacher, status)  
//                                             VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

//             if ($insert_stmt) {
//                 // Bind parameters and execute the query
//                 $insert_stmt->bind_param('ssssssss', $staffid, $subjectcode, $subjectname,$class, $stream, $date, $teacher, $status);
                
//                 echo "Debug: SQL Query - " . $insert_stmt->sqlstate . "\n"; // Add this line for debugging
               
//                 $insert_stmt->execute();

//                 if ($insert_stmt->error) {
//                     echo "Debug: Database Error - " . $insert_stmt->error . "\n"; // Add this line for debugging
//                 }

//                 // Check if the query was successful
//                 if ($insert_stmt->affected_rows > 0) {
//                     echo "<script>
//                             alert('Subject Registration Successful!');
//                             window.location.href = './staffdashboard.php';
//                           </script>";
//                 } else {
//                     echo "<script>
//                             alert('Kindly try again');
//                             window.location.href = './staffdashboard.php';
//                           </script>";
//                 }
//             } else {
//                 echo "<script>
//                         alert('Error in preparing the statement for insertion.');
//                         window.location.href = './staffdashboard.php';

//                       </script>";
//             }

//             // Close the statement for insertion
//             $insert_stmt->close();
//         }

//         // Close the connection and statement for checking subjectcode
//         $check_stmt->close();
//         $connect->close();
//     }
// } else {
//     echo "<script>
//             alert('No rows submitted.');
//           </script>";
// }

// }
?>




<?php

//ADDS ONE SUBJECT AT A TIME
require('./connect.php');

// Function to sanitize user inputs
function sanitize_input($input) {
    // Implement your sanitization logic here
    // For example, you can use mysqli_real_escape_string() or other methods
    return htmlspecialchars(trim($input));
}

// Check if user is logged in
session_start();
if (!isset($_SESSION['staffid'])) {
    echo "<script>
            alert('Please log in before submitting subjects.');
            window.location = 'login.php'; // Redirect to your login page
          </script>";
    exit();
}

// User is logged in, get the user ID
$staffid = $_SESSION['staffid'];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
        // Sanitize and retrieve data for each row
        $subjectcode = isset($_POST['subjectcode']) ? sanitize_input($_POST['subjectcode']) : '';
        $subjectname = isset($_POST['subjectname']) ? sanitize_input($_POST['subjectname']) : '';
        $class = isset($_POST['class']) ? sanitize_input($_POST['class']) : '';
        $stream = isset($_POST['stream']) ? sanitize_input($_POST['stream']) : '';
        
        $date = isset($_POST['date']) ? sanitize_input($_POST['date']) : '';
        $teacher = isset($_POST['teacher']) ? sanitize_input($_POST['teacher']) : '';
        $status = isset($_POST['status']) ? sanitize_input($_POST['status']) : '';

        // Add your database connection logic here if it's not already included
        require "./connect.php";

        // Check if the subjectcode already exists for the specific user
        $check_query = "SELECT * FROM staffsubjects WHERE staffid=? AND subjectcode=?";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bind_param('ss', $staffid, $subjectcode);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>
                    alert('Subject with code $subjectcode already exists for the user. Please choose a different subject code.');
                    window.location.href = './staffdashboard.php';
                  </script>";
        } else {
            // Prepare the SQL statement using a prepared statement to prevent SQL injection
            $insert_stmt = $connect->prepare("INSERT INTO staffsubjects (staffid, subjectcode, subjectname,class, stream, date, teacher, status)  
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            if ($insert_stmt) {
                // Bind parameters and execute the query
                $insert_stmt->bind_param('ssssssss', $staffid, $subjectcode, $subjectname,$class, $stream, $date, $teacher, $status);
                
                echo "Debug: SQL Query - " . $insert_stmt->sqlstate . "\n"; // Add this line for debugging
               
                $insert_stmt->execute();

                if ($insert_stmt->error) {
                    echo "Debug: Database Error - " . $insert_stmt->error . "\n"; // Add this line for debugging
                }

                // Check if the query was successful
                if ($insert_stmt->affected_rows > 0) {
                    echo "<script>
                            alert('Subject Registration Successful!');
                            window.location.href = './staffdashboard.php';
                          </script>";
                          exit();
                } else {
                    echo "<script>
                            alert('Kindly try again');
                            window.location.href = './staffdashboard.php';
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Error in preparing the statement for insertion.');
                        window.location.href = './staffdashboard.php';

                      </script>";
            }

            // Close the statement for insertion
            $insert_stmt->close();
        }

        // Close the connection and statement for checking subjectcode
        $check_stmt->close();
        $connect->close();

}
?>
