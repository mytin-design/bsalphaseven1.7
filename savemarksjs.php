
<!--Revised code-->

 
 

<?php

// Inserts marks into juniorgrades table
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

        $username = $row_student_data['username'];
        $name = $row_student_data['name'];
        $stdgrade = $row_student_data['stdgrade'];
        $stream = $row_student_data['stream'];

        $subjmath = isset($_POST['subjmath']) ? sanitize_input($_POST['subjmath']) : '';
        $subjmathrub = isset($_POST['subjmathrub']) ? sanitize_input($_POST['subjmathrub']) : '';
        $subjeng = isset($_POST['subjeng']) ? sanitize_input($_POST['subjeng']) : '';
        $subjengrub = isset($_POST['subjengrub']) ? sanitize_input($_POST['subjengrub']) : '';
        $subjkisw = isset($_POST['subjkisw']) ? sanitize_input($_POST['subjkisw']) : '';
        $subjkiswrub = isset($_POST['subjkiswrub']) ? sanitize_input($_POST['subjkiswrub']) : '';
        $subjsocial = isset($_POST['subjsocial']) ? sanitize_input($_POST['subjsocial']) : '';
        $subjsocialrub = isset($_POST['subjsocialrub']) ? sanitize_input($_POST['subjsocialrub']) : '';
        $subjscre = isset($_POST['subjscre']) ? sanitize_input($_POST['subjscre']) : '';
        $subjscrerub = isset($_POST['subjscrerub']) ? sanitize_input($_POST['subjscrerub']) : '';
        $subjintscie = isset($_POST['subjintscie']) ? sanitize_input($_POST['subjintscie']) : '';
        $subjintscierub = isset($_POST['subjintscierub']) ? sanitize_input($_POST['subjintscierub']) : '';
        $subjpretech = isset($_POST['subjpretech']) ? sanitize_input($_POST['subjpretech']) : '';
        $subjpretechrub = isset($_POST['subjpretechrub']) ? sanitize_input($_POST['subjpretechrub']) : '';
        $subjca = isset($_POST['subjca']) ? sanitize_input($_POST['subjca']) : '';
        $subjcarub = isset($_POST['subjcarub']) ? sanitize_input($_POST['subjcarub']) : '';
        $subjagrinu = isset($_POST['subjagrinu']) ? sanitize_input($_POST['subjagrinu']) : '';
        $subjagrinurub = isset($_POST['subjagrinurub']) ? sanitize_input($_POST['subjagrinurub']) : '';

        if ($subjmath && $subjmathrub && $subjeng && $subjengrub && $subjkisw && $subjkiswrub && $subjsocial && $subjsocialrub && $subjscre && $subjscrerub && $subjintscie && $subjintscierub && $subjpretech && $subjpretechrub && $subjca && $subjcarub && $subjagrinu && $subjagrinurub) {

            $check_query = "SELECT * FROM juniorgrades WHERE username=?";
            $check_stmt = $connect->prepare($check_query);
            $check_stmt->bind_param('s', $username);
            $check_stmt->execute();
            $result = $check_stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>
                        alert('Marks already exists. Please choose a different student.');
                      </script>";
            } else {
                $total_marks = $subjmath + $subjeng + $subjkisw + $subjsocial + $subjscre + $subjintscie + $subjpretech + $subjca + $subjagrinu;

                $sql_insert = "INSERT INTO juniorgrades (username, name, stdgrade, stream, subjmath, subjmathrub, subjeng, subjengrub, subjkisw, subjkiswrub, subjsocial, subjsocialrub, subjscre, subjscrerub, subjintscie, subjintscierub, subjpretech, subjpretechrub, subjca, subjcarub, subjagrinu, subjagrinurub, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt_insert = $connect->prepare($sql_insert);
                $stmt_insert->bind_param("ssssssssssssssssssssssi", $username, $name, $stdgrade, $stream, $subjmath, $subjmathrub, $subjeng, $subjengrub, $subjkisw, $subjkiswrub, $subjsocial, $subjsocialrub, $subjscre, $subjscrerub, $subjintscie, $subjintscierub, $subjpretech, $subjpretechrub,  $subjca, $subjcarub, $subjagrinu, $subjagrinurub, $total_marks);

                if ($stmt_insert->execute()) {
                    echo "<script>
                            alert('Data inserted successfully!');
                          </script>";
                } else {
                    echo "<script>
                            alert('An error occurred while processing your request. Please try again later.');
                          </script>";
                }

                $stmt_insert->close();
            }

            $check_stmt->close();
        } else {
            echo "<script>
                    alert('All fields are required');
                  </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('No data found for this student ID.');
              </script>";
    }

    

} else {
    echo "Invalid request.";
}


?>

