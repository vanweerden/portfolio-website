<!DOCTYPE html>
<html>
  <head>
    <title>Message sent successfully!</title>
  </head>
  <body>

  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // Assign input to variables
  $name = $visitor_email = $subject = $message = "";

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
  $to = "ando.vanweerden@gmail.com";

  $email_from = "andrew@vanweerden.me";
  $email_body = "You have received a new message from $name\n".
                    "Here is the message:\n $message";

  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $visitor_email\r\n";

  $success = mail($to,$subject,$email_body,$headers);

  // If no errors, display success message
  // $message = $success ? 'Thank you for your e-mail! I will respond as soon as possible.' : 'There was a problem sending your message. Terribly sorry about that!';
  $message = "Success!";
  echo "<div class='message'>", $message, "</div>";
  ?>

  </body>
</html>
