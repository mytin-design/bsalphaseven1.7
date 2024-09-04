<!--THIS IS MEANT TO DISPLAY ONLY THE CODE AND SUBJECT NAME-->

<?php
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
        
        $count = 1;
    while ($row = $result->fetch_assoc()) {
        
        echo "<p class='subj_name'>".$row['subjectcode'].":".$row['subjectname']."</p>";
        
        $count++;
    }

    } else {
        echo "<p style='border-radius: .4pc;text-align: center; padding: .5pc;background-color: cyan;'>". "You have not registered any Subjects!". "</p>";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();



?>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var subjects = document.querySelectorAll('.subj_name');

        subjects.forEach(function (subject) {
            subject.addEventListener('click', function () {
                // Get subject code and name
                var subjectInfo = this.innerText.split(':');
                var subjectCode = subjectInfo[0];
                var subjectName = subjectInfo[1];

                // You can make an AJAX call to fetch specific information for the clicked subject
                // For simplicity, let's assume you have the information ready in PHP variables
                var information = {
                    'Subject Code': subjectCode,
                    'Subject Name': subjectName,
                    'Additional Info1': 'Value1',
                    'Additional Info2': 'Value2',
                    // Add more information as needed
                };

                // Generate HTML table
                var tableHTML = "<table id='subjectTable'>";
                for (var key in information) {
                    tableHTML += "<tr><th>" + key + "</th><td>" + information[key] + "</td></tr>";
                }
                tableHTML += "</table>";

                // Display the table
                var existingTable = document.getElementById('subjectTable');
                if (existingTable) {
                    existingTable.parentNode.removeChild(existingTable);
                }
                document.body.insertAdjacentHTML('beforeend', tableHTML);
            });
        });
    });
</script>

  




<!--========================================-->

