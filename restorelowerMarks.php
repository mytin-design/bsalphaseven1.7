<?php

//Restore upper grades
// connect.php - Include your database connection code here if not already included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = $_POST['username'];

    // Establish database connection
    require("./connect.php");

    // Prepare SQL statement to select data from 'lowergrades' table
    $sql_select = "SELECT * FROM deletedlowergrades WHERE username = ?";
    $stmt_select = $connect->prepare($sql_select);

    if (!$stmt_select) {
        die("Error in SQL query: " . $connect->error);
    }

    // Bind parameters and execute the prepared statement to select data
    $stmt_select->bind_param("s", $username);
    $stmt_select->execute();

    // Get result set
    $result_select = $stmt_select->get_result();

    // Check for data in 'lowergrades' table
    if ($result_select->num_rows > 0) { 

            // Prepare the SQL statement using a prepared statement to insert into 'deletedlowergrades' table
            $sql_insert = "INSERT INTO lowergrades (username, name, stdgrade, stream, subjmath, subjmathrub, subjeng, subjengrub, subjread, subjreadrub, subjkisw, subjkiswrub,subjkusoma,subjkusomarub, subjenv, subjenvrub,subjca, subjcarub, subjagrinu, subjagrinurub, total)  
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = $connect->prepare($sql_insert);
    
            // Bind parameters and execute the query to insert into 'deletedlowergrades' table
            while ($row = $result_select->fetch_assoc()) {
                $stmt_insert->bind_param("ssssssssssssssssssssi", $row['username'], $row['name'], $row['stdgrade'], $row['stream'], $row['subjmath'], $row['subjmathrub'], $row['subjeng'], $row['subjengrub'],$row['subjread'], $row['subjreadrub'],  $row['subjkisw'], $row['subjkiswrub'], $row['subjkusoma'], $row['subjkusomarub'], $row['subjenv'], $row['subjenvrub'], $row['subjca'], $row['subjcarub'], $row['subjagrinu'], $row['subjagrinurub'], $row['total']);
                $stmt_insert->execute();
            }
            
        // Check if insertion was successful
        if ($stmt_insert->affected_rows > 0) { 
            // Prepare a DELETE statement to remove data from 'lowergrades' table
            $sql_delete = "DELETE FROM deletedlowergrades WHERE username = ?";
            $stmt_delete = $connect->prepare($sql_delete);
        
            if (!$stmt_delete) {
                die("Error in SQL query: " . $connect->error);
            }
        
            // Bind the parameter and execute the DELETE statement
            $stmt_delete->bind_param("s", $username);
            if ($stmt_delete->execute()) {
                echo "Marks Restored successfully.";
            } else {
                echo "Error restoring Marks: " . $stmt_delete->error;
            }
        } else {
            echo "<script>
                    alert('Kindly try again. No marks moved.');
                </script>";
        }

    } else {
        echo "<script>alert('There are currently no Registered students in this class / stream.'); window.location.href = './entermarks.php';</script>";
    }

    // Close the prepared statements and database connection
    $stmt_select->close();
    $stmt_insert->close();
    $stmt_delete->close();
    $connect->close();
} else {
    echo "Invalid request.";
}
?>
