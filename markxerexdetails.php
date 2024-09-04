<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['grade']) && isset($_POST['stream']) && isset($_POST['year']) && isset($_POST['term']) && isset($_POST['type'])) {
    $grade = filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_STRING);
    $stream = filter_input(INPUT_POST, 'stream', FILTER_SANITIZE_STRING);
    $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
    $term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);


    require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    if ($grade && $stream && $year && $term && $type) {

            // Check if the regno already exists in the database
            $check_query = "SELECT * FROM marksdetails WHERE grade = ? AND stream = ? AND year = ? AND term = ? AND type = ?";
            $check_stmt = $connect->prepare($check_query);
            $check_stmt->bind_param('sssss', $grade,$stream,$year,$term,$type);
            $check_stmt->execute();
            $result = $check_stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>
                        alert('Marks details already exist.');
                        window.location = './markxer.html';


                    </script>";
            } else {
                // Prepare the SQL statement using a prepared statement to prevent SQL injection
                $insert_stmt = $connect->prepare("INSERT INTO marksdetails (grade,stream,year, term,type )  
                VALUES (?, ?, ?, ?, ?)");

                // Bind parameters and execute the query
                $insert_stmt->bind_param('sssss', $grade,$stream,$year,$term,$type);
                $insert_stmt->execute();

                if ($insert_stmt->affected_rows > 0) {
                    echo "<script>
                            alert('Marks details entered Successful!');
                            //window.location = './markxer.html';
                            //call the next slide btn
                            //document.querySelector('.next').click();

                        </script>";
                } else {
                    echo "<script>
                            alert('Kindly try again');
                        </script>";
                }

                // Close the statement for insertion
                $insert_stmt->close();
            }

            // Close the connection and statement for checking regno
            $check_stmt->close();

                

    } else {
        echo "<script>
                alert('All fields are required');
                window.location = './markxer.html';
            </script>";
    }        




    // // Close prepared statement and database connection
    // $stmt->close();
    
    $connect->close();


} else {
    echo "Invalid request.";
}

?>