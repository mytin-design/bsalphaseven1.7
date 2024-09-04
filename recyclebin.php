<?php
// Database connectection parameters
require("./connect.php");

// Create connectection

// Check connectection
if ($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
}

// Query deleted items from Table1
$sql1 = "SELECT * FROM deletedjuniorgrades ";
$result1 = $connect->query($sql1);

// Query deleted items from Table2
$sql2 = "SELECT * FROM deleteduppergrades ";
$result2 = $connect->query($sql2);

// Query deleted items from Table3
$sql3 = "SELECT * FROM deletedlowergrades ";
$result3 = $connect->query($sql3);



// Query deleted items from Table4
$sql4 = "SELECT * FROM deletedstaffsubjects ";
$result4 = $connect->query($sql4);


// Query deleted items from Table5
$sql5 = "SELECT * FROM deletedstudentsubjects ";
$result5 = $connect->query($sql5);


// Query deleted items from Table6
$sql6 = "SELECT * FROM deletedannouncements ";
$result6 = $connect->query($sql6);



$cssStyles = '
            <style>
             body {
                margin:1pc;
                padding: 0;
                 box-sizing: border-box;
            }
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

                .recycle-home {
                    border: .1pc solid #eee;
                    border-radius: .1pc;
                    padding: .5pc;
                    text-decoration: none;
                    text-align: center;
                }

                .recycle-home:hover {
                background-color: #eee;
                }
            </style>
        ';

    echo $cssStyles;

// Output deleted items
echo "<a class='recycle-home' href='./cpsmarkssystem.php' title='View deleted notes, past papers, exams, assignments, anything.'>Recycle Bin</a>";
echo "<h2>Deleted Items</h2>";

// Display deleted items from Table1
if ($result1->num_rows > 0) {

    // =============
    echo '<div class="container">';
    echo '<h2>' .'Junior School Marks' . '</h2>';
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

    while($row = $result1->fetch_assoc()) {
        echo '<tr>';
            echo '<td>' . $counter++ . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td style="display:none;">' . $row['stdgrade'] . '</td>';
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
            echo "<td id='editbtnbox'><button class='streceditbtn restore deleter_x' onclick='deciderestoreRow(\"".$row['username']."\",\"".$row['stdgrade']."\")'>Restore</button></td>";

            echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '<div class="backbtnbox">';
    echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
    echo '</div>';
    echo '</div>';

    //============

} else {
    echo '<br>';
    echo '<br>';
    echo '<h2>' .'Junior School Marks' . '</h2>';
    echo "No deleted items found for Junior School.";
}



// Display deleted items from Table2
if ($result2->num_rows > 0) {
    // =======TABLE FOR UPPER ==========
    echo '<div class="container">';
    echo '<h2>' .'Upper Grades Marks'.'</h2>';
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
    while($row = $result2->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $counter++ . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td style="display:none;">' . $row['stdgrade'] . '</td>';
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
        //echo "<td id='editbtnbox'><button class='streceditbtn restore deleter_x' onclick='restoreRow(\"".$row['username']."\")'>Restore</button></td>";
        echo "<td id='editbtnbox'><button class='streceditbtn restore deleter_x' onclick='deciderestoreRow(\"".$row['username']."\",\"".$row['stdgrade']."\")'>Restore</button></td>";
    

        echo '</tr>';

    }
    echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '<div class="backbtnbox">';
            echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
            echo '</div>';
            echo '</div>';
} else {
    echo '<br>';
    echo '<br>';
    echo '<h2>' .'Upper Grades Marks'.'</h2>';
    echo "No deleted items found for Upper Grades.";
}


// Display deleted items from Table3
if ($result3->num_rows > 0) {
    echo '<div class="container">';
            echo '<h2>'.'Lower Grades Marks'.'</h2>';
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
    while($row = $result3->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $counter++ . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td style="display:none;">' . $row['stdgrade'] . '</td>';
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
        //echo "<td id='editbtnbox'><button class='streceditbtn restore deleter_x' onclick='restoreRow(\"".$row['username']."\")'>Restore</button></td>";
        echo "<td id='editbtnbox'><button class='streceditbtn restore deleter_x' onclick='deciderestoreRow(\"".$row['username']."\",\"".$row['stdgrade']."\")'>Restore</button></td>";
   

        echo '</tr>';
    }
    echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '<div class="backbtnbox">';
            echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
            echo '</div>';
            echo '</div>';
} else {
    echo '<br>';
    echo '<br>';
    echo '<h2>'.'Lower Grades Marks'.'</h2>';
    echo "No deleted items found in Lower grades.";
}



// Display deleted items from Table4
if ($result4->num_rows > 0) {
    echo '<div class="container">';
            echo '<h2>'.'Registered Staff Subjects'.'</h2>';
            echo '<div class="table-container">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>#</th>';
            echo '<th>Staff ID</th>';
            echo '<th>Subject Code</th>';
            echo '<th>Subject Name</th>';
            echo '<th>Class</th>';
            echo '<th>Stream</th>';
            echo '<th>Date</th>';
            echo '<th>Teacher</th>';
            echo '<th>Status</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $counter = 1;
    while($row = $result4->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $counter++ . '</td>';
        echo '<td>' . $row['staffid'] . '</td>';
        echo '<td>' . $row['subjectcode'] . '</td>';
        echo '<td>' . $row['subjectname'] . '</td>';
        echo '<td>' . $row['class'] . '</td>';
        echo '<td>' . $row['stream'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
        echo '<td>' . $row['teacher'] . '</td>';
        echo '<td>' . $row['status'] . '</td>';
        
        echo "<td id='editbtnbox'><button class='streceditbtn restore deleter_x' onclick='restoreRow(\"".$row['subjectcode']."\")'>Restore</button></td>";
   

        echo '</tr>';
    }
    echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '<div class="backbtnbox">';
            echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
            echo '</div>';
            echo '</div>';
} else {
    echo '<br>';
    echo '<br>';
    echo '<h2>'.'Registered Staff Subjects'.'</h2>';
    echo "No deleted items found in Registered Staff Subjects.";
}






// Display deleted items from Table5
if ($result5->num_rows > 0) {
    echo '<div class="container">';
            echo '<h2>'.'Registered Student Subjects'.'</h2>';
            echo '<div class="table-container">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>#</th>';
            echo '<th>Assessment No.</th>';
            echo '<th>Subject Code</th>';
            echo '<th>Subject Name</th>';
            echo '<th>Date</th>';
            echo '<th>Teacher</th>';
            echo '<th>Status</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $counter = 1;
    while($row = $result5->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $counter++ . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['subjectcode'] . '</td>';
        echo '<td>' . $row['subjectname'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
        echo '<td>' . $row['teacher'] . '</td>';
        echo '<td>' . $row['status'] . '</td>';
        
        echo "<td id='editbtnbox'><button class='streceditbtn restore deleter_x' onclick='restoreRow(\"".$row['subjectcode']."\")'>Restore</button></td>";
   

        echo '</tr>';
    }
    echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '<div class="backbtnbox">';
            echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
            echo '</div>';
            echo '</div>';
} else {
    echo '<br>';
    echo '<br>';
    echo '<h2>'.'Registered Student Subjects'.'</h2>';
    echo "No deleted items found in Registered Student Subjects.";
}






// Display deleted items from Table6
if ($result6->num_rows > 0) {
    echo '<div class="container">';
            echo '<h2>'.'Announcements'.'</h2>';
            echo '<div class="table-container">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>#</th>';
            echo '<th>Assessment No.</th>';
            echo '<th>Ann. Name</th>';
            echo '<th>Date Uploaded</th>';
            echo '<th>Ann. Author</th>';
            echo '<th>Ann. Type</th>';
            echo '<th>Ann. Grade</th>';
            echo '<th>Ann. File</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $counter = 1;
    while($row = $result6->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $counter++ . '</td>';
        echo '<td>' . $row['annsname'] . '</td>';
        echo '<td>' . $row['dateuploaded'] . '</td>';
        echo '<td>' . $row['annsauthor'] . '</td>';
        echo '<td>' . $row['annstype'] . '</td>';
        echo '<td>' . $row['annsgrade'] . '</td>';
        echo '<td>' . $row['annsdetails'] . '</td>';
        echo '<td>' . $row['annsfile'] . '</td>';

        
        echo "<td id='editbtnbox'><button class='streceditbtn restore deleter_x' onclick='restoreRow(\"".$row['annsname']."\")'>Restore</button></td>";
   

        echo '</tr>';
    }
    echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '<div class="backbtnbox">';
            echo '<a href="./cpsmarkssytem.php" class="bckbtnbx">Back</a>';
            echo '</div>';
            echo '</div>';
} else {
    echo '<br>';
    echo '<br>';
    echo '<h2>'.'Announcements'.'</h2>';
    echo "No deleted items found in Announcements.";
}




// Close connectection
$connect->close();
?>


<script>
    function restoreeditRow(username) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing Deleted item with Id: " + username);
    }

    function restorejsRow(username) {
        if (confirm("Are you sure you want to restore these Marks with Username: " + username + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("Marks with Assessment No.: " + username + " restored successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./restorejsMarks.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("username=" + username);
        }
    }

    function restoreupperRow(username) {
        if (confirm("Are you sure you want to restore these Marks with Username: " + username + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("Marks with Assessment No.: " + username + " restored successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./restoreupperMarks.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("username=" + username);
        }
    }



    function restorelowerRow(username) {
        if (confirm("Are you sure you want to restore these Marks with Username: " + username + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("Marks with Assessment No.: " + username + " restored successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./restorelowerMarks.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("username=" + username);
        }
    }

    function deciderestoreRow(username, stdgrade) {
    if(stdgrade === "Grade Seven" || stdgrade === "Grade Eight" || stdgrade === "Grade Nine") {
        restorejsRow(username);
    }

    else if(stdgrade === "Grade Four" || stdgrade === "Grade Five" || stdgrade === "Grade Six") {
        restoreupperRow(username);
    }

    else if(stdgrade === "Grade One" || stdgrade === "Grade Two" || stdgrade === "Grade Three") {
        restorelowerRow(username);
    }

    else {
        alert("Please select a grade to continue.");
    }
}
</script>