<?php

class User
{
    use Model;

    protected $table = 'users';
    public $errors = [];


    //validate the first step og sign up
    public function validate($data)
    {
        $this->errors = [];

        // Check if first name and last name are empty
        if (empty($data['first_name']) || empty($data['last_name'])) {
            $this->errors[] = 'First and Last names are required';
        }

        // Validate if email is a proper email format
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'A valid email is required';
        }
        $row = $this->getUserByEmail($data['email']);
        if($row){
            $this->errors[] = 'This email is already registered';
        }

        // Check the password character length
        if (strlen($data['password']) < 8) {
            $this->errors[] = 'Password must be at least 8 characters';
        }

        // Validate the terms checkbox
        if ($data['terms'] != 'on') {
            $this->errors[] = 'You must agree to the Terms of Use and Privacy Policy';
        }

        return empty($this->errors);
    }


    //validate second step of the sign up (signupNext)
    public function validateSecondStep($data)
    {
        $this->errors = [];

        //Check if service details are empty
        if ($data['is_service'] === 'yes') {
            if (empty($data['role']) || empty($data['location'])) {
                $this->errors[] = "Service details are required";
            }
            if (empty($data['location'])) {
                $this->errors[] = "Location is required";
            }
        }
        $role = $data['role'] ?? [];
        // print_r($role);

        if ($role=='medical-provider' && empty($data['proof']['name'])) {
            $this->errors[] = 'Proof of service is required';
        }
        elseif($role=='medical-provider' && $data['proof']['type'] !== 'application/pdf'){
            $this->errors[] = 'Proof of service must be a PDF file';
        }
        elseif($role!='medical-provider' && !empty($data['proof']['name'])){
            $this->errors[] = 'Proof of service is only required for medical providers';
        }

        // Validate the terms checkbox
        if (!isset($data['terms']) || $data['terms'] !== 'on') {
            $this->errors[] = 'You must agree to the Terms of Use and Privacy Policy';
        }
        return empty($this->errors);
    }

    // public function createUser($data)
    // {
    //     try {
    //         $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            

    //         $this->insert($data);
    //     } catch (Exception $e) {
    //         $this->errors[] = "Error saving user: " . $e->getMessage();
    //         return false;
    //     }
    //     return true;
    // }


    public function uploadFile($file)
    {
        $targetDir = "uploads/proofs/";
        $filePath = $targetDir . basename($file['name']);
        move_uploaded_file($file["tmp_name"], $filePath);
        return $filePath;
    }

    // Validate user login
    public function validateLogin($email, $password)
    {
        // Retrieve the user by email
        $user = $this->getUserByEmail($email);

        // If user exists and password is correct, return true
        if ($user && password_verify($password, $user->password)) {
            return true;
        }

        // Otherwise, return false
        $this->errors[] = 'Invalid email or password';
        return false;
    }

    // Get user by email
    public function getUserByEmail($email)
    {
        return $this->first(['email' => $email]);
    }

    

}
