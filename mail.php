<?php
//get data from form  

$clientName = htmlspecialchars($_POST['clientName']);
$clientEmail= htmlspecialchars($_POST['clientEmail']);
$clientPhone = htmlspecialchars($_POST['clientPhone']);
$clientRequest = htmlspecialchars($_POST['clientRequest']);
$to = "info@presence.co.ke";
$subject = "Presence:New Help Request!";
$txt ="Name = ". $clientName . "\r\n  Email = " . $clientEmail . "\r\n  Client Phone = " . $clientPhone . "\r\n Message = " . $clientRequest;
$headers = "From: ".$clientEmail . "\r\n" .
"CC: sales@presence.co.ke";
if($clientEmail!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.html");

/* Prepare autoresponder subject */
$respond_subject = "Thank you for contacting us!";

/* Prepare autoresponder message */
$respond_message = "Hello! 

Thank you for contacting us! We will get back to you
as soon as possible!

Yours sincerely,

Support Team.
www.presence.co.ke
";

/* Send the message using mail() function */
$headers = "From: info@presence.co.ke";
mail($clientEmail, $respond_subject, $respond_message, $headers);
?>


<?php
function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>