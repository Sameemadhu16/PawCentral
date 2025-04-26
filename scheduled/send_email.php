<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendTestEmail($toEmail) {
    $mail = new PHPMailer(true);

    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sameemadhu2003@gmail.com'; // your Gmail
        $mail->Password = 'bqbc wqrp okqx hwrn'; // app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Enable debugging
        $mail->SMTPDebug = 2; // Enable verbose debug output
        $mail->Debugoutput = 'html'; // Output debug info in HTML format

        // Sender and recipient
        $mail->setFrom('sameemadhu2003@gmail.com', 'PawCentral Reminder');
        $mail->addAddress($toEmail);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Reminder from PawCentral: 24h Notice';
        $mail->Body = '<h1>Hey there!</h1><p>This is a reminder email from PawCentral:.</p>';

        $mail->send();
        echo "Test email sent successfully to $toEmail";
    } catch (Exception $e) {
        echo "Failed to send email. Error: " . $mail->ErrorInfo;
    }
}

// Call the function with your test email
sendTestEmail('lehanselaka@gmail.com');
 // Change this to your real email
