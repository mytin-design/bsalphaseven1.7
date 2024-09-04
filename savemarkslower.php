

<!--Revised code-->

<?php

//Inserts mark to lowergrades table
//connect.php - Include your database connection code here if not already included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['name']) && isset($_POST['stdgrade']) && isset($_POST['stream'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $stdgrade = $_POST['stdgrade'];
    $stream = $_POST['stream'];


    // Establish database connection
    require("./connect.php");

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    function sanitize_input($input) {
        return htmlspecialchars(trim($input));
    }
    $sql_fetch_student_data = "SELECT * FROM students WHERE username = ?";
    $stmt = $connect->prepare($sql_fetch_student_data);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result_student_data = $stmt->get_result();

    if ($result_student_data->num_rows > 0) {
        $row_student_data = $result_student_data->fetch_assoc();

        // Extracting fetched data
        $username = $row_student_data['username'];
        $name = $row_student_data['name'];
        $stdgrade = $row_student_data['stdgrade'];
        $stream = $row_student_data['stream'];

        // Other data from the form
        $subjmath = isset($_POST['subjmath']) ? sanitize_input($_POST['subjmath']) : '';
        $subjmathrub = isset($_POST['subjmathrub']) ? sanitize_input($_POST['subjmathrub']) : '';
        $subjeng = isset($_POST['subjeng']) ? sanitize_input($_POST['subjeng']) : '';
        $subjengrub = isset($_POST['subjengrub']) ? sanitize_input($_POST['subjengrub']) : '';
        $subjread = isset($_POST['subjread']) ? sanitize_input($_POST['subjread']) : '';
        $subjreadrub = isset($_POST['subjreadrub']) ? sanitize_input($_POST['subjreadrub']) : '';
        $subjkisw = isset($_POST['subjkisw']) ? sanitize_input($_POST['subjkisw']) : '';
        $subjkiswrub = isset($_POST['subjkiswrub']) ? sanitize_input($_POST['subjkiswrub']) : '';
        $subjkusoma = isset($_POST['subjkusoma']) ? sanitize_input($_POST['subjkusoma']) : '';
        $subjkusomarub = isset($_POST['subjkusomarub']) ? sanitize_input($_POST['subjkusomarub']) : '';
        $subjenv = isset($_POST['subjenv']) ? sanitize_input($_POST['subjenv']) : '';
        $subjenvrub = isset($_POST['subjenvrub']) ? sanitize_input($_POST['subjenvrub']) : '';
        $subjca = isset($_POST['subjca']) ? sanitize_input($_POST['subjca']) : '';
        $subjcarub = isset($_POST['subjcarub']) ? sanitize_input($_POST['subjcarub']) : '';
        $subjagrinu = isset($_POST['subjagrinu']) ? sanitize_input($_POST['subjagrinu']) : '';
        $subjagrinurub = isset($_POST['subjagrinurub']) ? sanitize_input($_POST['subjagrinurub']) : '';



        // Calculate total marks
        $total_marks = $subjmath + $subjeng + $subjread + $subjkisw + $subjkusoma + $subjenv + $subjca + $subjagrinu;

        // Inserting data into the 'grades' table using prepared statement and binding parameters
        $sql_insert = "INSERT INTO lowergrades (username, name, stdgrade, stream, subjmath, subjmathrub, subjeng, subjengrub, subjread, subjreadrub, subjkisw, subjkiswrub, subjkusoma, subjkusomarub, subjenv, subjenvrub, subjca, subjcarub, subjagrinu, subjagrinurub, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $connect->prepare($sql_insert);
        $stmt_insert->bind_param("ssssssssssssssssssssi", $username, $name, $stdgrade, $stream, $subjmath, $subjmathrub, $subjeng, $subjengrub, $subjread, $subjreadrub, $subjkisw, $subjkiswrub, $subjkusoma, $subjkusomarub, $subjenv, $subjenvrub, $subjca, $subjcarub, $subjagrinu, $subjagrinurub, $total_marks);

        if ($stmt_insert->execute()) {
            
            echo "<script>
                    alert('Data inserted successfully!');
                </script>";
        } else {
            echo "Error: " . $stmt_insert->error;
        }
    } else {
         echo "<script>
                    alert('No data found for this student ID.');
                </script>";
    }

    // Close statements and connection
    $stmt->close();
    $stmt_insert->close();
    $connect->close();
} else {
    echo "Invalid request.";
}
?>












