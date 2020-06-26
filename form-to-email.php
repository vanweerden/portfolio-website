<?php
$name = $email = $subject = $message = "";

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
  $data = stripslash($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Send as e-mail
// $email_from = "andrew@vanweerden.me";
// $email_subject = "$subject";
// $email_body = "You have received a new message from $name\n".
//                   "Here is the message:\n $message";
//
// $to = "ando.vanweerden@gmail.com";
// $headers = "From: $email_from\r\n";
// $headers .= "Reply-To: $visitor_email\r\n";

// TEST
$test_message = "I hope this works, mate!\r\n";

mail("ando.vanweerden@gmail.com","test email",$test_message);
?>
