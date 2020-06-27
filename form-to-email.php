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
        // Display all errors
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Get data
        // $name = $visitor_email = $subject = $message = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = $_POST["name"];
          $visitor_email = $_POST["email"];
          $subject = $_POST["subject"];
          $message = $_POST["message"];
        }

        // Checks data for header injection (takes array)
        function checkFields($array) {
          $injection = false;
          for ($i = 0; $i < count($array); $i++) {
            if (preg_match("/%0A/i", $array[$i]) || preg_match("/%0D/i", $array[$i]) || preg_match("/\r/i", $array[$i]) || preg_match("/\n/i", $array[$i])) {
              $injection = true;
            }
          }
          return $injection;
        }

        $injection = checkFields(array($name, $visitor_email, $subject, $message));

        if ($injection == true) {
          echo "<div class='message'>", "Header injection detected! Message not sent.", "</div>";
          exit(1);
        }

        // Clean up data
        function cleanup_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        $name = cleanup_input($name);
        $visitor_email = cleanup_input($visitor_email);
        $subject = cleanup_input($subject);
        $message = cleanup_input($message);

        // Send as e-mail
        $to = "ando.vanweerden@gmail.com";

        $email_from = "andrew@vanweerden.me";
        $email_body = "You have received a new message from $name\n".
                          "Here is the message:\n $message";

        $headers = "From: $email_from \r\n";
        $headers .= "Reply-To: $visitor_email\r\n";

        $success = mail($to, $subject, $email_body, $headers);

        // mail() returns true, display success message (then redirect?)
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
