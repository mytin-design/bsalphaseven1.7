<?php
// List all registered students with pagination

require("./connect.php");

// Establish database connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Define how many results you want per page
$results_per_page = 10;

// Find out the number of results stored in the database
$sql = "SELECT COUNT(*) AS total FROM students";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$total_results = $row['total'];

// Determine number of total pages available
$total_pages = ceil($total_results / $results_per_page);

// Determine which page number visitor is currently on
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Determine the SQL LIMIT starting number for the results on the displaying page
$starting_limit = ($page - 1) * $results_per_page;

// Prepare SQL statement with LIMIT clause
$sql = "SELECT * FROM students ORDER BY name ASC LIMIT ?, ?";
$stmt = $connect->prepare($sql);

if (!$stmt) {
    die("Error in SQL query: " . $connect->error);
}

// Bind parameters (starting limit and results per page)
$stmt->bind_param("ii", $starting_limit, $results_per_page);

// Execute the prepared statement
$stmt->execute();

// Get result set
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        table.stdrecordstb {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.stdrecordstb th, table.stdrecordstb td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table.stdrecordstb th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        table.stdrecordstb tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table.stdrecordstb tr:hover {
            background-color: #eaeaea;
        }

        .pagination {
            margin: 20px 0;
            text-align: center;
        }

        .pagination a {
            color: #00796b;
            margin: 0 5px;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        .pagination a:hover {
            background-color: #00796b;
            color: #ffffff;
        }

        .streceditbtn {
            background-color: #00bcd4;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .streceditbtn:hover {
            background-color: #00796b;
        }
    </style>
</head>
<body>

<?php
// Check for data and display in HTML table
if ($result->num_rows > 0) {
    echo "<table id='stdRecords' class='stdrecordstb'>";
    echo "<tr><th>NO</th><th>STUDENT NAME</th><th>REG NO</th><th>STREAM</th><th>ENTRY MARKS</th><th>HEALTH STATUS</th><th>PROFILE PHOTO</th><th>GENDER</th><th>DATE OF BIRTH</th><th>ACTIONS</th></tr>";
    
    $count = $starting_limit + 1; // Start counting from the offset
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$count."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['stream']."</td>";
        echo "<td>".$row['stdgrade']."</td>";
        echo "<td>".$row['healthstatus']."</td>";
        echo "<td><img src='".$row['profileimg']."' alt='Profile Photo' style='width:50px;height:50px;'></td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['dateofbirth']."</td>";
        echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editstdRow(\"".$row['username']."\")'>Edit</button> <button class='streceditbtn' onclick='deletestdRow(\"".$row['username']."\")'>Delete</button></td>";
        echo "</tr>";
        $count++;
    }
    echo "</table>";
    
    // Display pagination
    echo "<div class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=$i' class='pagination-link'>" . $i . "</a> ";
    }
    echo "</div>";

} else {
    echo "<div class='notification-empty'>No results found.</div>";
    
}

// Close prepared statement and database connection
$stmt->close();
$connect->close();
?>

<script>
    function editstdRow(username) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing student with username: " + username);
    }

    function deletestdRow(username) {
        if (confirm("Are you sure you want to delete this student with username: " + username + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    alert("Student with username: " + username + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./delete_student.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("username=" + username);
        }
    }
</script>

</body>
</html>
