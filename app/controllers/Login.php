<?php

class Login{
    use Controller;

    public function index() {

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $this->authenticate();
        }

         // Display the login form, check for any session errors
        $data['errors'] = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']); // Clear errors after displaying
        $this->view("signupLogin.f/login",$data);
    }

    private function authenticate() {
        $user = new User;
        $medprov = new MedicalProvModel;
        $seller = new SellerModel;
        $shelter = new ShelterModel;
        $serviceprov = new ServiceProvModel;

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            // Set error messages in session and redirect back to /login
            $_SESSION['errors'] = ['Please enter your email and password'];
            redirect('login');
        }

        if ($user->validateLogin($email, $password)) {
            // Set user session and redirect to home
            $_SESSION['user'] = $user->getUserByEmail($email);
            $_SESSION['user_id'] = $_SESSION['user']->id;
            $_SESSION['user_role'] = $_SESSION['user']->role;

            if ($_SESSION['user']->role == 'admin') {
                $_SESSION['role_id'] = $_SESSION['user']->id;
                redirect('admin/overview');
            }
            elseif ($_SESSION['user']->role == 'shelter') {
                $roleid=$shelter->getRoleIdById($_SESSION['user_id']);
                $_SESSION['role_id'] = $roleid->id;
                redirect('shelter/profile');
            }
            elseif ($_SESSION['user']->role == 'medical_provider') {
                $roleid=$medprov->getRoleIdById($_SESSION['user_id']);
                $_SESSION['role_id'] = $roleid->med_id;
                redirect('medical-center/dashboard');
            }
            elseif ($_SESSION['user']->role == 'seller') {
                $roleid= $seller->getRoleIdById($_SESSION['user_id']);
                $_SESSION['role_id'] = $roleid->merchant_id;
              // Debug session data
            // echo "<pre>";
            // print_r($_SESSION); // Display all session variables
            // echo "</pre>";
            // // Log session data for debugging
            // $logFile = 'session_debug.log';
            // $logData = print_r($_SESSION, true);
            // file_put_contents($logFile, $logData, FILE_APPEND);
        
                redirect('service');
            }
            elseif ($_SESSION['user']->role =='service_prov') {
                $roleid= $serviceprov->getRoleIdById($_SESSION['user_id']);
                $_SESSION['role_id'] = $roleid->merchant_id;
                redirect('provider/profile');
            }
        
            redirect('home');
            // show($_SESSION['user']);
        } else {
            // Set error messages in session and redirect back to /login
            $_SESSION['errors'] = $user->errors;
            redirect('login');
        }
    }

    private function get_user_role($user_id){

    }
}