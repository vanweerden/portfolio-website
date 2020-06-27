<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Portfolio of Andrew van Weerden | Message sent</title>
    <link rel="stylesheet" href="submission.css">
  </head>
  <body>
    <div class='main'>
      <div class='message-container'>
        <?php
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

        // Option 2: If no errors, display success message (then redirect?)
        if ($success == true) {
          $response = "Thank you for your message! I will respond as soon as possible.";
        } else {
          $response = "Something went wrong and your message was not sent successfully.";
        }

        echo "<div class='message'>", $response, "</div>";
        ?>
        <div class='link-container'>
          <a href='https://vanweerden.me'>Click here to back to the main page</a>
        </div>
      </div>
    </div>
  </body>
</html>
