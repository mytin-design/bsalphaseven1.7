<?php
// Include your connection file
require("./connect.php"); // Adjust the path as needed

// Check if the student ID parameter is set in the URL
if (isset($_GET['studentID'])) {
    $studentID = $_GET['studentID'];

    // Prepare SQL statement to fetch additional details based on the student ID
    $sql = "SELECT * FROM students WHERE username = ?";
    $stmt = $connect->prepare($sql);

    // Bind the student ID parameter to the SQL statement
    $stmt->bind_param("s", $studentID);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows > 0) {
        // Fetch the additional details
        $studentDetails = $result->fetch_assoc();

        // Close prepared statement
        $stmt->close();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Student Details</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                .container {
                    max-width: 800px;
                    margin: 20px auto;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                h2 {
                    color: #333;
                }

                .student-details {
                    margin-bottom: 20px;
                }

                .student-details p {
                    margin: 10px 0;
                }

                .backbtnbox {
                    display: flex;
                    align-items: center;
                    padding: 1pc;
                    justify-content: end;
                }

                .bckbtnbx {
                    height: 2.5pc;
                    width: 5pc;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-decoration: none;
                    background-color: #eee;
                    border-radius: .8pc;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Additional Details for Student: <?php echo $studentDetails['name']; ?></h2>
                <div class="student-details">
                    <p>Name: <?php echo $studentDetails['name']; ?></p>
                    <p>Username: <?php echo $studentDetails['username']; ?></p>
                    <p>Stream: <?php echo $studentDetails['stream']; ?></p>
                    <p>Standard Grade: <?php echo $studentDetails['stdgrade']; ?></p>
                    <p>Health Status: <?php echo $studentDetails['healthstatus']; ?></p>
                    <p>Profile Image: <?php echo $studentDetails['profileimg']; ?></p>
                    <p>Gender: <?php echo $studentDetails['gender']; ?></p>
                    <p>Date of Birth: <?php echo $studentDetails['dateofbirth']; ?></p>
                    <p>Fee Balance: <?php echo $studentDetails['feebalance']; ?></p>
                    <p>Parent Phone: <?php echo $studentDetails['parentphone']; ?></p>
                    <p>Language: <?php echo $studentDetails['language']; ?></p>
                    <p>Status: <?php echo $studentDetails['status']; ?></p>
                    <p>Nationality: <?php echo $studentDetails['nationality']; ?></p>
                    
                    <div class="backbtnbox">
                        <a href="./learnerdash.php" class="bckbtnbx">Back</a>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "<p>Student details not found for student ID: $studentID</p>";
    }
} else {
    echo "
    <script>
        alert('Invalid request. Please provide a student ID.')
        window.location.href = ''
    </script>";
}

// Close the database connection
$connect->close();
?>
