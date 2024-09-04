<?php
// List all available completed assignments uploaded by the student


//session_start();

// Check if the teacher is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: portal-login.php");
    exit();
}

// Get the logged-in user's username from the session
$loggedInusername = $_SESSION['username'];

require("./connect.php");

// Establish database connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Prepare SQL statement to fetch assignments uploaded by the logged-in teacher
$sql = "SELECT * FROM stdcompletedassignsnew WHERE username = ? ORDER BY dateuploaded ASC";
$stmt = $connect->prepare($sql);

if (!$stmt) {
    die("Error in SQL query: " . $connect->error);
}

// Bind the logged-in username to the prepared statement
$stmt->bind_param('s', $loggedInusername);

// Execute the prepared statement
$stmt->execute();

// Get result set
$result = $stmt->get_result();

// Check for data and display in HTML table
if ($result->num_rows > 0) {
    echo "<div id='assignDisp' class='aassignrecords'>";

    $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<div class='phprecordsflexer' style='padding: .5pc;'>";
        echo "<span style='font-weight: bold;'>Assignment. no.:</span>" . "<span style='color:#333;'>" . $count . "</span>";
        echo "<p style='font-weight: bold;'>Assignment Id:</p>" . "<p style='color:#333;'>" . $row['assignment_id'] . "</p>";
        echo "<p style='font-weight: bold;'>Assignment Name:</p>" . "<p style='color:#333;'>" . $row['assignname'] . "</p>";
        echo "<p style='font-weight: bold;'>Date Uploaded:</p>" . "<p style='color:#333;'>" . $row['dateuploaded'] . "</p>";
        echo "<p style='font-weight: bold;'>Teacher:</p>" . "<p style='color:#333;'>" . $row['assigntr'] . "</p>";
        echo "<p style='font-weight: bold;'>Subject/Type:</p>" . "<p style='color:#333;'>" . $row['assigntype'] . "</p>";
        echo "<p style='font-weight: bold;'>Grade:</p>" . "<p style='color:#333;'>" . $row['assigngrade'] . "</p>";
        echo "<p style='font-weight: bold;'>Due Date:</p>" . "<p style='color:#333;'>" . $row['assignduedate'] . "</p>";
        echo "<p style='font-weight: bold;'>Instructions:</p>" . "<p style='color:#333;'>" . $row['assigninstructs'] . "</p>";
        echo "<td>" . "<a href='" . $row['assignfile'] . "'>" . $row['assignfile'] . "</a>" . "</td>";

        echo "<div id='editbtnbox'><button class='streceditbtn' onclick='editasscRow(\"" . $row['assignname'] . "\")'>Edit</button> <button class='streceditbtn deleter_x' onclick='deleteasscRow(\"" . $row['assignname'] . "\")'>Delete</button></div>";
        echo "</div>";
        echo "<br/>" . "<br/>";
        echo "<hr/>";

        $count++;
    }

    echo "</div>";
} else {
    echo "<div class='notification-empty'>There are currently no Assignments.</div>";
}

// Close prepared statement and database connection
$stmt->close();
$connect->close();

?>


<script>
    function editasscRow(assignname) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing Assignment with Title: " + assignname);
    }

    function deleteasscRow(assignname) {
        if (confirm("Are you sure you want to delete these Assignment with Title Name: " + assignname + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("Assignment with Title Name: " + assignname + " deleted successfully.");
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
