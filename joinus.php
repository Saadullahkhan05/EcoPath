<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPmailer/src/Exception.php';
require 'PHPmailer/src/PHPMailer.php';
require 'PHPmailer/src/SMTP.php';

// 🔥 Success/Error message check
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<div style='padding:15px; margin:20px; background:#d1fae5; font-family:poppins; font-weight:20px; color:#065f46; border-radius:8px;'>
            ✅ Thank you! Your request has been sent successfully.
          </div>";
}
if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo "<div style='padding:15px; margin:20px; background:#fee2e2; color:#991b1b; border-radius:8px;'>
            ❌ Sorry! Something went wrong. Please try again later.
          </div>";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ecopath2025@gmail.com';   // Apna Gmail
        $mail->Password   = 'enss fcnd gykc qmgb';     // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Ecopath email
        $mail->setFrom('ecopath2025@gmail.com', 'Ecopath');
        $mail->addAddress('ecopath2025@gmail.com'); // Apna ecopath email
        $mail->Subject = "New Join Us Request from $name";
        $mail->Body    = "Name: $name\nEmail: $email\nMessage: $message";
        $mail->send();

        // User confirmation email
        $mail->clearAddresses();
        $mail->addAddress($email);
        $mail->Subject = "Thank you for joining Ecopath!";
        $mail->Body    = "Hi $name,\n\nThank you for joining Ecopath. We will contact you soon.\n\n- Ecopath Team";
        $mail->send();

        // ✅ Redirect with success
        header("Location: joinus.php?success=1");
        exit();

    } catch (Exception $e) {
        // ❌ Redirect with error
        header("Location: joinus.php?error=1");
        exit();
    }
}
