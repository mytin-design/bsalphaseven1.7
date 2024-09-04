<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rubricname']) && isset($_POST['subjectname']) && isset($_POST['grade'])  && isset($_POST['fromee']) && isset($_POST['toee']) && isset($_POST['fromme']) && isset($_POST['tome']) && isset($_POST['fromae']) && isset($_POST['toae']) && isset($_POST['frombe']) && isset($_POST['tobe']) ) {
    $rubricname = filter_input(INPUT_POST, 'rubricname', FILTER_SANITIZE_STRING);
    $subjectname = filter_input(INPUT_POST, 'subjectname', FILTER_SANITIZE_STRING);
    $grade = filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_STRING);
    $fromee = filter_input(INPUT_POST, 'fromee', FILTER_SANITIZE_STRING);
    $toee = filter_input(INPUT_POST, 'toee', FILTER_SANITIZE_STRING);
    $fromme = filter_input(INPUT_POST, 'fromme', FILTER_SANITIZE_STRING);
    $tome = filter_input(INPUT_POST, 'tome', FILTER_SANITIZE_STRING);
    $fromae = filter_input(INPUT_POST, 'fromae', FILTER_SANITIZE_STRING);
    $toae = filter_input(INPUT_POST, 'toae', FILTER_SANITIZE_STRING);
    $frombe = filter_input(INPUT_POST, 'frombe', FILTER_SANITIZE_STRING);
    $tobe = filter_input(INPUT_POST, 'tobe', FILTER_SANITIZE_STRING);
    

    require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    if ($rubricname && $subjectname && $grade && $fromee && $toee && $fromme && $tome  && $fromae && $toae && $frombe && $tobe ) {

            // Check if the regno already exists in the database
            $check_query = "SELECT * FROM rubrics WHERE grade = ? AND subjectname = ? ";
            $check_stmt = $connect->prepare($check_query);
            $check_stmt->bind_param('ss', $grade,$subjectname);
            $check_stmt->execute();
            $result = $check_stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>
                        alert('Rubrics for this subject and grade already exist.');
                        window.location = './markxer.php';
                    </script>";
            } else {
                // Prepare the SQL statement using a prepared statement to prevent SQL injection
                $insert_stmt = $connect->prepare("INSERT INTO rubrics (rubricname,subjectname,grade,fromee,toee,fromme,tome,fromae,toae,frombe,tobe)  
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                // Bind parameters and execute the query
                $insert_stmt->bind_param('sssssssssss', $rubricname, $subjectname, $grade, $fromee,$toee,$fromme,$tome,$fromae,$toae,$frombe,$tobe);
                $insert_stmt->execute();

                if ($insert_stmt->affected_rows > 0) {
                    echo "<script>
                            alert('Rubrics entered Successful!');
                            window.location = './markxer.php';

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