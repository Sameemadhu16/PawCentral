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
            redirect('home');
            // show($_SESSION['user']);
        } else {
            // Set error messages in session and redirect back to /login
            $_SESSION['errors'] = $user->errors;
            redirect('login');
        }
    }
}