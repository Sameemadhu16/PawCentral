<?php

class User
{
    use Model;

    protected $table = 'users';
    public $errors = [];

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
}