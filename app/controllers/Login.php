<?php

class Login{
    use Controller;

    public function index() {

         // Display the login form, check for any session errors
         $data['errors'] = $_SESSION['errors'] ?? [];
         unset($_SESSION['errors']); // Clear errors after displaying
        $this->view("signupLogin.f/login",$data);
    }

    public function authenticate() {
        $user = new User;

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($user->validateLogin($email, $password)) {
            // Set user session and redirect to home
            $_SESSION['user_id'] = $user->getUserByEmail($email)->id;
            redirect('home');
        } else {
            // Set error messages in session and redirect back to /login
            $_SESSION['errors'] = $user->errors;
            redirect('login');
        }
    }
}