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

        //check if first name and last is empty
        if (empty($data['first_name']) || empty($data['last_name'])){
            $this->errors[] = 'First and Last names are required';
        }

        //check input email is a valid email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $this->errors[] = 'A valid email is required';
        }

        //check the password character length
        if (strlen($data['password']) < 8){
            $this->errors[] = 'Password must be at least 8 characters';

        }
        return empty($this->errors);
    }

    //validate second step of the sign up (signupNext)
    public function validateSecondStep($data)
    {
        $this->errors = [];

        //Check if service details are empty
        if ($data['is_service'] === 'yes'){
            if (empty($data['service_type']) || empty($data['service_name']) || empty($data['location'])){
                $this->errors[] = "Service details are required";
            }
        }
        if (empty($data['proof']['name'])){
            $this->errors[] = 'Proof of service is required';
        }
        return empty($this->errors);
    }

    public function create($data) {
        try {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            if (isset($data['proof']) && !empty($data['proof']['name'])) {
                $data['proof_of_service'] = $this->uploadFile($data['proof']);
            }
            unset($data['proof']);

            $this->insert($data);
        } catch (Exception $e) {
            $this->errors[] = "Error saving user: " . $e->getMessage();
            return false;
        }
        return true;
    }


    private function uploadFile($file)
    {
        $targetDir = "uploads/proofs/";
        $filePath = $targetDir . basename($file['name']);
        move_uploaded_file($file["tmp_name"], $filePath);
        return $filePath;
    }

    // Validate user login
    public function validateLogin($email, $password) {
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
    public function getUserByEmail($email) {
        return $this->first(['email' => $email]);
    }



}