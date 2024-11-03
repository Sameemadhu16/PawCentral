<?php

class SignUpNext {
    use Controller;

    public function index() {
        $this->view("signupLogin.f/signupNext");
    }

    //handle second step
    public function handleSecondStep()
    {
        $user = new User;

        //collect data from form session and form submission
        $data = $_SESSION['signup_data'] ?? [];
        $data['service_type'] = $_POST['service-type'] ?? '';
        $data['service_name'] = $_POST['service-name'] ?? '';
        $data['location'] = $_POST['location'] ?? '';
        $data['proof'] = $_FILES['fileUpload'] ?? null;

        //Validate the data for the second step
        if ($user->validateSecondStep($data)){
            //save user to the database
            $user->create($data);

            //clear session and redirect to the login page
            unset(($_SESSION['signup_data']));
            redirect('login');

        }else {
            //pass errors to the view if validation fails
            $data['errors'] = $user->errors;
            $this->view('signupNext',$data);
        }


    }
}