<?php

require __DIR__ . '/../../../vendor/autoload.php';
// require __DIR__ . '/../../../public/assets/main/main.css';

// Import PHPMailer Classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AdminUserAccount{

    use Controller;

    private $valid_roles = ['admin'];
    public function index(){



        if($this->isAuthorized($this->valid_roles)){

            // $this->getUsers();
            // if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    
            //     show($_POST['status1']);
            // }
            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status1'])){
                $this->UpdateUserStatus($_POST['id'], $_POST['status1']);
                // show($_POST);
            }
    
            $data = [
                'regular' => $this->getUserCountByService('user'),
                'seller' => $this->getUserCountByService('seller'),
                'adoptionShelters' => $this->getUserCountByService('shelter'),
                'careServiceProviders' => $this->getUserCountByService('service_prov'),
                'medicalProviders' => $this->getUserCountByService('medical_provider'),
                'users' => $this->getUsers(),
               // 'status' => $this->UpdateUserStatus(1, 'block')
    
                
            ];
    
            $this->view('admin/user_account', $data);

        } else {
            //access denied page
            redirect('403');
        }
    }

    private function getUsers(){
        $userModel = new User;
        
        $userDetails = $userModel->get([],
        [
            'order_column' => 'updated_at',
            'order_type' => 'desc'
        ]);
        // show($userDetails);
        return $userDetails;
    }

    private function getUserCountByService($service){
        $userModel = new User;
        $userDetails = $userModel->get(['role' => $service],
        [
            'order_column' => 'updated_at',
            'order_type' => 'desc'
        ]);
        // return($userDetails);
        
        if (is_array($userDetails)) {
            $count = count($userDetails);
            return($count);
        } else {
            show("Error: Expected an array of user details.");
        }
        // return $userDetails;
    }
    private function UpdateUserStatus($id, $status)
    {
        $userModel = new User;
        $user = $userModel->update($id, ['status' => $status]);

        // Get user email from database
        $query = "SELECT * FROM users WHERE id = :id";
        $userResult = $userModel->query($query, ['id'=>$id]);

        if ($userResult && isset($userResult[0]->email)) {
            $userEmail = $userResult[0]->email;

            // Send email notification based on status
            if ($status === 'block') {
                $this->sendEmail($userEmail, "banned");
            } else if ($status === 'active') {
                $this->sendEmail($userEmail, "unbanned");
            }
        }

        return $user;
    }

    private function sendEmail($recipientEmail, $status)
    {
        $mail = new PHPMailer(true);

        try {
            // Retrieve the session user's email (admin who is making the change)
            $senderEmail = $_SESSION['user']->email;

            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sameemadhu2003@gmail.com';
            $mail->Password = 'bqbc wqrp okqx hwrn';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email Details
            $mail->setFrom($senderEmail, 'PawCentral Team');
            $mail->addAddress($recipientEmail);

            // Set subject based on status
            $mail->Subject = $status === 'banned'
                ? "PawCentral - Account Suspended"
                : "PawCentral - Account Reactivated";

            // Email Body
            $statusMessage = $status === 'banned'
                ? "We regret to inform you that your PawCentral account has been suspended. This may be due to a violation of our terms of service or community guidelines. If you believe this is an error, please contact our support team for assistance."
                : "Good news! Your PawCentral account has been reactivated. You can now log in and access all the features of our platform again. Thank you for your patience.";

            $statusColor = $status === 'banned' ? '#dc3545' : '#28a745';
            $statusDisplay = $status === 'banned' ? 'Suspended' : 'Reactivated';

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
                            color: $statusColor;
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
                            PawCentral - Account Status Update
                        </div>
                        <div class='email-body'>
                            <h2>Status: <span class='status'>$statusDisplay</span></h2>
                            <p>$statusMessage</p>
                            " . ($status === 'unbanned' ? "<a href='" . ROOT . "' class='btn'>Visit PawCentral</a>" : "") . "
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
            return true;
        } catch (Exception $e) {
            echo "Email could not be sent. Error: {$mail->ErrorInfo}";
            return false;
        }
    }

}