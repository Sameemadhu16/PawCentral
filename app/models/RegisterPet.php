<?php

class RegisterPet
{
    use Model;

    protected $table = 'registered_pets';

    public function getRegPets()
    {
        $userId = $_SESSION['user_id']; // Retrieve userId from session

        // $userId =2;
    // Fetch rows from the table where status = 0 and userid matches
    $query = "SELECT * FROM `" . $this->table . "` WHERE `user_id` = :userid";

    $result = $this->query($query, [':userid' => $userId]);
        //$print=$_SESSION['user_id'];
        // echo "$print";
    return $result;
    }
}
