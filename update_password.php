<?php
    require('./connect.php'); // This assumes you have a connect.php file for DB connection setup
    //session_start();

    if (isset($_SESSION['staffid'])) {
        $staffId = $_SESSION['staffid'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ustream'])) {
            $newStream = trim($_POST['ustream']);

            // Validate the new name
            if (!empty($newStream)) {
                // Prepare the update statement
                $update_stmt = $connect->prepare("UPDATE staff SET stream = ? WHERE staffid = ?");
                $update_stmt->bind_param('ss', $newStream, $staffId);
                $update_result = $update_stmt->execute();

                if ($update_result) {
                    echo "<script>
                            alert('Stream updated successfully.');
                            window.location = './staffsettings.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Failed to update Stream. Please try again.');
                            window.location = './staffsettings.php';
                        </script>";
                }

                $update_stmt->close();
            } else {
                echo "<script>
                        alert('Stream cannot be empty.');
                        window.location = './staffsettings.php';
                    </script>";
            }

            $connect->close();
        } else {
            // echo "<script>
            //         alert('Invalid request.');
            //         window.location = './staffsettings.php';
            //     </script>";
        }
    } else {
        echo "<script>
                alert('User not logged in. Please log in to update name.');
                window.location = './staffsettings.php';
            </script>";
    }
?>
