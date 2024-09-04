<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['stdgrade']) && isset($_POST['stream'])) {
    $stdgrade = filter_input(INPUT_POST, 'stdgrade', FILTER_SANITIZE_STRING);
    $stream = filter_input(INPUT_POST, 'stream', FILTER_SANITIZE_STRING);

    require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    if ( $stdgrade == "Grade Seven" || $stdgrade == "Grade Eight" || $stdgrade == "Grade Nine") {
        // Prepare SQL statement with parameters for 'stdgrade' and 'stream'
        $sql = "SELECT * FROM juniorgrades WHERE stdgrade = ? AND stream = ? ORDER BY total DESC" ;
        $stmt = $connect->prepare($sql);
    } elseif ( $stdgrade == "Grade Four" || $stdgrade == "Grade Five" || $stdgrade == "Grade Six") {
        // Prepare SQL statement with parameters for 'stdgrade' and 'stream'
        $sql = "SELECT * FROM uppergrades WHERE stdgrade = ? AND stream = ? ORDER BY total DESC";
        $stmt = $connect->prepare($sql);
    } elseif ( $stdgrade == "Grade One" || $stdgrade == "Grade Two" || $stdgrade == "Grade Three") {
        // Prepare SQL statement with parameters for 'stdgrade' and 'stream'
        $sql = "SELECT * FROM lowergrades WHERE stdgrade = ? AND stream = ? ORDER BY total DESC";
        $stmt = $connect->prepare($sql); 
    } else {
        echo "No grade selected.";
    }

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }

    // Bind parameters and execute the prepared statement
    $stmt->bind_param("ss", $stdgrade, $stream);
    $stmt->execute();

    // Get result set
    
    $result = $stmt->get_result();

       

    $studentCount = $result->num_rows;

    // Check for data and display in div elements
    
    if ($result->num_rows > 0) {
          //calculate subject totals 
            // Initialize variables to store subject totals
$mathTotal = 0;
$engTotal = 0;
$kiswTotal = 0;
$socialTotal = 0;
$intScieTotal = 0;
$preTechTotal = 0;
$caTotal = 0;
$agriNuTotal = 0;
$totalOverall = 0;

// Initialize variables to store subject totals and grade counts
//$mathTotal = 0;
$mathEE = 0;
$mathME = 0;
$mathAE = 0;
$mathBE = 0;


                  

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
            </style>
        ';
        echo $cssStyles;


        if($stdgrade == "Grade Seven" || $stdgrade == "Grade Eight" || $stdgrade == "Grade Nine") {

            

        // =============
        echo '<div class="container">';
        echo '<h2>' . htmlspecialchars($stdgrade) . ' - ' . htmlspecialchars($stream) . ' Marks</h2>';
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
        echo '<th>Kiswahili</th>';
        echo '<th>Kisw Rub</th>';
        echo '<th>Social Studies</th>';
        echo '<th>S/S Rub</th>';
        echo '<th>Int. Science</th>';
        echo '<th>Int. Scie Rub</th>';
        echo '<th>Pre-Tech</th>';
        echo '<th>Pre-Tech Rub</th>';
        echo '<th>C/A</th>';
        echo '<th>C/A Rub</th>';
        echo '<th>Agriculture</th>';
        echo '<th>Agri/Nu Rub</th>';
        echo '<th>Total</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $counter = 1;
        while ($row = $result->fetch_assoc()) {
            // Add marks to respective subject totals
    $mathTotal += $row['subjmath'];
    $engTotal += $row['subjeng'];
    $kiswTotal += $row['subjkisw'];
    $socialTotal += $row['subjsocial'];
    $intScieTotal += $row['subjintscie'];
    $preTechTotal += $row['subjpretech'];
    $caTotal += $row['subjca'];
    $agriNuTotal += $row['subjagrinu'];
    $totalOverall += $row['total'];

    // Determine grade and update corresponding count
    if ($row['subjmathrub'] == 'EE') {
        $mathEE++;
    } elseif ($row['subjmathrub'] == 'ME') {
        $mathME++;
    } elseif ($row['subjmathrub'] >= 'AE') {
        $mathAE++;
    } else {
        $mathBE++;
    }

            echo '<tr>';
            echo '<td>' . $counter++ . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['subjmath'] . '</td>';
            echo '<td>' . $row['subjmathrub'] . '</td>';
            echo '<td>' . $row['subjeng'] . '</td>';
            echo '<td>' . $row['subjengrub'] . '</td>';
            echo '<td>' . $row['subjkisw'] . '</td>';
            echo '<td>' . $row['subjkiswrub'] . '</td>';
            echo '<td>' . $row['subjsocial'] . '</td>';
            echo '<td>' . $row['subjsocialrub'] . '</td>';
            echo '<td>' . $row['subjintscie'] . '</td>';
            echo '<td>' . $row['subjintscierub'] . '</td>';
            echo '<td>' . $row['subjpretech'] . '</td>';
            echo '<td>' . $row['subjpretechrub'] . '</td>';
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
        echo '<td>'. $mathEE. '</td>';
        echo '<td>'. $engTotal . '</td>';
        echo '<td>'. 'EngRub' . '</td>';
        echo '<td>'. $kiswTotal . '</td>';
        echo '<td>'. 'KiswRub' . '</td>';
        echo '<td>'. $socialTotal . '</td>';
        echo '<td>'. 'S/S Rub' . '</td>';
        echo '<td>'. $intScieTotal . '</td>';
        echo '<td>'. 'Int. Scie Rub' . '</td>';
        echo '<td>'. $preTechTotal . '</td>';
        echo '<td>'. 'Pre-Tech Rub' . '</td>';
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
$kiswMean = $kiswTotal / $numberOfStudents;
$socialMean = $socialTotal /  $numberOfStudents;
$intScieMean = $intScieTotal / $numberOfStudents;
$preTechMean = $preTechTotal / $numberOfStudents;
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
        echo '<td>'. $kiswMean . '</td>';
        echo '<td>'. '####' . '</td>';
        echo '<td>'. $socialMean . '</td>';
        echo '<td>'. '####' . '</td>';
        echo '<td>'. $intScieMean . '</td>';
        echo '<td>'. '####' . '</td>';
        echo '<td>'. $preTechMean . '</td>';
        echo '<td>'. '####' . '</td>';
        echo '<td>'. $caMean  . '</td>';
        echo '<td>'. '####' . '</td>';
        echo '<td>'. $agriNuMean . '</td>';
        echo '<td>'. '####' . '</td>';
        echo '<td>'. $totalMean . '</td>';
        echo '<td>'. '####' . '</td>';
        echo '</tr>';
        //end persisting rows
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '<div class="backbtnbox">';
        echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
        echo '</div>';
        echo '</div>';

        //============
        } elseif ($stdgrade == "Grade Four" || $stdgrade == "Grade Five" || $stdgrade == "Grade Six") {
            // =======TABLE FOR UPPER ==========
            echo '<div class="container">';
            echo '<h2>' . htmlspecialchars($stdgrade) . ' - ' . htmlspecialchars($stream) . ' Marks</h2>';
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
            echo '<th>Kiswahili</th>';
            echo '<th>Kisw Rub</th>';
            echo '<th>Science</th>';
            echo '<th>Scie Rub</th>';
            echo '<th>Social Studies</th>';
            echo '<th>S/S Rub</th>';
            echo '<th>C.R.E</th>';
            echo '<th>C.R.E Rub</th>';
            echo '<th>C/A</th>';
            echo '<th>C/A Rub</th>';
            echo '<th>Agriculture</th>';
            echo '<th>Agri Rub</th>';
            echo '<th>Total</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $counter = 1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $counter++ . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['subjmath'] . '</td>';
                echo '<td>' . $row['subjmathrub'] . '</td>';
                echo '<td>' . $row['subjeng'] . '</td>';
                echo '<td>' . $row['subjengrub'] . '</td>';
                echo '<td>' . $row['subjkisw'] . '</td>';
                echo '<td>' . $row['subjkiswrub'] . '</td>';
                echo '<td>' . $row['subjscie'] . '</td>';
                echo '<td>' . $row['subjscierub'] . '</td>';
                echo '<td>' . $row['subjsocial'] . '</td>';
                echo '<td>' . $row['subjsocialrub'] . '</td>';
                echo '<td>' . $row['subjscre'] . '</td>';
                echo '<td>' . $row['subjscrerub'] . '</td>';
                echo '<td>' . $row['subjca'] . '</td>';
                echo '<td>' . $row['subjcarub'] . '</td>';
                echo '<td>' . $row['subjagrinu'] . '</td>';
                echo '<td>' . $row['subjagrinurub'] . '</td>';
                echo '<td>' . $row['total'] . '</td>';

            echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editstaffRow(\"".$row['username']."\")'>Edit</button> <button class='streceditbtn deleter_x' onclick='deletestaffRow(\"".$row['username']."\")'>Delete</button></td>";

                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '<div class="backbtnbox">';
            echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
            echo '</div>';
            echo '</div>';
        }elseif ($stdgrade == "Grade One" || $stdgrade == "Grade Two" || $stdgrade == "Grade Three") {
            echo '<div class="container">';
            echo '<h2>' . htmlspecialchars($stdgrade) . ' - ' . htmlspecialchars($stream) . ' Marks</h2>';
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
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '<div class="backbtnbox">';
            echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
            echo '</div>';
            echo '</div>';
        }else {
            echo "<script>
             alert('Grade not found!');
            </script>";
        }

        
    } else {
        echo "<script>
                    alert('There are currently no registered students in this class / stream.'); 
                    window.location.href = './cpsmarkssystem.php';
                </script>";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();

} else {
    echo "Invalid request.";
}
?>
