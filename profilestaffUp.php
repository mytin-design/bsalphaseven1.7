<?php
require('./connect.php');
session_start();

// Check if the user is logged in (i.e., staff_id is set in the session)
if(isset($_SESSION['staffid'])) {
    $staffId = $_SESSION['staffid'];

    // Check if the form is submitted and a file is uploaded
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profileimg'])) {
        $targetDirectory = "uploads/"; // Directory to store uploaded files
        $targetFile = $targetDirectory . basename($_FILES["profileimg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the uploaded file is an image
        $check = getimagesize($_FILES["profileimg"]["tmp_name"]);
        if ($check === false) {
            //echo "File is not an image.";
            echo "<script>
            alert('File is not an image.');
            window.location.href = './staffdashboard.php';
        </script>";
            $uploadOk = 0;
        }

        // Check file size (adjust the size limit as needed)
        if ($_FILES["profileimg"]["size"] > 5000000) {
            echo "<script>
            alert('Sorry, your file is too large.');
            window.location.href = './staffdashboard.php';
        </script>";
            //echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow only certain file formats (you can adjust this as needed)
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
                echo "<script>
            alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed');
            window.location = './staffdashboard.php';
        </script>";
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>
            alert('Sorry, your file was not uploaded.');
            window.location = './staffdashboard.php';
        </script>";
        } else {
            // Attempt to upload file
            if (move_uploaded_file($_FILES["profileimg"]["tmp_name"], $targetFile)) {
                // Update the user's profile image in the database based on staffid
                $update_query = "UPDATE staff SET profileimg = ? WHERE staffid = ?";
                $update_stmt = $connect->prepare($update_query);
                $update_stmt->bind_param('ss', $targetFile, $staffId);
                $update_stmt->execute();

                if ($update_stmt->affected_rows > 0) {
                    echo "<script>
                        alert('Profile image updated successfully.');
                        window.location = './staffdashboard.php';
                    </script>";
                } else {
                    echo "<script>
                        alert('Failed to update profile image.');
                        window.location = './staffdashboard.php';
                    </script>";
                }
                $update_stmt->close();
            } else {
                echo "<script>
                        alert('Sorry, there was an error uploading your file.');
                        window.location = './staffdashboard.php';
                    </script>";
            }
        }
    } else {
        echo "<script>
                        alert('Invalid request or no file uploaded.');
                        window.location = './staffdashboard.php';
                    </script>";
    }
} else {
    echo "<script>
            alert('User not logged in. Please log in to upload profile image.');
            window.location = './staffdashboard.php';
        </script>";
}
?>
