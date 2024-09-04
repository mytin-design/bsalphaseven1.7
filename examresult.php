<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Marks</title>
    <style>

.table-container {
    width: 80%;
    margin: 2pc auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: scroll;
}



.learner-table th, .learner-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.learner-table th {
    background-color: #f2f2f2;
}

.learner-table td label {
        display: none;
    }

@media (max-width: 600px) {
    .learner-table, .learner-table thead, .learner-table tbody, .learner-table th, .learner-table td, .learner-table tr {
        display: block;
    }
    
    .learner-table tr {
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
    }
    
    .learner-table th, .learner-table td {
        text-align: left;
        display: block;
        padding: 10px;
        border: none;
    }

    .learner-table th {
        background-color: transparent;
        font-weight: bold;
    }
    
    .learner-table td {
        position: relative;
        padding-left: 50%;
    }

    .learner-table td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        width: calc(50% - 20px);
        white-space: nowrap;
        font-weight: bold;
        font-size: auto;
    }
    
    .learner-table td label {
        display: none;
    }

    .learner-table thead tr {
        display: none;
    }
}


.sflex {
    width: 100%;
    padding: 5px;
    box-sizing: border-box;
}

.backbtnbox {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.bckbtnbx {
    text-decoration: none;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    text-align: center;
}

.bckbtnbx:hover {
    background-color: #0056b3;
}


    </style>
</head>
<body>
    

    <?php

                                            // A PAGE FOR DISPLAYING LEARNERS FROM THE CLASS/GRADE AND STREAM SPECIFIED IN cpsmarkssystem.php

                                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['stdgrade']) && isset($_POST['stream'])) {
                                                $stdgrade = filter_input(INPUT_POST, 'stdgrade', FILTER_SANITIZE_STRING);
                                                $stream = filter_input(INPUT_POST, 'stream', FILTER_SANITIZE_STRING);

                                                require("./connect.php");

                                                // Establish database connection
                                                if ($connect->connect_error) {
                                                    die("Connection failed: " . $connect->connect_error);
                                                }

                                                // Prepare SQL statement with parameters for 'stdgrade' and 'stream'
                                                //$sql = "SELECT * FROM students WHERE stdgrade = ? AND stream = ?";
                                                // Use LEFT JOIN to check if student exists in the marks tables
                                                $sql = "
                                                SELECT s.* 
                                                FROM students s
                                                LEFT JOIN uppergrades u ON s.username = u.username
                                                LEFT JOIN lowergrades l ON s.username = l.username
                                                LEFT JOIN juniorgrades j ON s.username = j.username
                                                WHERE s.stdgrade = ? AND s.stream = ? 
                                                AND u.username IS NULL AND l.username IS NULL AND j.username IS NULL
                                                ";
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
                                                   
                                                    echo $stdgrade . "Marks";
                                                   

                                                    if($stdgrade == "Grade Seven" || $stdgrade == "Grade Eight" || $stdgrade == "Grade Nine") {
                                                        //echo $stdgrade . " is between Seven and Nine.";

                                                            // Display table headers
                                                        echo "<div class='table-container'>";
                                                        echo "<table id='learner_table' class='learner-table'>";
                                                        echo "<thead>";
                                                        echo "<tr>";
                                                        echo "<th>NO</th>";
                                                        echo "<th>Assess. No</th>";
                                                        echo "<th>Full Name</th>";
                                                        echo "<th>Grade</th>";
                                                        echo "<th>Stream</th>";
                                                        echo "<th>Maths</th>";
                                                        echo "<th>Maths Rub</th>";
                                                        echo "<th>Eng</th>";
                                                        echo "<th>Eng Rub</th>";
                                                        echo "<th>Kisw</th>";
                                                        echo "<th>Kisw Rub</th>";
                                                        echo "<th>S/S</th>";
                                                        echo "<th>S/S Rub</th>";
                                                        echo "<th>C.R.E</th>";
                                                        echo "<th>C.R.E Rub</th>";
                                                        echo "<th>Integrated Scie</th>";
                                                        echo "<th>Int. Scie Rub</th>";
                                                        echo "<th>Pre-Technical</th>";
                                                        echo "<th>Pre-Tech. Rub</th>";
                                                        echo "<th>C/A & Sports</th>";
                                                        echo "<th>C/A Sports Rub</th>";
                                                        echo "<th>Agri/Nutri.</th>";
                                                        echo "<th>Agri/Nutri. Rub</th>";
                                                        echo "<th>ACTIONS</th>";
                                                        echo "</tr>";
                                                        echo "</thead>";
                                                        echo "<tbody>";

                                                        $count = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            // Display student information
                                                            echo "<tr class='student-row'>";
                                                            echo "<td data-label='NO'>".$count."</td>";
                                                            echo "<td data-label='Assess. No'>".$row['username']."</td>";
                                                            echo "<td data-label='Full Name'>".$row['name']."</td>";
                                                            echo "<td data-label='Grade'>".$row['stdgrade']."</td>";
                                                            echo "<td data-label='Stream'>".$row['stream']."</td>";
                                                            echo "<td data-label='Maths'><label for='subjmath_".$row['username']."'>Maths</label><input type='text' class='sflex' id='subjmath_".$row['username']."' name='subjmath'/></td>";
                                                            echo "<td data-label='Maths Rub'><label for='subjmathrub_".$row['username']."'>Maths Rub</label><input type='text' class='sflex' id='subjmathrub_".$row['username']."' name='subjmathrub'/></td>";
                                                            echo "<td data-label='Eng'><label for='subjeng_".$row['username']."'>Eng</label><input type='text' class='sflex' id='subjeng_".$row['username']."' name='subjeng'/></td>";
                                                            echo "<td data-label='Eng Rub'><label for='subjengrub_".$row['username']."'>Eng Rub</label><input type='text' class='sflex' id='subjengrub_".$row['username']."' name='subjengrub'/></td>";
                                                            echo "<td data-label='Kisw'><label for='subjkisw_".$row['username']."'>Kisw</label><input type='text' class='sflex' id='subjkisw_".$row['username']."' name='subjkisw'/></td>";
                                                            echo "<td data-label='Kisw Rub'><label for='subjkiswrub_".$row['username']."'>Kisw Rub</label><input type='text' class='sflex' id='subjkiswrub_".$row['username']."' name='subjkiswrub'/></td>";
                                                            echo "<td data-label='S/S'><label for='subjsocial_".$row['username']."'>S/S</label><input type='text' class='sflex' id='subjsocial_".$row['username']."' name='subjsocial'/></td>";
                                                            echo "<td data-label='S/S Rub'><label for='subjsocialrub_".$row['username']."'>S/S Rub</label><input type='text' class='sflex' id='subjsocialrub_".$row['username']."' name='subjsocialrub'/></td>";
                                                            echo "<td data-label='C.R.E'><label for='subjscre_".$row['username']."'>C.R.E</label><input type='text' class='sflex' id='subjscre_".$row['username']."' name='subjscre'/></td>";
                                                            echo "<td data-label='C.R.E Rub'><label for='subjscrerub_".$row['username']."'>C.R.E Rub</label><input type='text' class='sflex' id='subjscrerub_".$row['username']."' name='subjscrerub'/></td>";
                                                            echo "<td data-label='Integrated Scie'><label for='subjintscie_".$row['username']."'>Integrated Scie</label><input type='text' class='sflex' id='subjintscie_".$row['username']."' name='subjintscie'/></td>";
                                                            echo "<td data-label='Int. Scie Rub'><label for='subjintscierub_".$row['username']."'>Int. Scie Rub</label><input type='text' class='sflex' id='subjintscierub_".$row['username']."' name='subjintscierub'/></td>";
                                                            echo "<td data-label='Pre-Technical'><label for='subjpretech_".$row['username']."'>Pre-Technical</label><input type='text' class='sflex' id='subjpretech_".$row['username']."' name='subjpretech'/></td>";
                                                            echo "<td data-label='Pre-Tech. Rub'><label for='subjpretechrub_".$row['username']."'>Pre-Tech. Rub</label><input type='text' class='sflex' id='subjpretechrub_".$row['username']."' name='subjpretechrub'/></td>";
                                                            echo "<td data-label='C/A & Sports'><label for='subjca_".$row['username']."'>C/A & Sports</label><input type='text' class='sflex' id='subjca_".$row['username']."' name='subjca'/></td>";
                                                            echo "<td data-label='C/A Sports Rub'><label for='subjcarub_".$row['username']."'>C/A Sports Rub</label><input type='text' class='sflex' id='subjcarub_".$row['username']."' name='subjcarub'/></td>";
                                                            echo "<td data-label='Agri/Nutri.'><label for='subjagrinu_".$row['username']."'>Agri/Nutri.</label><input type='text' class='sflex' id='subjagrinu_".$row['username']."' name='subjagrinu'/></td>";
                                                            echo "<td data-label='Agri/Nutri. Rub'><label for='subjagrinurub_".$row['username']."'>Agri/Nutri. Rub</label><input type='text' class='sflex' id='subjagrinurub_".$row['username']."' name='subjagrinurub'/></td>";
                                                            echo "<td id='editbtnbox'><button class='streceditbtn editer_x' onclick='editRow(\"".$row['username']."\")'>Edit</button> <button class='streceditbtn saver_x' onclick='Decide(\"".$row['username']."\",\"".$row['name']."\",\"".$row['stdgrade']."\",\"".$row['stream']."\")'>Save</button></td>";
                                                            echo "</tr>";
                                                            $count++;
                                                        }

                                                        echo "</tbody>";
                                                        echo "</table>";
                                                        echo '<div class="backbtnbox">';
                                                        echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
                                                        echo '<a href="./cpsmarkssystem.php" target="_blank" class="bckbtnbx">View Marks</a>';
                                                        echo '</div>';
                                                        echo "</div>";
                                                    } elseif ($stdgrade == "Grade Four" || $stdgrade == "Grade Five" || $stdgrade == "Grade Six") {
                                                        echo "Grade ". $stdgrade . "Marks";
                                                            
                                                        // Display table headers
                                                        echo "<div class='table-container'>";
                                                        echo "<table id='learner_table' class='learner-table'>";
                                                        echo "<thead>";
                                                        echo "<tr>";
                                                        echo "<th>NO</th>";
                                                        echo "<th>Assess. No</th>";
                                                        echo "<th>Full Name</th>";
                                                        echo "<th>Grade</th>";
                                                        echo "<th>Stream</th>";
                                                        echo "<th>Maths</th>";
                                                        echo "<th>Maths Rub</th>";
                                                        echo "<th>Eng</th>";
                                                        echo "<th>Eng Rub</th>";
                                                        echo "<th>Kisw</th>";
                                                        echo "<th>Kisw Rub</th>";
                                                        echo "<th>Science</th>";
                                                        echo "<th>Science Rub</th>";
                                                        echo "<th>Social Studies</th>";
                                                        echo "<th>S/S Rub</th>";
                                                        echo "<th>C.R.E</th>";
                                                        echo "<th>C.R.E Rub</th>";
                                                        echo "<th>C/Arts Sports</th>";
                                                        echo "<th>C/A Sports Rub</th>";
                                                        echo "<th>Agri/Nutri.</th>";
                                                        echo "<th>Agri/Nutri. Rub</th>";
                                                        echo "<th>ACTIONS</th>";
                                                        echo "</tr>";
                                                        echo "</thead>";
                                                        echo "<tbody>";

                                                        $count = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr class='student-row'>";
                                                            echo "<td data-label='NO'>".$count."</td>";
                                                            echo "<td data-label='Assess. No'>".$row['username']."</td>";
                                                            echo "<td data-label='Full Name'>".$row['name']."</td>";
                                                            echo "<td data-label='Grade'>".$row['stdgrade']."</td>";
                                                            echo "<td data-label='Stream'>".$row['stream']."</td>";
                                                            echo "<td data-label='Maths'><label for='subjmath_".$row['username']."'>Maths</label><input type='text' class='sflex' id='subjmath_".$row['username']."' name='subjmath'/></td>";
                                                            echo "<td data-label='Maths Rub'><label for='subjmathrub_".$row['username']."'>Maths Rub</label><input type='text' class='sflex' id='subjmathrub_".$row['username']."' name='subjmathrub'/></td>";
                                                            echo "<td data-label='Eng'><label for='subjeng_".$row['username']."'>Eng</label><input type='text' class='sflex' id='subjeng_".$row['username']."' name='subjeng'/></td>";
                                                            echo "<td data-label='Eng Rub'><label for='subjengrub_".$row['username']."'>Eng Rub</label><input type='text' class='sflex' id='subjengrub_".$row['username']."' name='subjengrub'/></td>";
                                                            echo "<td data-label='Kisw'><label for='subjkisw_".$row['username']."'>Kisw</label><input type='text' class='sflex' id='subjkisw_".$row['username']."' name='subjkisw'/></td>";
                                                            echo "<td data-label='Kisw Rub'><label for='subjkiswrub_".$row['username']."'>Kisw Rub</label><input type='text' class='sflex' id='subjkiswrub_".$row['username']."' name='subjkiswrub'/></td>";
                                                            echo "<td data-label='Scie'><label for='subjscie_".$row['username']."'>Scie</label><input type='text' class='sflex' id='subjscie_".$row['username']."' name='subjscie'/></td>";
                                                            echo "<td data-label='Scie Rub'><label for='subjscierub_".$row['username']."'>Scie Rub</label><input type='text' class='sflex' id='subjscierub_".$row['username']."' name='subjscierub'/></td>";
                                                            echo "<td data-label='S/S'><label for='subjsocial_".$row['username']."'>S/S</label><input type='text' class='sflex' id='subjsocial_".$row['username']."' name='subjsocial'/></td>";
                                                            echo "<td data-label='S/S Rub'><label for='subjsocialrub_".$row['username']."'>S/S Rub</label><input type='text' class='sflex' id='subjsocialrub_".$row['username']."' name='subjsocialrub'/></td>";
                                                            echo "<td data-label='C.R.E'><label for='subjscre_".$row['username']."'>C.R.E</label><input type='text' class='sflex' id='subjscre_".$row['username']."' name='subjscre'/></td>";
                                                            echo "<td data-label='C.R.E Rub'><label for='subjscrerub_".$row['username']."'>C.R.E Rub</label><input type='text' class='sflex' id='subjscrerub_".$row['username']."' name='subjscrerub'/></td>";
                                                            echo "<td data-label='C/A & Sports'><label for='subjca_".$row['username']."'>C/A & Sports</label><input type='text' class='sflex' id='subjca_".$row['username']."' name='subjca'/></td>";
                                                            echo "<td data-label='C/A Sports Rub'><label for='subjcarub_".$row['username']."'>C/A Sports Rub</label><input type='text' class='sflex' id='subjcarub_".$row['username']."' name='subjcarub'/></td>";
                                                            echo "<td data-label='Agri/Nutri.'><label for='subjagrinu_".$row['username']."'>Agri/Nutri.</label><input type='text' class='sflex' id='subjagrinu_".$row['username']."' name='subjagrinu'/></td>";
                                                            echo "<td data-label='Agri/Nutri. Rub'><label for='subjagrinurub_".$row['username']."'>Agri/Nutri. Rub</label><input type='text' class='sflex' id='subjagrinurub_".$row['username']."' name='subjagrinurub'/></td>";
                                                            echo "<td id='editbtnbox'><button class='streceditbtn editer_x' onclick='editRow(\"".$row['username']."\")'>Edit</button> <button class='streceditbtn saver_x' onclick='Decide( \"".$row['username']."\",\"".$row['name']."\",\"".$row['stdgrade']."\",\"".$row['stream']."\")'>Save</button></td>";
                                                            echo "</tr>";
                                                            $count++;
                                                        }

                                                            echo "</tbody>";
                                                            echo "</table>";
                                                            echo '<div class="backbtnbox">';
                                                            echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
                                                            echo '<a href="./cpsmarkssystem.php" target="_blank" class="bckbtnbx">View Marks</a>';
                                                            echo '</div>';
                                                            echo "</div>";
                                                    }elseif ($stdgrade == "Grade One" || $stdgrade == "Grade Two" || $stdgrade == "Grade Three") {
                                                        echo "Grade ". $stdgrade . "Marks";
                                                            

                                                                // Display table headers
                                                        echo "<div class='table-container'>";
                                                        echo "<table id='learner_table' class='learner-table'>";
                                                        echo "<thead>";
                                                        echo "<tr>";
                                                        echo "<th>NO</th>";
                                                        echo "<th>Assess. No</th>";
                                                        echo "<th>Full Name</th>";
                                                        echo "<th>Grade</th>";
                                                        echo "<th>Stream</th>";
                                                        echo "<th>Maths</th>";
                                                        echo "<th>Math Rub</th>";
                                                        echo "<th>Eng</th>";
                                                        echo "<th>Eng Rub</th>";
                                                        echo "<th>Reading</th>";
                                                        echo "<th>Reading Rub</th>";
                                                        echo "<th>Kisw</th>";
                                                        echo "<th>Kisw Rub</th>";
                                                        echo "<th>Kusoma</th>";
                                                        echo "<th>Kusoma Rub</th>";
                                                        echo "<th>Env. Studies</th>";
                                                        echo "<th>Env. Studies Rub</th>";
                                                        echo "<th>C/A Sports</th>";
                                                        echo "<th>C/A Sports Rub</th>";
                                                        echo "<th>Agri/Nutri.</th>";
                                                        echo "<th>Agri/Nutri. Rub</th>";
                                                        echo "<th>ACTIONS</th>";
                                                        echo "</tr>";
                                                        echo "</thead>";
                                                        echo "<tbody>";

                                                        $count = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr class='student-row'>";
                                                            echo "<td data-label='NO'>".$count."</td>";
                                                            echo "<td data-label='Assess. No'>".$row['username']."</td>";
                                                            echo "<td data-label='Full Name'>".$row['name']."</td>";
                                                            echo "<td data-label='Grade'>".$row['stdgrade']."</td>";
                                                            echo "<td data-label='Stream'>".$row['stream']."</td>";
                                                            echo "<td data-label='Maths'><label for='subjmath_".$row['username']."'>Maths</label><input type='text' class='sflex' id='subjmath_".$row['username']."' name='subjmath'/></td>";
                                                            echo "<td data-label='Maths Rub'><label for='subjmathrub_".$row['username']."'>Maths Rub</label><input type='text' class='sflex' id='subjmathrub_".$row['username']."' name='subjmathrub'/></td>";
                                                            echo "<td data-label='Eng'><label for='subjeng_".$row['username']."'>Eng</label><input type='text' class='sflex' id='subjeng_".$row['username']."' name='subjeng'/></td>";
                                                            echo "<td data-label='Eng Rub'><label for='subjengrub_".$row['username']."'>Eng Rub</label><input type='text' class='sflex' id='subjengrub_".$row['username']."' name='subjengrub'/></td>";
                                                            echo "<td data-label='Read'><label for='subjread_".$row['username']."'>Read</label><input type='text' class='sflex' id='subjread_".$row['username']."' name='subjread'/></td>";
                                                            echo "<td data-label='Read Rub'><label for='subjreadrub_".$row['username']."'>Read Rub</label><input type='text' class='sflex' id='subjreadrub_".$row['username']."' name='subjreadrub'/></td>";
                                                            echo "<td data-label='Kisw'><label for='subjkisw_".$row['username']."'>Kisw</label><input type='text' class='sflex' id='subjkisw_".$row['username']."' name='subjkisw'/></td>";
                                                            echo "<td data-label='Kisw Rub'><label for='subjkiswrub_".$row['username']."'>Kisw Rub</label><input type='text' class='sflex' id='subjkiswrub_".$row['username']."' name='subjkiswrub'/></td>";
                                                            echo "<td data-label='Kusoma'><label for='subjkusoma_".$row['username']."'>Kusoma</label><input type='text' class='sflex' id='subjkusoma_".$row['username']."' name='subjkusoma'/></td>";
                                                            echo "<td data-label='Kusoma Rub'><label for='subjkusomarub_".$row['username']."'>Kusoma Rub</label><input type='text' class='sflex' id='subjkusomarub_".$row['username']."' name='subjkusomarub'/></td>";
                                                            echo "<td data-label='Env'><label for='subjenv_".$row['username']."'>Env</label><input type='text' class='sflex' id='subjenv_".$row['username']."' name='subjenv'/></td>";
                                                            echo "<td data-label='Env Rub'><label for='subjenvrub_".$row['username']."'>Env Rub</label><input type='text' class='sflex' id='subjenvrub_".$row['username']."' name='subjenvrub'/></td>";
                                                            echo "<td data-label='C/A & Sports'><label for='subjca_".$row['username']."'>C/A & Sports</label><input type='text' class='sflex' id='subjca_".$row['username']."' name='subjca'/></td>";
                                                            echo "<td data-label='C/A Sports Rub'><label for='subjcarub_".$row['username']."'>C/A Sports Rub</label><input type='text' class='sflex' id='subjcarub_".$row['username']."' name='subjcarub'/></td>";
                                                            echo "<td data-label='Agri/Nutri.'><label for='subjagrinu_".$row['username']."'>Agri/Nutri.</label><input type='text' class='sflex' id='subjagrinu_".$row['username']."' name='subjagrinu'/></td>";
                                                            echo "<td data-label='Agri/Nutri. Rub'><label for='subjagrinurub_".$row['username']."'>Agri/Nutri. Rub</label><input type='text' class='sflex' id='subjagrinurub_".$row['username']."' name='subjagrinurub'/></td>";
                                                            echo "<td id='editbtnbox'><button class='streceditbtn editer_x' onclick='editRow(\"".$row['username']."\")'>Edit</button> <button class='streceditbtn saver_x' onclick='Decide( \"".$row['username']."\",\"".$row['name']."\",\"".$row['stdgrade']."\",\"".$row['stream']."\")'>Save</button></td>";
                                                            echo "</tr>";
                                                            $count++;
                                                        }

                                                            echo "</tbody>";
                                                            echo "</table>";
                                                            echo '<div class="backbtnbox">';
                                                            echo '<a href="./cpsmarkssystem.php"  class="bckbtnbx">Back</a>';
                                                            echo '<a href="./cpsmarkssystem.php" target="_blank" class="bckbtnbx">View Marks</a>';
                                                            echo '</div>';
                                                            echo "</div>";
                                                    }else {
                                                        echo "<script>alert('Selected Grade does not match any category.'); window.location.href = './cpsmarkssystem.php';</script>";

                                                    }
                                                } else {
                                                    echo "<script>alert('There are currently no Registered students in this class / stream, or all students already have their marks filled.'); window.location.href = './cpsmarkssystem.php';</script>";
                                                }

                                                // Close prepared statement and database connection
                                                $stmt->close();
                                                $connect->close();
                                            } else {
                                                //echo "Invalid request.";
                                            }
                                        ?>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                        document.getElementById('subjsocial_' + username).value = data.subjscie;
                        document.getElementById('subjscre_' + username).value = data.subjscre;
                        document.getElementById('subjintscie_' + username).value = data.subjintscie;
                        document.getElementById('subjpretech_' + username).value = data.subjpretech;
                        document.getElementById('subjca_' + username).value = data.subjca;
                        document.getElementById('subjagrinu_' + username).value = data.subjagrinu;

                        // Enable the input fields for editing
                        document.getElementById('subjmath_' + username).disabled = false;
                        document.getElementById('subjeng_' + username).disabled = false;
                        document.getElementById('subjkisw_' + username).disabled = false;
                        document.getElementById('subjsocial_' + username).disabled = false;
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

    //specify a function that decides the grade how to save

    //Function to save marks for junior school
    function savejsRow(username, name, stdgrade, stream) {
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
                        

                    // Reloads the current page
                    location.reload();

                } else {
                    alert("Error saving data for student with username: " + username);
                }
            }
        };
        xhr.open("POST", "./savemarksjs.php", true); // Change the URL to your save data endpoint
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //xhr.send("username=" + username + "&name=" + name + "&stdgrade=" + stdgrade + "&stream=" + stream + "&subjmath=" + document.getElementById('subjmath_' + username).value + "&subjeng=" + document.getElementById('subjeng_' + username).value + '&subjkisw=' + document.getElementById('subjkisw_' + username).value + '&subjsocial=' + document.getElementById('subjsocial_' + username).value + '&subjscre=' + document.getElementById('subjscre_' + username).value + '&subjintscie=' + document.getElementById('subjintscie_' + username).value + '&subjpretech=' + document.getElementById('subjpretech_' + username).value + '&subjca=' + document.getElementById('subjca_' + username).value + '&subjagrinu=' + document.getElementById('subjagrinu_' + username).value);
        xhr.send("username=" + username + "&name=" + name + "&stdgrade=" + stdgrade + "&stream=" + stream + "&subjmath=" + document.getElementById('subjmath_' + username).value + "&subjmathrub=" + document.getElementById('subjmathrub_' + username).value + "&subjeng=" + document.getElementById('subjeng_' + username).value + "&subjengrub=" + document.getElementById('subjengrub_' + username).value + '&subjkisw=' + document.getElementById('subjkisw_' + username).value + '&subjkiswrub=' + document.getElementById('subjkiswrub_' + username).value + '&subjsocial=' + document.getElementById('subjsocial_' + username).value + '&subjsocialrub=' + document.getElementById('subjsocialrub_' + username).value + '&subjscre=' + document.getElementById('subjscre_' + username).value + '&subjscrerub=' + document.getElementById('subjscrerub_' + username).value + '&subjintscie=' + document.getElementById('subjintscie_' + username).value + '&subjintscierub=' + document.getElementById('subjintscierub_' + username).value + '&subjpretech=' + document.getElementById('subjpretech_' + username).value + '&subjpretechrub=' + document.getElementById('subjpretechrub_' + username).value + '&subjca=' + document.getElementById('subjca_' + username).value + '&subjcarub=' + document.getElementById('subjcarub_' + username).value + '&subjagrinu=' + document.getElementById('subjagrinu_' + username).value + '&subjagrinurub=' + document.getElementById('subjagrinurub_' + username).value);

    }
//end js function

//Function to save upper primary marks
function saveupperRow(username, name, stdgrade, stream) {
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
                    // Reloads the current page
                        location.reload();

                     
                } else {
                    alert("Error saving data for student with username: " + username);
                }
            }
        };
        xhr.open("POST", "./savemarksupper.php", true); // Change the URL to your save data endpoint
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //xhr.send("username=" + username + "&name=" + name + "&stdgrade=" + stdgrade + "&stream=" + stream + "&subjmath=" + document.getElementById('subjmath_' + username).value + "&subjeng=" + document.getElementById('subjeng_' + username).value + '&subjkisw=' + document.getElementById('subjkisw_' + username).value + '&subjscie=' + document.getElementById('subjscie_' + username).value + '&subjsocial=' + document.getElementById('subjsocial_' + username).value + '&subjscre=' + document.getElementById('subjscre_' + username).value + '&subjca=' + document.getElementById('subjca_' + username).value + '&subjagrinu=' + document.getElementById('subjagrinu_' + username).value);
        xhr.send("username=" + username + "&name=" + name + "&stdgrade=" + stdgrade + "&stream=" + stream + "&subjmath=" + document.getElementById('subjmath_' + username).value + "&subjmathrub=" + document.getElementById('subjmathrub_' + username).value + "&subjeng=" + document.getElementById('subjeng_' + username).value + "&subjengrub=" + document.getElementById('subjengrub_' + username).value + '&subjkisw=' + document.getElementById('subjkisw_' + username).value + '&subjkiswrub=' + document.getElementById('subjkiswrub_' + username).value + '&subjscie=' + document.getElementById('subjscie_' + username).value +'&subjscierub=' + document.getElementById('subjscierub_' + username).value + '&subjsocial=' + document.getElementById('subjsocial_' + username).value + '&subjsocialrub=' + document.getElementById('subjsocialrub_' + username).value + '&subjscre=' + document.getElementById('subjscre_' + username).value + '&subjscrerub=' + document.getElementById('subjscrerub_' + username).value + '&subjca=' + document.getElementById('subjca_' + username).value + '&subjcarub=' + document.getElementById('subjcarub_' + username).value + '&subjagrinu=' + document.getElementById('subjagrinu_' + username).value + '&subjagrinurub=' + document.getElementById('subjagrinurub_' + username).value);

}

//End upper primary function


//Start lower primary function

function savelowerRow(username, name, stdgrade, stream) {
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
                        // Reloads the current page
                            location.reload();

                    
                } else {
                    alert("Error saving data for student with username: " + username);
                }
            }
        };
        xhr.open("POST", "./savemarkslower.php", true); // Change the URL to your save data endpoint
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //xhr.send("username=" + username + "&name=" + name + "&stdgrade=" + stdgrade + "&stream=" + stream + "&subjmath=" + document.getElementById('subjmath_' + username).value + "&subjeng=" + document.getElementById('subjeng_' + username).value + '&subjread=' + document.getElementById('subjread_' + username).value + '&subjkisw=' + document.getElementById('subjkisw_' + username).value + '&subjkusoma=' + document.getElementById('subjkusoma_' + username).value + '&subjenv=' + document.getElementById('subjenv_' + username).value + '&subjca=' + document.getElementById('subjca_' + username).value + '&subjagrinu=' + document.getElementById('subjagrinu_' + username).value);
        xhr.send("username=" + username + "&name=" + name + "&stdgrade=" + stdgrade + "&stream=" + stream + "&subjmath=" + document.getElementById('subjmath_' + username).value + "&subjmathrub=" + document.getElementById('subjmathrub_' + username).value + "&subjeng=" + document.getElementById('subjeng_' + username).value + "&subjengrub=" + document.getElementById('subjengrub_' + username).value + '&subjread=' + document.getElementById('subjread_' + username).value + '&subjreadrub=' + document.getElementById('subjreadrub_' + username).value + '&subjkisw=' + document.getElementById('subjkisw_' + username).value + '&subjkiswrub=' + document.getElementById('subjkiswrub_' + username).value + '&subjkusoma=' + document.getElementById('subjkusoma_' + username).value + '&subjkusomarub=' + document.getElementById('subjkusomarub_' + username).value + '&subjenv=' + document.getElementById('subjenv_' + username).value + '&subjenvrub=' + document.getElementById('subjenvrub_' + username).value + '&subjca=' + document.getElementById('subjca_' + username).value + '&subjcarub=' + document.getElementById('subjcarub_' + username).value + '&subjagrinu=' + document.getElementById('subjagrinu_' + username).value + '&subjagrinurub=' + document.getElementById('subjagrinurub_' + username).value);

}

        //end lower primary

function Decide(username, name, stdgrade, stream) {
    if(stdgrade === "Grade Seven" || stdgrade === "Grade Eight" || stdgrade === "Grade Nine") {
        savejsRow(username, name, stdgrade, stream);
    }

    else if(stdgrade === "Grade Four" || stdgrade === "Grade Five" || stdgrade === "Grade Six") {
        saveupperRow(username, name, stdgrade, stream);
    }

    else if(stdgrade === "Grade One" || stdgrade === "Grade Two" || stdgrade === "Grade Three") {
        savelowerRow(username, name, stdgrade, stream);
    }

    else {
        alert("Please select a grade to continue.");
    }
}
    
</script>
