
<!--THIS IS MEANT TO DISPLAY A TABLE SHOWING REGISTERED SUBJECTS for specific student-->

<?php

//Check whether the user is logged in
// session_start();

//check if the user is logged in

if(!isset($_SESSION['username'])) {
    //Redirect to the login page if not logged in
    header("Location: portal-login.php");

    exit();
}

require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $username  = $_SESSION['username'];

    // Prepare SQL statement with ORDER BY clause for 'name'
    $sql = "SELECT * FROM studentsubjects WHERE username = ?";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }


    //Bind the username parameter
    $stmt->bind_param("s", $username);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Get result set
    $result = $stmt->get_result();

    // Check for data and display in HTML table
    if ($result->num_rows > 0) {
        echo "<div id='regsubjs' class='regSubrecords'>";
     
        
        $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<div class='phprecordsflexer'>";
        echo "<span style='font-weight: bold;'>Subject. No.:</span>"."<span style='color:#333;'>".$count."</span>";
        echo "<p style='font-weight: bold;'>Subject Code:</p>"."<p style='color:#333;'>".$row['subjectcode']."</p>";
        echo "<p style='font-weight: bold;'>Subject Name:</p>"."<p style='color:#333;'>".$row['subjectname']."</p>";
        echo "<p style='font-weight: bold;'>Date Registered:</p>"."<p style='color:#333;'>".$row['date']."</p>";
        echo "<p style='font-weight: bold;'>Teacher:</p>"."<p style='color:#333;'>".$row['teacher']."</p>";
        echo "<p style='font-weight: bold;'>Status:</p>"."<p>Registered:</p>";

        
        
        echo "<div id='editbtnbox'><button class='streceditbtn' onclick='editlsubRow(\"".$row['subjectcode']."\")'>Edit</button> <button class='streceditbtn deleter_x' onclick='deletelsubRow(\"".$row['subjectcode']."\")'>Delete</button></div>";
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
    function editlsubRow(subjectcode) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing Subject with Code: " + subjectcode);
    }

    function deletelsubRow(subjectcode) {
        if (confirm("Are you sure you want to delete this Subject with Code: " + subjectcode + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("Subjects with Code: " + subjectcode + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./deletestdSubjects.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("subjectcode=" + subjectcode);
        }
    }

</script>




<!--========================================-->

