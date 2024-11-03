<?php

class SignUp {
    use Controller;

    public function index() {
        $this->view("signupLogin.f/signup");
    }

    //handle from submission fro the first step
    public function handleFirstStep()
    {
        $user = new User;

        //collect from data
        $data = [
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
            'is_service' => $_POST['is_service'] ?? 'no'
        ];

        //validate data using the User Model
        if ($user->validate($data)){
            //store form data in session to pass to the second step
            $_SESSION['signup_data'] = $data;

            //Redirect to the second step
            redirect('signupnext');
        } else {
            //pass validation errors to the view
            $data['errors'] = $user->errors;
            $this->view('signup', $data);
        }
    }
}