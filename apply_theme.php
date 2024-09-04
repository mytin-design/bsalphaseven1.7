<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected theme from the POST request
    $selectedTheme = $_POST['themename'];

    // connectect to your database 
    require('./connect.php');


    // Check connectection
    if ($connect->connect_error) {
        die("connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement to fetch colors for the selected theme
    $stmt = $connect->prepare("SELECT * FROM staffthemes WHERE themename = ?");
    $stmt->bind_param("s", $selectedTheme);

    // Execute the query
    $stmt->execute();

    // Store the result
    $result = $stmt->get_result();

    // Initialize an associative array to store colors
    $colors = array();

    // Fetch colors from the result set
    while ($row = $result->fetch_assoc()) {
        // Store color name and code in the $colors array
        $colors[$row['colorname']] = $row['colorcode'];
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connectection
    $connect->close();

    // Apply colors to the webpage
    echo "<script>";
    echo "document.body.style.backgroundColor = '" . $colors['background'] . "';";
    // Apply other colors to specific elements as needed
    echo "</script>";
}
?>
