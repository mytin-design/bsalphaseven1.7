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
    $studentname = isset($_POST['studentname']) ? sanitize_input($_POST['studentname']) : '';
    $regno = isset($_POST['regno']) ? sanitize_input($_POST['regno']) : '';
    $stream = isset($_POST['stream']) ? sanitize_input($_POST['stream']) : '';
    $stdgrade = isset($_POST['stdgrade']) ? sanitize_input($_POST['stdgrade']) : '';
    $healthstatus = isset($_POST['healthstatus']) ? sanitize_input($_POST['healthstatus']) : '';
    $gender = isset($_POST['gender']) ? sanitize_input($_POST['gender']) : '';
    $date = isset($_POST['date']) ? sanitize_input($_POST['date']) : '';
    $feebalance = isset($_POST['feebalance']) ? sanitize_input($_POST['feebalance']) : '';
    $parentphone = isset($_POST['parentphone']) ? sanitize_input($_POST['parentphone']) : '';
    $language = isset($_POST['language']) ? sanitize_input($_POST['language']) : '';
    $status = isset($_POST['status']) ? sanitize_input($_POST['status']) : '';
    $nationality = isset($_POST['nationality']) ? sanitize_input($_POST['nationality']) : '';
    $password = isset($_POST['password']) ? sanitize_input($_POST['password']) : '';
    $confirmpassword = isset($_POST['confirmpassword']) ? sanitize_input($_POST['confirmpassword']) : '';



    if ($studentname && $regno && $stream && $stdgrade && $healthstatus && $gender && $date && $feebalance && $parentphone && $language && $status && $nationality && $password && $confirmpassword) {
        // Add your database connection logic here if it's not already included
        require "./connect.php";

        // Check if the regno already exists in the database
        $check_query = "SELECT * FROM students WHERE username=?";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bind_param('s', $regno);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>
                    alert('regno already exists. Please choose a different regno.');
                  </script>";
        } else {

            // File upload handling
    $targetDirectory = "uploads/"; // Directory to store uploaded files
    $targetFile = $targetDirectory . basename($_FILES["profileimg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["profileimg"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (adjust the size limit as needed)
    if ($_FILES["profileimg"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats (you can adjust this as needed)
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Attempt to upload file
        if (move_uploaded_file($_FILES["profileimg"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars(basename($_FILES["profileimg"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }





            // Prepare the SQL statement using a prepared statement to prevent SQL injection
            $insert_stmt = $connect->prepare("INSERT INTO students (name, username, stream, stdgrade,healthstatus,profileimg, gender, dateofbirth, feebalance, parentphone, language, status, nationality, password)  
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            
            if ($insert_stmt) {
                
                if($password === $confirmpassword) {
                    //has password for secure storage
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Bind parameters and execute the query
                $insert_stmt->bind_param('ssssssssssssss', $studentname, $regno, $stream, $stdgrade, $healthstatus,$targetFile, $gender, $date, $feebalance, $parentphone, $language, $status, $nationality, $hashed_password);
                $insert_stmt->execute();

                // Check if the query was successful
                if ($insert_stmt->affected_rows > 0) {
                    echo "<script>
                            alert('Student Registration Successful!');
                         window.location = 'cpsmarkssystem.php';
                          </script>";
                } else {
                    echo "<script>
                            alert('Kindly try again');
                          </script>";
                }
                }else {
                    echo "<script>
                        alert('Passwords do not match');
                      </script>";
                }
            } else {
                echo "<script>
                        alert('Records do not match');
                      </script>";
            }

            // Close the statement for insertion
            $insert_stmt->close();
        }

        // Close the connection and statement for checking regno
        $check_stmt->close();
        $connect->close();
    } else {
        echo "<script>
                alert('All fields are required');
               window.location = 'cpsmarkssystem.php';
              </script>";
    }
}


?>