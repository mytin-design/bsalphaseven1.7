


<!--========================USING DIVS INSTEAD OF TABLE=======================================-->

<?php
require("./connect.php");

// Establish database connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
    
        }

        #annsDisp {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .notification-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid #2196F3;
            position: relative;
            transition: transform 0.2s ease;
        }

        .notification-card:hover {
            transform: scale(1.02);
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .notification-title {
            font-size: 18px;
            margin: 0;
            color: #333;
        }

        .notification-date {
            font-size: 12px;
            color: #888;
        }

        .notification-body {
            font-size: 14px;
            color: #555;
        }

        .notification-body p {
            margin: 5px 0;
        }

        .notification-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .annsbtn {
            background-color: #2196F3;
            color: #fff !important;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            
            transition: background-color 0.2s ease;
        }

        .annsbtn:hover {
            background-color: #1e88e5;
        }

        .notification-empty {
            text-align: center;
            font-size: 16px;
            color: #777;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<?php
// Prepare SQL statement with ORDER BY clause for 'dateuploaded'
$sql = "SELECT annsname, dateuploaded, annsauthor, annstype, annsgrade, annsdetails FROM announcements ORDER BY dateuploaded ASC";
$stmt = $connect->prepare($sql);

if (!$stmt) {
    die("Error in SQL query: " . $connect->error);
}

// Execute the prepared statement
$stmt->execute();
$result = $stmt->get_result();

// Check for data and display in notification style
if ($result->num_rows > 0) {
    echo "<div id='annsDisp' class='annsrecords'>";

    while ($row = $result->fetch_assoc()) {
        echo "<div class='notification-card'>";
        echo "<div class='notification-header'>";
        echo "<h4 class='notification-title'>" . htmlspecialchars($row['annsname']) . "</h4>";
        echo "<span class='notification-date'>" . htmlspecialchars($row['dateuploaded']) . "</span>";
        echo "</div>";
        echo "<div class='notification-body'>";
        echo "<p><strong>Author:</strong> " . htmlspecialchars($row['annsauthor']) . "</p>";
        echo "<p><strong>For:</strong> " . htmlspecialchars($row['annstype']) . " (Grade " . htmlspecialchars($row['annsgrade']) . ")</p>";
        echo "<p><strong>Details:</strong> " . htmlspecialchars($row['annsdetails']) . "</p>";
        echo "</div>";
        echo "<div class='notification-actions'>";
        echo "<button class='streceditbtn annsbtn' onclick='editanRow(\"" . htmlspecialchars($row['annsname']) . "\")'>Edit</button>";
        echo "<button class='streceditbtn annsbtn' onclick='deleteanRow(\"" . htmlspecialchars($row['annsname']) . "\")'>Delete</button>";
        echo "</div>";
        echo "</div>";
    }

    echo "</div>";
} else {
    echo "<div class='notification-empty'>There are currently no Announcements.</div>";
}

// Close prepared statement and database connection
$stmt->close();
$connect->close();
?>

<script>
function editanRow(annsname) {
    alert("Editing announcement with Title: " + annsname);
}

function deleteanRow(annsname) {
    if (confirm("Are you sure you want to delete this Announcement with Title Name: " + annsname + "?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                setTimeout(function() {
                    location.reload();
                }, 3000); 
            }
        };
        xhr.open("POST", "./deleteAnns.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("annsname=" + encodeURIComponent(annsname));
    }
}
</script>

</body>
</html>




