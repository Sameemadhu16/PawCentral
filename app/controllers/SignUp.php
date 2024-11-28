<?php

class SignUp {
    use Controller;

    public function index() {

        $user = new User;

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stepOneSubmit'])) {
            $this->handleFirstStep($user);
        }

        $this->view("signupLogin.f/signup" , $_SESSION['signup_data1'] ?? []);
        unset($_SESSION['signup_data1']);
    }

    // Handle form submission for the first step
    private function handleFirstStep($user) {
        // $user = new User;

        // Collect form data
        $data = [
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
            'is_service' => $_POST['is_service'] ?? 'no',
            'terms' => $_POST['terms'] ?? ''
        ];

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $data1 = [
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
            'is_service' => $_POST['is_service'] ?? 'no',
            'terms' => $_POST['terms'] ?? ''
        ];


        // Validate data using the User model
        if ($user->validate($data)) {
            unset($data['terms']);
            if ($data['is_service'] === 'no') {
                // If "No" is selected, create the user directly
                $user->insert($data);

                // Clear session data and redirect to login
                unset($_SESSION['signup_data']);
                redirect('login');
            } else {
                // If "Yes" is selected, store data in session and redirect to step 2
                $_SESSION['signup_data'] = $data1;
                redirect('signup/signupnext');
            }
            $this->view("signupLogin.f/signup");
        } else {
            // Pass validation errors to the view if validation fails
            $data['errors'] = $user->errors;
            $_SESSION['signup_data1'] = $data;
            // $this->view('signupLogin.f/signup', $data);

        }
    }
}

