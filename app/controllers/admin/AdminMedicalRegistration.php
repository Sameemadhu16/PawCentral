<?php

// Autoload PHPMailer and other dependencies
require __DIR__ . '/../../../vendor/autoload.php';
// require __DIR__ . '/../../../public/assets/main/main.css';

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

            // show($userData);

            if ($userData) {
                $email = $userData->email; // Assuming the email column is named 'email'
                // show($email);
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

    private function sendEmail($recipientEmail, $status)
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
            $mail->setFrom($senderEmail, 'PawCentral Team'); // Use session user's email as sender
            $mail->addAddress($recipientEmail); // Use the function parameter for recipient
            // show($recipientEmail);
            $mail->Subject = "Medical Provider Registration Status";

            // Email Body
            $statusMessage = $status === 'approved' 
                ? "Congratulations! Your medical provider registration has been approved. You can now access all the features and medical services provided by PawCentral."
                : "We regret to inform you that your medical provider registration has been rejected. Please review your application and try again or contact our support team for assistance.";

            $mail->Body = "
                <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f9f9f9;
                                color: #333;
                                line-height: 1.6;
                            }
                            .email-container {
                                max-width: 600px;
                                margin: 20px auto;
                                background: #ffffff;
                                border: 1px solid #ddd;
                                border-radius: 8px;
                                overflow: hidden;
                            }
                            .email-header {
                                background-color: #8049fe;
                                color: #ffffff;
                                padding: 20px;
                                text-align: center;
                                font-size: 24px;
                            }
                            .email-body {
                                padding: 20px;
                            }
                            .status {
                                color: " . ($status === 'approved' ? '#28a745' : '#dc3545') . "; /* Green for approved, red for rejected */
                                font-weight: bold;
                            }
                            .email-footer {
                                background-color: #f1f1f1;
                                text-align: center;
                                padding: 10px;
                                font-size: 12px;
                                color: #777;
                            }
                            .btn {
                                display: inline-block;
                                padding: 10px 20px;
                                margin-top: 20px;
                                background-color: #FFD700;
                                color: #ffffff;
                                text-decoration: none;
                                border-radius: 5px;
                            }
                            .btn:hover {
                                background-color:rgb(206, 175, 2);
                            }
                        </style>
                    </head>
                    <body>
                        <div class='email-container'>
                            <div class='email-header'>
                                PawCentral - Medical Registration
                            </div>
                            <div class='email-body'>
                                <h2>Status: <span class='status'>" . ucfirst($status) . "</span></h2>
                                <p>$statusMessage</p>
                                <a href='" . ROOT . "' class='btn'>Visit PawCentral</a>
                            </div>
                            <div class='email-footer'>
                                &copy; " . date('Y') . " PawCentral. All rights reserved.
                            </div>
                        </div>
                    </body>
                </html>
            ";
            $mail->isHTML(true);

            // Send Email
            $mail->send();
        } catch (Exception $e) {
            echo "Email could not be sent. Error: {$mail->ErrorInfo}";
        }
    }
}
