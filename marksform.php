

<?php

//A PAGE FOR DISPLAYING LEARNERS MARKS/GRADES FROM THE CLASS/GRADE AND STREAM SPECIFIED IN examresults.php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['grade']) && isset($_POST['stream']) && isset($_POST['year']) && isset($_POST['term']) && isset($_POST['type'])) {
    $grade = filter_input(INPUT_POST, 'stdgrade', FILTER_SANITIZE_STRING);
    $stream = filter_input(INPUT_POST, 'stream', FILTER_SANITIZE_STRING);
    $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
    $term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);


    require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement with parameters for 'stdgrade' and 'stream'
    $sql = "SELECT * FROM exams WHERE stdgrade = ? AND stream = ?";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }

    // Bind parameters and execute the prepared statement
    $stmt->bind_param("ss", $stdgrade, $stream);
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();

    // Check for data and display in HTML table
    if ($result->num_rows > 0) {
        // Display table headers
        echo "<table id='annsDisp' class='annsrecords'>";
        echo "<tr><th>NO</th><th>Assess. No</th> <th>Full Name</th> <th>Grade</th> <th>Stream</th> <th>Maths</th> <th>Eng</th> <th>Kisw</th> <th>Scie & Tech</th> <th>S/S-C.R.E</th> <th>Integrated Scie</th> <th>Pre-Technical</th> <th>Creative Arts</th> <th>Agri/Nutri.</th> <th>ACTIONS</th></tr>";

        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            // Display student information

            echo "<td>".$count."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['stdgrade']."</td>";
        echo "<td>".$row['stream']."</td>";
        echo "<td>"."<input type='text' class='sflex' id='subjmath_".$row['username']."' name='subjmath'/>"."</td>";
            echo "<td>"."<input type='text' class='sflex' id='subjeng_".$row['username']."' name='subjeng'/>"."</td>";
            echo "<td>"."<input type='text' class='sflex' id='subjkisw_".$row['username']."' name='subjkisw'/>"."</td>";
            echo "<td>"."<input type='text' class='sflex' id='subjscie_".$row['username']."' name='subjscie'/>"."</td>";
            echo "<td>"."<input type='text' class='sflex' id='subjscre_".$row['username']."' name='subjscre'/>"."</td>";
            echo "<td>"."<input type='text' class='sflex' id='subjintscie_".$row['username']."' name='subjintscie'/>"."</td>";
            echo "<td>"."<input type='text' class='sflex' id='subjpretech_".$row['username']."' name='subjpretech'/>"."</td>";
            echo "<td>"."<input type='text' class='sflex' id='subjca_".$row['username']."' name='subjca'/>"."</td>";
            echo "<td>"."<input type='text' class='sflex' id='subjagrinu_".$row['username']."' name='subjagrinu'/>"."</td>";

         echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editRow(\"".$row['username']."\")'>Edit</button> <button class='streceditbtn' onclick='saveRow( \"".$row['username']."\",\"".$row['name']."\",\"".$row['stdgrade']."\",\"".$row['stream']."\")'>Save</button></td>";


            echo "</tr>";
            $count++;
        }

        echo "</table>";
        
    } else {
        echo "<script>
                    alert('There are currently no Registered students in this class / stream.'); 
                    window.location.href = './entermarks.php';
                </script>";
    
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();


} else {
    echo "Invalid request.";
}
?>


<script>
    function editRow(username, name, stdgrade, stream) {
        // Implement edit action using AJAX to retrieve data
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    var data = JSON.parse(this.responseText);
                    if (data.success) {
                        // Populate the input fields with retrieved data
                        document.getElementById('subjmath_' + username).value = data.subjmath;
                        document.getElementById('subjeng_' + username).value = data.subjeng;
                        document.getElementById('subjkisw_' + username).value = data.subjkisw;
                        document.getElementById('subjscie_' + username).value = data.subjscie;
                        document.getElementById('subjscre_' + username).value = data.subjscre;
                        document.getElementById('subjintscie_' + username).value = data.subjintscie;
                        document.getElementById('subjpretech_' + username).value = data.subjpretech;
                        document.getElementById('subjca_' + username).value = data.subjca;
                        document.getElementById('subjagrinu_' + username).value = data.subjagrinu;

                        // Enable the input fields for editing
                        document.getElementById('subjmath_' + username).disabled = false;
                        document.getElementById('subjeng_' + username).disabled = false;
                        document.getElementById('subjkisw_' + username).disabled = false;
                        document.getElementById('subjscie_' + username).disabled = false;
                        document.getElementById('subjscre_' + username).disabled = false;
                        document.getElementById('subjintscie_' + username).disabled = false;
                        document.getElementById('subjpretech_' + username).disabled = false;
                        document.getElementById('subjca_' + username).disabled = false;
                        document.getElementById('subjagrinu_' + username).disabled = false;
                    } else {
                        alert("Error retrieving data for student with username: " + username);
                    }
                } else {
                    alert("Error retrieving data for student with username: " + username);
                }
            }
        };
        xhr.open("GET", "./editmarks.php?username=" + username, true); // Change the URL to your edit data endpoint
        xhr.send();
    }

    function saveRow(username, name, stdgrade, stream) {
        // Functionality to save data instead of deleting
        // Perform AJAX request or other logic to save the data
        // Example: You can send the updated data to a PHP script to handle the saving process

        // Example AJAX request (you might need to modify this based on your requirements)
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    alert("Student with username: " + username + " data saved successfully.");
                    // Perform additional actions upon successful save, if needed
                    // window.location.href = './savemarks.php';
                } else {
                    alert("Error saving data for student with username: " + username);
                }
            }
        };
        xhr.open("POST", "./savemarks.php", true); // Change the URL to your save data endpoint
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("username=" + username + "&name=" + name + "&stdgrade=" + stdgrade + "&stream=" + stream + "&subjmath=" + document.getElementById('subjmath_' + username).value + "&subjeng=" + document.getElementById('subjeng_' + username).value + '&subjkisw=' + document.getElementById('subjkisw_' + username).value + '&subjscie=' + document.getElementById('subjscie_' + username).value + '&subjscre=' + document.getElementById('subjscre_' + username).value + '&subjintscie=' + document.getElementById('subjintscie_' + username).value + '&subjpretech=' + document.getElementById('subjpretech_' + username).value + '&subjca=' + document.getElementById('subjca_' + username).value + '&subjagrinu=' + document.getElementById('subjagrinu_' + username).value);
    }

</script>


