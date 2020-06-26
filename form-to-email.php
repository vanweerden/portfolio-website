<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$name = $visitor_email = $subject = $message = "";

// Assign input to variables
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = cleanup_input($_POST["name"]);
  $visitor_email = cleanup_input($_POST["email"]);
  $subject = cleanup_input($_POST["subject"]);
  $message = cleanup_input($_POST["message"]);
}

// Clean up data
function cleanup_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Send as e-mail
$email_from = $visitor_email;
$email_body = "You have received a new message from $name\n".
                  "Here is the message:\n $message";
//
$to = "ando.vanweerden@gmail.com";
$headers = "From: $email_from \r\n";
// $headers .= "Reply-To: $visitor_email\r\n";

// TEST
$test_message = "Testing again withou variables uncommented.\r\n";

mail($to,$subject,$email_body,$headers);
?>
