<?php

class UserProfilesModel
{
    use Model;

    protected $table = 'users';
    protected $usertable='users';
    protected $medtable = 'medical_providers';
    protected $merchanttable = 'pet_merchants';
    protected $enrolltable = 'event_enrollments';
    protected $notificationtable = 'notifications_t';

    public function getUserInf()
    {
        $userId = $_SESSION['user_id']; // Retrieve userId from session
        $this->table = $this->usertable;

        $query = "SELECT * FROM `" . $this->table . "` WHERE `id` = :userid"; //add approved filtering (maybe filter from frontend)

        $result = $this->first(['id' => $userId]);
            //$print=$_SESSION['user_id'];
            // print_r($result);
            // exit();
            // echo "$print";
        return $result;
    }

}
