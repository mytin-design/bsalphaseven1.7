<?php
// Include your connection file
require("./connect.php"); // Adjust the path as needed

// Check if the staff ID parameter is set in the URL
if (isset($_GET['staffID'])) {
    $staffID = $_GET['staffID'];

    // Prepare SQL statement to fetch additional details based on the staff ID
    $sql = "SELECT * FROM staff WHERE staffid = ?";
    $stmt = $connect->prepare($sql);

    // Bind the staff ID parameter to the SQL statement
    $stmt->bind_param("s", $staffID);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows > 0) {
        // Fetch the additional details
        $staffDetails = $result->fetch_assoc();

        // Close prepared statement
        $stmt->close();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Staff Details</title>
            <link rel="stylesheet" href="./staffdash.css">
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

                .staff-details {
                    margin-bottom: 20px;
                }

                .staff-details p {
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

                @media screen and (max-width: 900px) {
                    max-width: unset;
                        max-width: 700px;
                        width: auto;
                }

                @media screen and (max-width: 600px) {
                    max-width: unset;
                        max-width: 500px;
                        width: auto;
                }

                @media screen and (max-width: 500px) {
                    .container {
                        
                        max-width: unset;
                        max-width: 320px;
                        width: auto;
                    }

                    .staff-details p {
                        font-size: small;
                    }
                }

            </style>
        </head>
        <body>
            <div class="container">
                <h2>Additional Details for Staff: <?php echo $staffDetails['name']; ?></h2>
                <div class="staff-details">
                    <p>Name: <?php echo $staffDetails['name']; ?></p>
                    <p>Staff ID: <?php echo $staffDetails['staffid']; ?></p>
                    <p>Date of Birth: <?php echo $staffDetails['dateofbirth']; ?></p>
                    <p>Role: <?php echo $staffDetails['role']; ?></p>
                    <p>Basic Pay: <?php echo $staffDetails['basicpay']; ?></p>
                    <p>Staff Grade: <?php echo $staffDetails['staffgrade']; ?></p>
                    <p>Stream: <?php echo $staffDetails['stream']; ?></p>
                    <p>Profile Image: <?php echo $staffDetails['profileimg']; ?></p>
                    <p>Department: <?php echo $staffDetails['department']; ?></p>
                    <p>Subjects: <?php echo $staffDetails['subjects']; ?></p>
                    <p>Email: <?php echo $staffDetails['email']; ?></p>
                    <p>Phone: <?php echo $staffDetails['phone']; ?></p>
                    <p>Next of Kin: <?php echo $staffDetails['nextofkin']; ?></p>
                    <p>Remedial Allocation: <?php echo $staffDetails['remedialallocation']; ?></p>
                    <p>Marital Status: <?php echo $staffDetails['maritalstatus']; ?></p>
                    <p>Year of Employment: <?php echo $staffDetails['yearofemployment']; ?></p>
                    <p>Status: <?php echo $staffDetails['status']; ?></p>
                    <p>Gender: <?php echo $staffDetails['gender']; ?></p>
                    <p>NHIF No: <?php echo $staffDetails['nhifno']; ?></p>
                    <p>NSSF No: <?php echo $staffDetails['nssfno']; ?></p>
                    <p>TSC No: <?php echo $staffDetails['tscno']; ?></p>
                    <p>Bank Name: <?php echo $staffDetails['bankname']; ?></p>
                    <p>Bank Account No: <?php echo $staffDetails['bankaccno']; ?></p>
                    <p>Nationality: <?php echo $staffDetails['nationality']; ?></p>
                    
                    <div class="backbtnbox">
                        <a href="./staffdashboard.php" class="bckbtnbx">Back</a>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "<p>Staff details not found for staff ID: $staffID</p>";
    }
} else {
    echo "<p>Invalid request. Please provide a staff ID.</p>";
}

// Close the database connection
$connect->close();
?>
