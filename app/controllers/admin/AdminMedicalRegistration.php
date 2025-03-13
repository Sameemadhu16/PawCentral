<?php

// Autoload PHPMailer and other dependencies
require __DIR__ . '/../../../vendor/autoload.php';

// Import PHPMailer Classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\UserModel;

class AdminMedicalRegistration
{

    use Controller;
    use Model;

    public function index()
    {

        $medicalProvider = new MedicalProvModel();
        // show($_SESSION['user']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['med_id'])) {
            $this->approveMedicalProvider($_POST['med_id'], $medicalProvider);
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
        // Fetch the medical provider's data
        $providerData = $medicalProvider->first(['med_id' => $id]);

        if ($providerData) {
            // Fetch the user's email using the user_id from the provider data
            $userModel = new User();
            $userData = $userModel->first(['id' => $providerData->user_id]);

            if ($userData) {
                $email = $userData->email; // Assuming the email column is named 'email'

                if (isset($_POST['approve'])) {
                    $medicalProvider->update($id, ['verifiedStatus' => 'approved'], 'med_id');
                    $this->sendEmail($email, 'approved');
                    redirect('admin/medical_registration?status=approved');
                    exit();
                }
                if (isset($_POST['reject'])) {
                    $medicalProvider->update($id, ['verifiedStatus' => 'rejected'], 'med_id');
                    $this->sendEmail($email, 'rejected');
                    redirect('admin/medical_registration?status=rejected');
                    exit();
                }
            } else {
                echo "User not found.";
            }
        } else {
            echo "Medical provider not found.";
        }
    }

    private function sendEmail($recipientEmail, $body)
    {
        $mail = new PHPMailer(true);

        try {
            // Retrieve the session user's email
            $senderEmail = $_SESSION['user']->email; // Assuming the session key is 'user_email'

            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'sameemadhu2003@gmail.com'; // Your email address
            $mail->Password = 'bqbc wqrp okqx hwrn'; // Your email password or App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
            $mail->Port = 587; // SMTP Port

            // Email Details
            $mail->setFrom($senderEmail, 'sameera'); // Use session user's email as sender
            $mail->addAddress($recipientEmail); // Use the function parameter for recipient

            $mail->Subject = "Medical Provider Registration Status";
            $mail->Body = "Your medical registration status in Pawcentral is: " . $body;
            $mail->isHTML(true);

            // Send Email
            $mail->send();
            // echo 'Email sent successfully!';
        } catch (Exception $e) {
            echo "Email could not be sent. Error: {$mail->ErrorInfo}";
        }
    }
}
