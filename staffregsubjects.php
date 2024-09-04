
<!--THIS IS MEANT TO DISPLAY A TABLE SHOWING REGISTERED SUBJECTS-->

<?php
//List all registered users

//Check whether the user is logged in
// session_start();

//check if the user is logged in

if(!isset($_SESSION['staffid'])) {
    //Redirect to the login page if not logged in
    header("Location: portal-login.php");

    exit();
}

require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $staffid  = $_SESSION['staffid'];

    // Prepare SQL statement with ORDER BY clause for 'name'
    $sql = "SELECT * FROM staffsubjects WHERE staffid = ?";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }


    //Bind the staffid parameter
    $stmt->bind_param("s", $staffid);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Get result set
    $result = $stmt->get_result();

    // Check for data and display in HTML table
    if ($result->num_rows > 0) {
        echo "<div id='regsubjs' class='regstaffsubjs'>";
        
        $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<div class='phprecordsflexer'>";
        echo "<span style='font-weight: bold;'>Subject. No.:</span>"."<span style='color:#333;'>".$count."</span>";
        echo "<p style='font-weight: bold;'>Subject Code:</p>"."<p style='color:#333;'>".$row['subjectcode']."</p>";
        echo "<p style='font-weight: bold;'>Subject Name:</p>"."<p style='color:#333;'>".$row['subjectname']."</p>";
        echo "<p style='font-weight: bold;'>Date Registered:</p>"."<p style='color:#333;'>".$row['date']."</p>";
        echo "<p style='font-weight: bold;'>Teacher:</p>"."<p style='color:#333;'>".$row['teacher']."</p>";
        echo "<p style='font-weight: bold;'>Status:</p>"."<p>Registered:</p>";
        echo "<br/>";

        echo "<div id='editbtnbox'><button class='streceditbtn' onclick='editssubRow(\"".$row['subjectcode']."\")'>Edit</button> <button class='streceditbtn deleter_x' onclick='deletessubRow(\"".$row['subjectcode']."\")'>Delete</button></div>";
        echo "</div>";
        echo "<br/>"."<br/>";
        echo "<hr/>";

        $count++;
    }

        echo "</div>";
    } else {
        echo "There are currently no Subjects.";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();
?>

<script>
    function editssubRow(subjectcode) {
        // Implement edit action using staffid (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing Subjects with Title: " + subjectcode);
    }

    function deletessubRow(subjectcode) {
        if (confirm("Are you sure you want to delete this Subject with Code: " + subjectcode + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("Subject with Code: " + subjectcode + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./deletestaffsubjects.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("subjectcode=" + subjectcode);
        }
    }

</script>




<!--========================================-->

