<?php

/**
 * User Model Class
 * Handles all user-related database operations and validations
 */
class User
{
    use Model;

    // Define the database table for this model
    protected $table = 'users';
    // Store validation errors
    public $errors = [];

    /**
     * Validates the first step of user registration
     * @param array $data Form data containing user details
     * @return bool Returns true if validation passes, false otherwise
     */
    public function validate($data)
    {
        $this->errors = [];

        // Validate name fields
        if (empty($data['first_name']) || empty($data['last_name'])) {
            $this->errors[] = 'First and Last names are required';
        }

        // Validate email format and uniqueness
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'A valid email is required';
        }
        $row = $this->getUserByEmail($data['email']);
        if ($row) {
            $this->errors[] = 'This email is already registered';
        }

        // Validate password length
        if (strlen($data['password']) < 8) {
            $this->errors[] = 'Password must be at least 8 characters';
        }

        return empty($this->errors);
    }

    /**
     * Validates the second step of user registration
     * Specifically handles service provider details and documentation
     * @param array $data Form data containing service details
     * @return bool Returns true if validation passes, false otherwise
     */
    public function validateSecondStep($data)
    {
        $this->errors = [];

        // Validate service provider details if applicable
        if ($data['is_service'] === 'yes') {
            if (empty($data['service_type']) || empty($data['service_name']) || empty($data['location'])) {
                $this->errors[] = "Service details are required";
            }
            if (empty($data['location'])) {
                $this->errors[] = "Location is required";
            }
        }

        $service_type = $data['service_type'] ?? [];

        // Validate proof of service for medical providers
        if ($service_type == 'medical_provider' && empty($data['proof']['name'])) {
            $this->errors[] = 'Proof of service is required';
        } elseif ($service_type == 'medical_provider' && $data['proof']['type'] !== 'application/pdf') {
            $this->errors[] = 'Proof of service must be a PDF file';
        }

        // CAN JUST NEGLECT THE PROOF FILE IF NOT MEDICAL
        elseif ($service_type != 'medical_provider' && !empty($data['proof']['name'])) {

            $this->errors[] = 'Proof of service is only required for medical providers';
        }

        // Validate terms agreement
        if (!isset($data['terms']) || $data['terms'] !== 'on') {
            $this->errors[] = 'You must agree to the Terms of Use and Privacy Policy';
        }
        return empty($this->errors);
    }


    /**
     * Handles file upload for proof documents
     * @param array $file The uploaded file information
     * @return string The path where the file was saved
     */

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

    /**
     * Validates user login credentials
     * @param string $email User's email
     * @param string $password User's password
     * @return bool Returns true if credentials are valid, false otherwise
     */
    public function validateLogin($email, $password)
    {
        $user = $this->getUserByEmail($email);
        
        if ($user && password_verify($password, $user->password)) {
            return true;
        }

        $this->errors[] = 'Invalid email or password';
        return false;
    }

    /**
     * Retrieves user information by email
     * @param string $email User's email address
     * @return object|false Returns user object if found, false otherwise
     */
    public function getUserByEmail($email)
    {
        return $this->first(['email' => $email]);
    }
}
