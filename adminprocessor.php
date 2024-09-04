

<?php
require('./connect.php');


//Function to sanitize user inputs

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

//check if form is submitted;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //$form_id = isset($_POST['formid']) ?  sanitize_input($_POST['formid'])
    $form_id = isset($_POST['formid']) ? sanitize_input($_POST['formid']): '';
    switch($form_id) {
        case 'logoform':
            handleLogoForm(); 
            break;
        case 'homeform':
            handleHomeForm();
            break;
        default:
            echo 'Form not found';
            break;
    }
}



function handleLogoForm() {
    //Process the logo form data
    
    //File handling
    $targetDirectory = "uploads/"; //Directory to store uploaded files;
    $targetFile = $targetDirectory . basename($_FILES["homelogo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_ENTENSION));

    //CHECK if image is an actual image or fake image

    if
    
}
?>