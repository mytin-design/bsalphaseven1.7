<!-- TO SHOW MARKS AND ANALYSIS FOR GRADE 1 -->

<?php

require("./connect.php");

// Establish database connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Prepare SQL statement with parameters for 'stdgrade' and 'stream'
$sql = "SELECT * FROM lowergrades WHERE stdgrade = 'Grade One' ORDER BY total DESC";
$stmt = $connect->prepare($sql);

if (!$stmt) {
    die("Error in SQL query: " . $connect->error);
}

// Execute the prepared statement
$stmt->execute();

// Get result set
$result = $stmt->get_result();

// Calculate subject totals
$mathTotal = 0;
$engTotal = 0;
$readTotal = 0;
$kiswTotal = 0;
$kusomaTotal = 0;
$envTotal = 0;
$caTotal = 0;
$agriNuTotal = 0;
$totalOverall = 0;

// Start output buffering
ob_start();

// CSS styles for A4 size, header, and footer
echo '
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        width: 100%; 
        
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        page-break-after: always; /* Ensures each container starts on a new page */
    }
    .header {
    width: 95%; 
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            height: 150px;
        }
    .footer {
    width: 100%; 
            background-color: #333;
    color: #fff;
        margin-top: 20px;
        text-align: center;
        font-size: 18px;
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
        text-align: center;
        border: 1px solid #ddd;
        font-size: smaller;
    }
     table th {
            background-color: #4CAF50;
            color: white;
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

// Generate the HTML content dynamically
echo '<div class="container">';

// Header section with school logo and address
echo '<div class="header">';
echo '<div class="logo">';
echo '<img src="./images/cpslogomain.png" alt="School Logo">'; // Update path to your logo image
echo '</div>';
echo '<div class="address">';
echo '<p>School Name</p>';
echo '<p>Street Address, City</p>';
echo '<p>Phone: (123) 456-7890</p>';
echo '<p>Email: info@school.com</p>';
echo '</div>';
echo '</div>';

echo '<h2>' . 'Grade One Marks' . '</h2>';
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

if ($result->num_rows > 0) {
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
        echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editstaffRow(\"" . $row['username'] . "\")'>Edit</button> <button class='streceditbtn deleter_x' onclick='deletestaffRow(\"" . $row['username'] . "\")'>Delete</button></td>";
        echo '</tr>';
    }

    // Totals and Mean rows
    $numberOfStudents = $result->num_rows;
    $mathMean = $mathTotal / $numberOfStudents;
    $engMean = $engTotal / $numberOfStudents;
    $readMean = $readTotal / $numberOfStudents;
    $kiswMean = $kiswTotal / $numberOfStudents;
    $kusomaMean = $kusomaTotal / $numberOfStudents;
    $envMean = $envTotal / $numberOfStudents;
    $caMean = $caTotal / $numberOfStudents;
    $agriNuMean = $agriNuTotal / $numberOfStudents;
    $totalMean = $totalOverall / $numberOfStudents;

    echo '<tr>';
    echo '<td class="bold">' . 'TOTAL' . '</td>';
    echo '<td>' . '___' . '</td>';
    echo '<td>' . '___' . '</td>';
    echo '<td>' . $mathTotal . '</td>';
    echo '<td>' . 'MathRub' . '</td>';
    echo '<td>' . $engTotal . '</td>';
    echo '<td>' . 'EngRub' . '</td>';
    echo '<td>' . $readTotal . '</td>';
    echo '<td>' . 'ReadRub' . '</td>';
    echo '<td>' . $kiswTotal . '</td>';
    echo '<td>' . 'KiswRub' . '</td>';
    echo '<td>' . $kusomaTotal . '</td>';
    echo '<td>' . 'KusomaRub' . '</td>';
    echo '<td>' . $envTotal . '</td>';
    echo '<td>' . 'EnvRub' . '</td>';
    echo '<td>' . $caTotal . '</td>';
    echo '<td>' . 'CARub' . '</td>';
    echo '<td>' . $agriNuTotal . '</td>';
    echo '<td>' . 'AgriNuRub' . '</td>';
    echo '<td>' . $totalOverall . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>' . 'MEAN' . '</td>';
    echo '<td>' . '___' . '</td>';
    echo '<td>' . '___' . '</td>';
    echo '<td>' . $mathMean . '</td>';
    echo '<td>' . '####' . '</td>';
    echo '<td>' . $engMean . '</td>';
    echo '<td>' . '####' . '</td>';
    echo '<td>' . $readMean . '</td>';
    echo '<td>' . '####' . '</td>';
    echo '<td>' . $kiswMean . '</td>';
    echo '<td>' . '####' . '</td>';
    echo '<td>' . $kusomaMean . '</td>';
    echo '<td>' . '####' . '</td>';
    echo '<td>' . $envMean . '</td>';
    echo '<td>' . '####' . '</td>';
    echo '<td>' . $caMean . '</td>';
    echo '<td>' . '####' . '</td>';
    echo '<td>' . $agriNuMean . '</td>';
    echo '<td>' . '####' . '</td>';
    echo '<td>' . $totalMean . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</div>';

// Footer section with contact info and social media handles
echo '<div class="footer">';
echo '<p>Contact Us: (123) 456-7890 | Email: info@school.com</p>';
echo '<p>Follow us on: Facebook | Twitter | Instagram</p>';
echo '</div>';

echo '<div class="backbtnbox">';
echo '<a href="./cpsmarkssystem.php" class="bckbtnbx">Back</a>';
echo '</div>';
echo '<div class="backbtnbox">';
echo '<a href="./generatePdf.php" class="bckbtnbx">PDF</a>';
echo '<a href="./generateResults.php" class="bckbtnbx">Download Results</a>';
echo '</div>';
echo '</div>';

// Capture the HTML output
$htmlContent = ob_get_clean();

// Write the HTML content to a file
$fileName = 'grade_one_marks.html';
file_put_contents($fileName, $htmlContent);

// Close prepared statement and database connection
$stmt->close();
$connect->close();

echo "HTML content has been saved to $fileName.";

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
                    alert("Marks with Assessment No.: " + username + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./deletegradeonemarks.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("username=" + username);
        }
    }
</script>
