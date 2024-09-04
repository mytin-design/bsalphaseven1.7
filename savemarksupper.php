<?php

// Inserts marks to uppergrades table
// connect.php - Include your database connection code here if not already included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['name']) && isset($_POST['stdgrade']) && isset($_POST['stream'])) {
    // Sanitize user inputs
    function sanitize_input($input) {
        return htmlspecialchars(trim($input));
    }

    $username = sanitize_input($_POST['username']);
    $name = sanitize_input($_POST['name']);
    $stdgrade = sanitize_input($_POST['stdgrade']);
    $stream = sanitize_input($_POST['stream']);

    // Establish database connection
    require("./connect.php");

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $sql_fetch_student_data = "SELECT * FROM students WHERE username = ?";
    $stmt = $connect->prepare($sql_fetch_student_data);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result_student_data = $stmt->get_result();

    if ($result_student_data->num_rows > 0) {
        $row_student_data = $result_student_data->fetch_assoc();

        // Extracting fetched data (these lines might be redundant since you're using POST data)
        $username = $row_student_data['username'];
        $name = $row_student_data['name'];
        $stdgrade = $row_student_data['stdgrade'];
        $stream = $row_student_data['stream'];

        // Other data from the form
        $subjmath = isset($_POST['subjmath']) ? sanitize_input($_POST['subjmath']) : '';
        $subjmathrub = isset($_POST['subjmathrub']) ? sanitize_input($_POST['subjmathrub']) : '';
        $subjeng = isset($_POST['subjeng']) ? sanitize_input($_POST['subjeng']) : '';
        $subjengrub = isset($_POST['subjengrub']) ? sanitize_input($_POST['subjengrub']) : '';
        $subjkisw = isset($_POST['subjkisw']) ? sanitize_input($_POST['subjkisw']) : '';
        $subjkiswrub = isset($_POST['subjkiswrub']) ? sanitize_input($_POST['subjkiswrub']) : '';
        $subjscie = isset($_POST['subjscie']) ? sanitize_input($_POST['subjscie']) : '';
        $subjscierub = isset($_POST['subjscierub']) ? sanitize_input($_POST['subjscierub']) : '';
        $subjsocial = isset($_POST['subjsocial']) ? sanitize_input($_POST['subjsocial']) : '';
        $subjsocialrub = isset($_POST['subjsocialrub']) ? sanitize_input($_POST['subjsocialrub']) : '';
        $subjscre = isset($_POST['subjscre']) ? sanitize_input($_POST['subjscre']) : '';
        $subjscrerub = isset($_POST['subjscrerub']) ? sanitize_input($_POST['subjscrerub']) : '';
        $subjca = isset($_POST['subjca']) ? sanitize_input($_POST['subjca']) : '';
        $subjcarub = isset($_POST['subjcarub']) ? sanitize_input($_POST['subjcarub']) : '';
        $subjagrinu = isset($_POST['subjagrinu']) ? sanitize_input($_POST['subjagrinu']) : '';
        $subjagrinurub = isset($_POST['subjagrinurub']) ? sanitize_input($_POST['subjagrinurub']) : '';

        // Calculate total marks
        $total_marks = $subjmath + $subjeng + $subjkisw + $subjscie + $subjsocial + $subjscre + $subjca + $subjagrinu;

        // Inserting data into the 'grades' table using prepared statement and binding parameters
        $sql_insert = "INSERT INTO uppergrades (username, name, stdgrade, stream, subjmath, subjmathrub, subjeng, subjengrub, subjkisw, subjkiswrub, subjscie, subjscierub, subjsocial, subjsocialrub, subjscre, subjscrerub, subjca, subjcarub, subjagrinu, subjagrinurub, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $connect->prepare($sql_insert);
        $stmt_insert->bind_param("ssssssssssssssssssssi", $username, $name, $stdgrade, $stream, $subjmath, $subjmathrub, $subjeng, $subjengrub, $subjkisw, $subjkiswrub, $subjscie, $subjscierub, $subjsocial, $subjsocialrub, $subjscre, $subjscrerub, $subjca, $subjcarub, $subjagrinu, $subjagrinurub, $total_marks);

        if ($stmt_insert->execute()) {
            echo "<script>
                    alert('Data inserted successfully!');
                </script>";
        } else {
            echo "Error: " . $stmt_insert->error;
        }

        // Close statements
        $stmt_insert->close();
    } else {
        echo "<script>
                alert('No data found for this student ID.');
            </script>";
    }

    // Close statement and connection
    $stmt->close();
    $connect->close();
} else {
    echo "Invalid request.";
}
?>
