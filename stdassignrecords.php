<?php

//session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: portal-login.php");
    exit();
}

// Check if the student's username is set in the session (user is logged in)
if (isset($_SESSION['username'])) { 
    // Get the logged-in user's username from the session
    $loggedInusername = $_SESSION['username'];

    require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Retrieve the logged-in user's grade from the database
    $gradeSql = "SELECT stdgrade FROM students WHERE username = ?";
    $gradeStmt = $connect->prepare($gradeSql);

    if (!$gradeStmt) {
        die("Error in SQL query: " . $connect->error);
    }

    $gradeStmt->bind_param("s", $loggedInusername);
    $gradeStmt->execute();
    $gradeResult = $gradeStmt->get_result();

    if ($gradeResult->num_rows == 1) {
        $userGrade = $gradeResult->fetch_assoc()['stdgrade'];

        // Prepare SQL statement to get assignments for the user's grade
        $sql = "SELECT * FROM stdassignments WHERE assigngrade = ? ORDER BY dateuploaded ASC";
        $stmt = $connect->prepare($sql);

        if (!$stmt) {
            die("Error in SQL query: " . $connect->error);
        }

        $stmt->bind_param("s", $userGrade);
        $stmt->execute();
        
        // Get result set
        $result = $stmt->get_result();

        // Check for data and display in HTML table
        if ($result->num_rows > 0) {
            echo "<div id='annsDisp' class='annsrecords'>";

            $count = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<div class='phprecordsflexer' style='.5pc'>";
                echo "<span style='font-weight: bold;'>Assignment. no.:</span>"."<span style='color:#333;'>".$count."</span>";
                echo "<p style='font-weight: bold;'>UserName:</p>"."<p style='color:#333;'>".$row['username']."</p>";
                echo "<p style='font-weight: bold;'>Assignment Name:</p>"."<p style='color:#333;'>".$row['assignname']."</p>";
                echo "<p style='font-weight: bold;'>Date Uploaded:</p>"."<p style='color:#333;'>".$row['dateuploaded']."</p>";
                echo "<p style='font-weight: bold;'>Teacher:</p>"."<p style='color:#333;'>".$row['assigntr']."</p>";
                echo "<p style='font-weight: bold;'>Subject/Type:</p>"."<p style='color:#333;'>".$row['assigntype']."</p>";
                echo "<p style='font-weight: bold;'>Grade:</p>"."<p style='color:#333;'>".$row['assigngrade']."</p>";

                echo "<div>"."<a href='" .$row['assignfile']. "'>".$row['assignfile']."</a>"."</div>";

                
                echo "<div id='editbtnbox'><button class='streceditbtn' onclick='editRow(\"".$row['assignname']."\")'>Edit</button> <button class='streceditbtn deleter_x' onclick='deleteRow(\"".$row['assignname']."\")'>Delete</button></div>";
                echo "</div>";
                echo "<br/>"."<br/>";
                echo "<hr/>";
                $count++;
            }

            echo "</div>";
        } else {
                echo "<div class='notification-empty'>There are currently no Assignments.</div>";
            
        }

        // Close prepared statement and database connection
        $stmt->close();
        $gradeStmt->close();
        $connect->close();

    } else {
        // If no grade is found, display a message
        echo "<p>User grade not found.</p>";
    }

} else {
    // If the user is not logged in, display a message or redirect to the login page
    echo "<p>User not logged in.</p>";
}
?>

<script>
    function editRow(assignname) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing Assignments with Title: " + assignname);
    }

    function deleteRow(assignname) {
        if (confirm("Are you sure you want to delete these Assignments with Title Name: " + assignname + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    alert("Assignments with Title Name: " + assignname + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./deleteAssignments.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("assignname=" + assignname);
        }
    }
</script>
