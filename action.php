<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

	$result="";

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->SMTPSecure = 'ssl';                                  //secure transfer enabled
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'mymelody905@gmail.com';                // SMTP username
        $mail->Password   = 'blueboice0905';                        // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        $errors="";
        if(empty($_POST['name'])  || empty($_POST['email']) || empty($_POST['message'])){
            $errors .= "\n Error: all fields are required";
        }

        //Initializing variable
        $name = $_POST['name'];
        $email_address = $_POST['email'];
        $message= $_POST['message'];


        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
            $email_address)) {
            $errors .= "\n Error: Invalid email address";
        }

        if( empty($errors)) {
            $email_subject = "Contact form submission: $name";
            $email_body = "You have received a new message. ".
            " Here are the details:\n Name: $name \n ".
            "Email: $email_address\n Message: \n $message"; 

            //Recipients
            $mail->setFrom($email_address, $name);
            $mail->addAddress('mymelody905@gmail.com');     // Add a recipient
            $mail->addReplyTo($email_address, $name);

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $email_subject;
            $mail->Body    = $email_body;

            $mail->send();
            
            // header("Location: /#contact");

            echo "<script type='text/javascript'>
            alert('Message sent sucessfully.');
            window.location.href='/#contact';
            </script>";

        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>
