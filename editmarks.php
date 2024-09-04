<?php
//HELPS TO EDIT EACH LISTED LEARNER'S GRADES;



// The edit funtionality isnt working
//This is the error it that is given: 

//{"success":true,"subjmath":null,"subjeng":null,"subjkisw":null,"subjscie":null,"subjscre":null,"subjintscie":null,"subjpretech":null,"subjca":null,"subjagrinu":null}
//It seems the data is not retrievd from the database;



// editmarks.php

// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
//     $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);

//     require("./connect.php");

//     // Establish database connection
//     if ($connect->connect_error) {
//         die("Connection failed: " . $connect->connect_error);
//     }

//     // Prepare SQL statement to fetch data for the specified student
//     $sql = "SELECT * FROM students WHERE username = ?";
//     $stmt = $connect->prepare($sql);

//     if (!$stmt) {
//         die("Error in SQL query: " . $connect->error);
//     }

//     // Bind parameters and execute the prepared statement
//     $stmt->bind_param("s", $username);
//     $stmt->execute();

//     // Get result set
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         // Fetch data for the student
//         $row = $result->fetch_assoc();

//         // Close prepared statement and database connection
//         $stmt->close();
//         $connect->close();

//         // Prepare JSON response
//         $response = array(
//             'success' => true,
//             'subjmath' => $row['subjmath'],
//             'subjeng' => $row['subjeng'],
//             'subjkisw' => $row['subjkisw'],
//             'subjscie' => $row['subjscie'],
//             'subjscre' => $row['subjscre'],
//             'subjintscie' => $row['subjintscie'],
//             'subjpretech' => $row['subjpretech'],
//             'subjca' => $row['subjca'],
//             'subjagrinu' => $row['subjagrinu'],
//         );

//         // Send JSON response
//         header('Content-Type: application/json');
//         echo json_encode($response);
//     } else {
//         // Close prepared statement and database connection
//         $stmt->close();
//         $connect->close();

//         // Prepare JSON response for failure
//         $response = array(
//             'success' => false,
//         );

//         // Send JSON response
//         header('Content-Type: application/json');
//         echo json_encode($response);
//     }
// } else {
//     // Invalid request
//     header("HTTP/1.1 400 Bad Request");
//     echo "Invalid request.";
// }
?>



<?php

// editmarks.php

// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
//     $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);

//     require("./connect.php");

//     // Establish database connection
//     if ($connect->connect_error) {
//         die("Connection failed: " . $connect->connect_error);
//     }

//     // Prepare SQL statement to fetch data for the specified student
//     $sql = "SELECT * FROM students WHERE username = ?";
//     $stmt = $connect->prepare($sql);

//     if (!$stmt) {
//         // Provide detailed error message
//         header("HTTP/1.1 500 Internal Server Error");
//         die("Error in SQL query: " . $connect->error);
//     }

//     // Bind parameters and execute the prepared statement
//     $stmt->bind_param("s", $username);
//     $stmt->execute();

//     // Get result set
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         // Fetch data for the student
//         $row = $result->fetch_assoc();

//         // Close prepared statement and database connection
//         $stmt->close();
//         $connect->close();

//         // Prepare JSON response
//         $response = array(
//             'success' => true,
//             'subjmath' => $row['subjmath'],
//             'subjeng' => $row['subjeng'],
//             'subjkisw' => $row['subjkisw'],
//             'subjscie' => $row['subjscie'],
//             'subjscre' => $row['subjscre'],
//             'subjintscie' => $row['subjintscie'],
//             'subjpretech' => $row['subjpretech'],
//             'subjca' => $row['subjca'],
//             'subjagrinu' => $row['subjagrinu'],
//         );

//         // Send JSON response
//         header('Content-Type: application/json');
//         echo json_encode($response);
//     } else {
//         // Close prepared statement and database connection
//         $stmt->close();
//         $connect->close();

//         // Prepare JSON response for failure
//         $response = array(
//             'success' => false,
//             'message' => 'No matching user found.',
//         );

//         // Send JSON response
//         header('Content-Type: application/json');
//         echo json_encode($response);
//     }
// } else {
//     // Invalid request
//     header("HTTP/1.1 400 Bad Request");
//     echo "Invalid request.";
// }
?>



<?php

// editmarks.php

// The edit funtionality isnt working
//This is the error it that is given: 

//{"success":true,"subjmath":null,"subjeng":null,"subjkisw":null,"subjscie":null,"subjscre":null,"subjintscie":null,"subjpretech":null,"subjca":null,"subjagrinu":null}
//It seems the data is not retrievd from the database;



if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
    $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);

    require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        header("HTTP/1.1 500 Internal Server Error");
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement to fetch data for the specified student
    $sql = "SELECT * FROM students WHERE username = ?";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        // Provide detailed error message
        header("HTTP/1.1 500 Internal Server Error");
        die("Error in SQL query: " . $connect->error);
    }

    // Bind parameters and execute the prepared statement
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch data for the student
        $row = $result->fetch_assoc();

        // Debug statement
        var_dump($row);
        // Close prepared statement and database connection

        
            
        $stmt->close();
        $connect->close();

        // Prepare JSON response
        $response = array(
            'success' => true,
            'subjmath' => isset($row['subjmath']) ? $row['subjmath'] : null,
            'subjeng' => isset($row['subjeng']) ? $row['subjeng'] : null,
            'subjkisw' => isset($row['subjkisw']) ? $row['subjkisw'] : null,
            'subjscie' => isset($row['subjscie']) ? $row['subjscie'] : null,
            'subjscre' => isset($row['subjscre']) ? $row['subjscre'] : null,
            'subjintscie' => isset($row['subjintscie']) ? $row['subjintscie'] : null,
            'subjpretech' => isset($row['subjpretech']) ? $row['subjpretech'] : null,
            'subjca' => isset($row['subjca']) ? $row['subjca'] : null,
            'subjagrinu' => isset($row['subjagrinu']) ? $row['subjagrinu'] : null,
        );

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Close prepared statement and database connection
        $stmt->close();
        $connect->close();

        // Prepare JSON response for failure
        $response = array(
            'success' => false,
            'message' => 'No matching user found.',
        );

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    // Invalid request
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid request.";
}
?>


