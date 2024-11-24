<?php

class SignUpNext {
    use Controller;

    public function index() {

        $user = new User;

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stepTwoSubmit'])) {
            $this->handleSecondStep($user);
        }

        $this->view("signupLogin.f/signupNext" , $_SESSION['signup_data2'] ?? []);
        unset($_SESSION['signup_data2']);
    }

    // Handle the second step form submission
    private function handleSecondStep($user) {


        // Collect data from session and form submission
        $data = $_SESSION['signup_data'] ?? [];
        $data['service_type'] = $_POST['service_type'] ?? '';
        $data['service_name'] = $_POST['service_name'] ?? '';
        $data['location'] = $_POST['location'] ?? '';
        $data['proof'] = $_FILES['proof'] ?? null;

        // Validate the data for the second step
        if ($user->validateSecondStep($data)) {
            // echo "Validation passed.<br>"; // Debug message

            // Attempt to create the user in the database
            $user->createUser($data);
            // echo "User created.<br>"; // Debug message

            // Clear session data
            unset($_SESSION['signup_data']);
            // echo "Session cleared.<br>"; // Debug message

            // Redirect to login
            redirect('login');
            // echo "Redirecting to login.<br>"; // Debug message (should not display if redirect works)

        } else {
            // Pass errors to the view if validation fails
            $data['errors'] = $user->errors;
            $_SESSION['signup_data2'] = $data;
            // $this->view('signupLogin.f/signupNext', $data);
        }
    }
}
