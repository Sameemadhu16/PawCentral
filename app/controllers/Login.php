<?php

/**
 * Login Controller Class
 * Handles user authentication and login functionality for all user types
 */
class Login{
    use Controller;

    /**
     * Main index method for the login page
     * Handles both GET and POST requests
     */
    public function index() {
        // Check if form was submitted via POST
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $this->authenticate();
        }

        // Display login form and handle any error messages
        $data['errors'] = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']); // Clear errors after displaying
        $this->view("signupLogin.f/login",$data);
    }

    /**
     * Authenticate user credentials and handle login process
     * Creates necessary session variables upon successful login
     */
    private function authenticate() {
        // Initialize model instances for different user types
        $user = new User;
        $medprov = new MedicalProvModel;
        $seller = new SellerModel;
        $shelter = new ShelterModel;
        $serviceprov = new ServiceProvModel;

        // Get form inputs
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validate that both email and password were provided
        if (empty($email) || empty($password)) {
            $_SESSION['errors'] = ['Please enter your email and password'];
            redirect('login');
        }

        // Attempt to validate user credentials
        if ($user->validateLogin($email, $password)) {
            // Set up basic user session data
            $_SESSION['user'] = $user->getUserByEmail($email);
            $_SESSION['user_id'] = $_SESSION['user']->id;
            $_SESSION['user_role'] = $_SESSION['user']->role;

            // Route users to different pages based on their role
            switch($_SESSION['user']->role) {
                case 'admin':
                    // For admin users
                    $_SESSION['role_id'] = $_SESSION['user']->id;
                    redirect('admin/overview');
                    break;

                case 'shelter':
                    // For shelter organizations
                    $roleid = $shelter->getRoleIdById($_SESSION['user_id']);
                    $_SESSION['role_id'] = $roleid->id;
                    redirect('shelter/profile');
                    break;

                case 'medical_provider':
                    // For medical providers
                    $roleid = $medprov->getRoleIdById($_SESSION['user_id']);
                    $_SESSION['role_id'] = $roleid->med_id;
                    echo "<script>console.log('Role ID: " . $_SESSION['role_id'] . "');</script>";
                    redirect('medical-center/dashboard');
                    break;

                case 'seller':
                    // For product sellers
                    $roleid = $seller->getRoleIdById($_SESSION['user_id']);
                    $_SESSION['role_id'] = $roleid->merchant_id;
                    redirect('service');
                    break;

                case 'service_prov':
                    // For service providers
                    $roleid = $serviceprov->getRoleIdById($_SESSION['user_id']);
                    $_SESSION['role_id'] = $roleid->merchant_id;
                    redirect('provider/profile');
                    break;

                default:
                    // For regular users
                    redirect('home');
            }
        } else {
            // Handle failed login attempt
            $_SESSION['errors'] = $user->errors;
            redirect('login');
        }
    }

    /**
     * Placeholder method for getting user role
     * Currently not implemented
     */
    private function get_user_role($user_id){
        // TODO: Implement role retrieval logic if needed
    }
}