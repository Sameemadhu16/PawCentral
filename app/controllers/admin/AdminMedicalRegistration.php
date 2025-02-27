<?php

// Autoload PHPMailer and other dependencies
require __DIR__ . '/../../../vendor/autoload.php';




// Import PHPMailer Classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AdminMedicalRegistration
{

    use Controller;
    use Model;

    public function index()
    {

        $medicalProvider = new MedicalProvModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $this->approveMedicalProvider($_POST['id'], $medicalProvider);
        }

        $data = $this->fetchMedicalProviderData($medicalProvider);

        $this->view('admin/medical_registration', $data);
    }

    private function fetchMedicalProviderData($medicalProviderData)
    {
        return $medicalProviderData->findAll();
    }

    private function approveMedicalProvider($id, $medicalProvider)
    {
        if (isset($_POST['approve'])) {
            $medicalProvider->update($id, ['verifiedStatus' => 'approved']);
            $this->sendEmail('ilakshitha7921@gmail.com', 'approved');
        }
        if (isset($_POST['reject'])) {
            $medicalProvider->update($id, ['verifiedStatus' => 'rejected']);
            $this->sendEmail('ilakshitha7921@gmail.com', 'rejected');
        }
    }

    private function sendEmail($email, $body)
    {

        $mail = new PHPMailer(true);

        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'sameemadhu2003@gmail.com'; // Your email address
            $mail->Password = 'bqbc wqrp okqx hwrn'; // Your email password or App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
            $mail->Port = 587; // SMTP Port

            // Email Details
            $mail->setFrom('sameemadhu2003@gmail.com', 'sameera'); // Sender
            $mail->addAddress($email); // Use the function parameter for recipient

            $mail->Subject = "Medical Provider Registration Status";
            $mail->Body = "Your registration status is: " . $body;
            $mail->isHTML(true);

            // Send Email
            $mail->send();
            echo 'Email sent successfully!';
        } catch (Exception $e) {
            echo "Email could not be sent. Error: {$mail->ErrorInfo}";
        }
    }
}
