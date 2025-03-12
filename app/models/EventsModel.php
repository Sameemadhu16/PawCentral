<?php

class EventsModel
{
    use Model;

    protected $table = 'events';
    protected $order_column = 'created_at';

    public function getUserEvents()
    {
        $userId = $_SESSION['user_id']; // Retrieve userId from session

        // $userId =2;
    // Fetch rows from the table where status = 0 and userid matches
    $query = "SELECT * FROM `" . $this->table . "` WHERE `user_id` = :userid AND status=0";

    $result = $this->query($query, [':userid' => $userId]);
        //$print=$_SESSION['user_id'];
        // echo "$print";
    return $result;
    }

    public function addEvent($data) {
        return $this->insert($data) ? true : false;
    }
}
