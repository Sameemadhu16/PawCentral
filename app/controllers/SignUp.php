<?php

class SignUp {
    use Controller;

    public function index() {
        $this->view("signupLogin.f/signup");
    }

    // Handle form submission for the first step
    public function handleFirstStep() {
        $user = new User;

        // Collect form data
        $data = [
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
            'is_service' => $_POST['is_service'] ?? 'no'
        ];

        // Validate data using the User model
        if ($user->validate($data)) {
            if ($data['is_service'] === 'no') {
                // If "No" is selected, create the user directly
                $user->create($data);

                // Clear session data and redirect to login
                unset($_SESSION['signup_data']);
                redirect('login');
            } else {
                // If "Yes" is selected, store data in session and redirect to step 2
                $_SESSION['signup_data'] = $data;
                redirect('signup/signupnext');
            }
        } else {
            // Pass validation errors to the view if validation fails
            $data['errors'] = $user->errors;
            $this->view('signupLogin.f/signup', $data);
        }
    }
}
