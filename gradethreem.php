<!-- TO SHOW MARKS AND ANALYSIS FOR GRADE 1 -->

<?php

    require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

      // Prepare SQL statement with parameters for 'stdgrade' and 'stream'
        $sql = "SELECT * FROM lowergrades WHERE stdgrade = 'Grade Three' ORDER BY total DESC";
        $stmt = $connect->prepare($sql); 
    

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }

    // Execute the prepared statement
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();

    // Check for data and display in div elements
    if ($result->num_rows > 0) {
//calculate subject totals 
            // Initialize variables to store subject totals
            $mathTotal = 0;
            $engTotal = 0;
            $readTotal = 0;
            $kiswTotal = 0;
            $kusomaTotal = 0;
            $envTotal = 0;
            $caTotal = 0;
            $agriNuTotal = 0;
            $totalOverall = 0;
        // CSS styles
        $cssStyles = '
            <style>
                .container {
                    width: 80%;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                h2 {
                    text-align: center;
                    margin-bottom: 20px;
                    color: #333;
                }

                .table-container {
                    overflow-x: auto;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                }

                table th, table td {
                    padding: 10px;
                    text-align: center;
                    border: 1px solid #ddd;
                }

                table th {
                    background-color: #f2f2f2;
                }

                tbody tr:nth-child(even) {
                    background-color: #f9f9f9;
                }

                .backbtnbox {
                    margin-top: 20px;
                    text-align: center;
                }

                .bckbtnbx {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #007bff;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                }

                .bckbtnbx:hover {
                    background-color: #0056b3;
                }
                .streceditbtn {
                    height: 2pc;
                    width: 5pc;
                    background-color: transparent;
                    border-radius: 4pc;
                }
                
                .deleter_x {
                    background-color: rgb(194, 10, 10);
                
                    color: #fff;
                }
                
                .deleter_x:hover {
                    background-color: red;
                
                }
            </style>
        ';
        echo $cssStyles;

        // =============
        echo '<div class="container">';
        echo '<h2>' . 'Grade Three Marks</h2>';
        echo '<div class="table-container">';
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>#</th>';
        echo '<th>Username</th>';
        echo '<th>Name</th>';
        echo '<th>Math</th>';
        echo '<th>Math Rub</th>';
        echo '<th>English</th>';
        echo '<th>Eng Rub</th>';
        echo '<th>Reading</th>';
        echo '<th>Reading Rub</th>';
        echo '<th>Kiswahili</th>';
        echo '<th>Kisw Rub</th>';
        echo '<th>Kusoma</th>';
        echo '<th>Kusoma Rub</th>';
        echo '<th>Env. Studies</th>';
        echo '<th>Env. Studies Rub</th>';
        echo '<th>C/A</th>';
        echo '<th>C/A Rub</th>';
        echo '<th>Agriculture</th>';
        echo '<th>AgriNu Rub</th>';
        echo '<th>Total</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $counter = 1;
        while ($row = $result->fetch_assoc()) {
             // Add marks to respective subject totals
    $mathTotal += $row['subjmath'];
    $engTotal += $row['subjeng'];
    $readTotal += $row['subjread'];
    $kiswTotal += $row['subjkisw'];
    $kusomaTotal += $row['subjkusoma'];
    $envTotal += $row['subjenv'];
    $caTotal += $row['subjca'];
    $agriNuTotal += $row['subjagrinu'];
    $totalOverall += $row['total'];
            echo '<tr>';
            echo '<td>' . $counter++ . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['subjmath'] . '</td>';
            echo '<td>' . $row['subjmathrub'] . '</td>';
            echo '<td>' . $row['subjeng'] . '</td>';
            echo '<td>' . $row['subjengrub'] . '</td>';
            echo '<td>' . $row['subjread'] . '</td>';
            echo '<td>' . $row['subjreadrub'] . '</td>';
            echo '<td>' . $row['subjkisw'] . '</td>';
            echo '<td>' . $row['subjkiswrub'] . '</td>';
            echo '<td>' . $row['subjkusoma'] . '</td>';
            echo '<td>' . $row['subjkusomarub'] . '</td>';
            echo '<td>' . $row['subjenv'] . '</td>';
            echo '<td>' . $row['subjenvrub'] . '</td>';
            echo '<td>' . $row['subjca'] . '</td>';
            echo '<td>' . $row['subjcarub'] . '</td>';
            echo '<td>' . $row['subjagrinu'] . '</td>';
            echo '<td>' . $row['subjagrinurub'] . '</td>';
            echo '<td>' . $row['total'] . '</td>';
            echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editstaffRow(\"".$row['username']."\")'>Edit</button> <button class='streceditbtn deleter_x' onclick='deletestaffRow(\"".$row['username']."\")'>Delete</button></td>";

            echo '</tr>';
        }

         // start mean row - persists at the bottom
         echo '<tr>';
         echo '<td class="bold">'. 'TOTAL' . '</td>';
         echo '<td>'. '___' . '</td>';
         echo '<td>'. '___' . '</td>';
         echo '<td>'. $mathTotal . '</td>';
         echo '<td>'. 'MathRub' . '</td>';
         echo '<td>'. $engTotal . '</td>';
         echo '<td>'. 'EngRub' . '</td>';
         echo '<td>'. $readTotal . '</td>';
         echo '<td>'. 'KiswRub' . '</td>';
         echo '<td>'. $kiswTotal . '</td>';
         echo '<td>'. 'Scie Rub' . '</td>';
         echo '<td>'. $kusomaTotal . '</td>';
         echo '<td>'. 'S/S Rub' . '</td>';
         echo '<td>'. $envTotal . '</td>';
         echo '<td>'. 'cre Rub' . '</td>';
         echo '<td>'. $caTotal . '</td>';
         echo '<td>'. 'C/A Rub' . '</td>';
         echo '<td>'. $agriNuTotal . '</td>';
         echo '<td>'. 'Agri/Nu Rub' . '</td>';
         echo '<td>'. $totalOverall . '</td>';
 
         echo '</tr>';
 
 // start mean row - persists at the bottom
                     // Display mean row
                     $numberOfStudents = $result->num_rows;
                     $mathMean = $mathTotal / $numberOfStudents;
                     $engMean = $engTotal / $numberOfStudents;
                     $readMean = $readTotal / $numberOfStudents;
                     $kiswMean = $kiswTotal / $numberOfStudents;
                     $kusomaMean = $kusomaTotal /  $numberOfStudents;
                     $envMean = $envTotal / $numberOfStudents;
                     $caMean = $caTotal / $numberOfStudents;
                     $agriNuMean = $agriNuTotal / $numberOfStudents;
                     $totalMean = $totalOverall / $numberOfStudents;
                     
                             echo '<tr>';
                             echo '<td class="bold">'. 'MEAN' . '</td>';
                             echo '<td>'. '___' . '</td>';
                             echo '<td>'. '___' . '</td>';
                             echo '<td>'. $mathMean . '</td>';
                             echo '<td>'. '####' . '</td>';
                             echo '<td>'. $engMean . '</td>';
                             echo '<td>'. '####' . '</td>';
                             echo '<td>'. $readMean . '</td>';
                             echo '<td>'. '####' . '</td>';
                             echo '<td>'. $kiswMean . '</td>';
                             echo '<td>'. '####' . '</td>';
                             echo '<td>'. $kusomaMean . '</td>';
                             echo '<td>'. '####' . '</td>';
                             echo '<td>'. $envMean . '</td>';
                             echo '<td>'. '####' . '</td>';
                             echo '<td>'. $caMean  . '</td>';
                             echo '<td>'. '####' . '</td>';
                             echo '<td>'. $agriNuMean . '</td>';
                             echo '<td>'. '####' . '</td>';
                             echo '<td>'. $totalMean . '</td>';
                             echo '</tr>';
         //end persisting rows
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '<div class="backbtnbox">';
        echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
        echo '</div>';
        echo '</div>';

        // ============
    
    } else {
        echo "<script>
                    alert('There are currently no registered students in this class / stream.'); 
                    window.location.href = './cpsmarkssystem.php';
                </script>";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();


?>
<script>
    function editstaffRow(username) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing Staff with Staff Id: " + username);
    }

    function deletestaffRow(username) {
        if (confirm("Are you sure you want to delete these Marks with Username: " + username + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("Marks with Assessment No.: " + username + " deleted successfully. You may restore from dustbin.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./deletegradethreemarks.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("username=" + username);
        }
    }
</script>
