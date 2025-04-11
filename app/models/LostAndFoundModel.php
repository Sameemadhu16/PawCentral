<?php

class LostAndFoundModel
{
    use Model;

    protected $table = 'lost_and_found_pets';

    public function getViewPosts()
    {
        // Fetch all rows from the `lostandfound` table
        $query = "SELECT * FROM `" . $this->table . "` WHERE `postStatus` = 0"; //get only the unmarked pets
        $result = $this->query($query);

    $result = $this->query($query);
        //$print=$_SESSION['user_id'];
        // echo "$print";
    return $result;
    }

    public function getAllPets()
    {
        // Fetch all rows from the `lostandfound` table
        // $query = "SELECT * FROM " . $this->table;
        $query = "SELECT * FROM `" . $this->table . "` WHERE `postStatus` = 0"; //get only the unmarked pets
        $result = $this->query($query);


        $userId = $_SESSION['user_id']; // Retrieve userId from session
        

        // $userId =2;
    // Fetch rows from the table where status = 0 and userid matches
    $query = "SELECT * FROM `" . $this->table . "` WHERE `postStatus` = 0 AND `id` = :userid";

    $result = $this->query($query, [':userid' => $userId]);
        //$print=$_SESSION['user_id'];
        // echo "$print";
    return $result;
    }

    public function updateStatus($id,$updatestatus)
    {
        $data[$id] = $id;
        $data[$updatestatus] = $updatestatus;
        $query = "UPDATE $this->table SET postStatus = :updatestatus WHERE petid=:id";

        return $this->query($query, $data) !== false;
    }

    public function create($data) {
        return $this->insert($data) ? true : false;
    }

}
