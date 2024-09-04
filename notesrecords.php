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
    <title>Notes</title>
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            margin: 0;
        }

        #annsDisp {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .phprecordsflexer {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 320px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid #00bcd4;
            position: relative;
            transition: transform 0.2s ease;
        }

        .phprecordsflexer:hover {
            transform: scale(1.02);
        }

        .phprecordsflexer h4 {
            font-size: 20px;
            color: #00796b;
            margin-bottom: 10px;
        }

        .phprecordsflexer p {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        .phprecordsflexer span {
            font-weight: bold;
            color: #00796b;
        }

        .streceditbtn {
            background-color: #00bcd4;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-right: 5px;
        }

        .streceditbtn:hover {
            background-color: #008ba3;
        }

        .deleter_x {
            background-color: #f44336;
        }

        .deleter_x:hover {
            background-color: #d32f2f;
        }

        .notification-empty {
            text-align: center;
            font-size: 16px;
            color: #777;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<?php
// Prepare SQL statement with ORDER BY clause for 'dateuploaded'
$sql = "SELECT * FROM notes ORDER BY dateuploaded ASC";
$stmt = $connect->prepare($sql);

if (!$stmt) {
    die("Error in SQL query: " . $connect->error);
}

// Execute the prepared statement
$stmt->execute();
$result = $stmt->get_result();

// Check for data and display in card style
if ($result->num_rows > 0) {
    echo "<div id='annsDisp' class='annsrecords'>";

    $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<div class='phprecordsflexer'>";
        echo "<h4>Note No.: <span>" . $count . "</span></h4>";
        echo "<p><span>Title:</span> " . htmlspecialchars($row['notesname']) . "</p>";
        echo "<p><span>Date Uploaded:</span> " . htmlspecialchars($row['dateuploaded']) . "</p>";
        echo "<p><span>Teacher:</span> " . htmlspecialchars($row['notestr']) . "</p>";
        echo "<p><span>Subject/Type:</span> " . htmlspecialchars($row['notestype']) . "</p>";
        echo "<p><span>Grade:</span> " . htmlspecialchars($row['notesgrade']) . "</p>";
        echo "<p><a href='" . htmlspecialchars($row['notesfile']) . "'>" . htmlspecialchars($row['notesfile']) . "</a></p>";
        echo "<div id='editbtnbox'><button class='streceditbtn' onclick='editnotRow(\"" . htmlspecialchars($row['notesname']) . "\")'>Edit</button>";
        echo "<button class='streceditbtn deleter_x' onclick='deletenotRow(\"" . htmlspecialchars($row['notesname']) . "\")'>Delete</button></div>";
        echo "</div>";
        $count++;
    }

    echo "</div>";
} else {
    echo "<div class='notification-empty'>There are currently no Notes.</div>";
}

// Close prepared statement and database connection
$stmt->close();
$connect->close();
?>

<script>
    function editnotRow(notesname) {
        alert("Editing notes with Title: " + notesname);
    }

    function deletenotRow(notesname) {
        if (confirm("Are you sure you want to delete these notes with Title Name: " + notesname + "?")) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    alert("Notes with Title Name: " + notesname + " deleted successfully.");
                    location.reload();
                }
            };
            xhr.open("POST", "./deleteNotes.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("notesname=" + encodeURIComponent(notesname));
        }
    }
</script>

</body>
</html>
