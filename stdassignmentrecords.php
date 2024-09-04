<?php
//List all available assignments for specific learner

require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement with ORDER BY clause for 'name'
    $sql = "SELECT * FROM stdassignments ORDER BY dateuploaded ASC";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }

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
        echo "<span style='font-weight: bold;'>Assignment. no.:</span>"."<span style='color:#333;'>".$count."</span>";
        echo "<p style='font-weight: bold;'>Assignment Name:</p>"."<p style='color:#333;'>".$row['assignname']."</p>";
        echo "<p style='font-weight: bold;'>Date Uploaded:</p>"."<p style='color:#333;'>".$row['dateuploaded']."</p>";
        echo "<p style='font-weight: bold;'>Teacher:</p>"."<p style='color:#333;'>".$row['assigntr']."</p>";
        echo "<p style='font-weight: bold;'>Subject/Type:</p>"."<p style='color:#333;'>".$row['assigntype']."</p>";
        echo "<p style='font-weight: bold;'>Grade:</p>"."<p style='color:#333;'>".$row['assigngrade']."</p>";
        echo "<p style='font-weight: bold;'>Due Date:</p>"."<p style='color:#333;'>".$row['assignduedate']."</p>";
        echo "<p style='font-weight: bold;'>Instructions:</p>"."<p style='color:#333;'>".$row['assigninstructs']."</p>";

        echo "<td>"."<a href='" .$row['assignfile']. "'a>".$row['assignfile']."</a>"."</td>";
        
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
    $connect->close();



?>

<script>
    function editRow(assignname) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing Assignment with Title: " + assignname);
    }

    function deleteRow(assignname) {
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
