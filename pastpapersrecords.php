<?php
//List all available pastpapers and exams posted by teachers for learners

require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement with ORDER BY clause for 'name'
    $sql = "SELECT * FROM exams ORDER BY dateuploaded ASC";
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
        echo "<div id='examsDisp' class='examsrecords'>";
        
        $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<div class='phprecordsflexer'>";
        echo "<span style='font-weight: bold;'>Exam. No.:</span>"."<span style='color:#333;'>".$count."</span>";
        echo "<p style='font-weight: bold;'>Exam Name:</p>"."<p style='color:#333;'>".$row['examname']."</p>";
        echo "<p style='font-weight: bold;'>Date Uploaded:</p>"."<p style='color:#333;'>".$row['dateuploaded']."</p>";
        echo "<p style='font-weight: bold;'>Teacher:</p>"."<p style='color:#333;'>".$row['examtr']."</p>";
        echo "<p style='font-weight: bold;'>Subject/Type:</p>"."<p style='color:#333;'>".$row['examtype']."</p>";
        echo "<p style='font-weight: bold;'>Grade:</p>"."<p style='color:#333;'>".$row['examgrade']."</p>";

        echo "<td>"."<a href='" .$row['examfile']. "'a>".$row['examfile']."</a>"."</td>";

        
        echo "<div id='editbtnbox'><button class='streceditbtn' onclick='editexRow(\"".$row['examname']."\")'>Edit</button> <button class='streceditbtn deleter_x' onclick='deleteexRow(\"".$row['examname']."\")'>Delete</button></div>";
        echo "</div>";
        echo "<br/>"."<br/>";
        echo "<hr/>";

        $count++;
    }

        echo "</div>";
    } else {
        echo "<div class='notification-empty'>There are currently no Exams.</div>";
        
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();



?>

<script>
    function editexRow(examname) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing exam with Title: " + examname);
    }

    function deleteexRow(examname) {
        if (confirm("Are you sure you want to delete these exam with Title Name: " + examname + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("exam with Title Name: " + examname + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./deleteexam.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("examname=" + examname);
        }
    }

</script>
