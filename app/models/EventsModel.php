<?php

class EventsModel
{
    use Model;

    protected $table = 'events';
    protected $order_column = 'created_at';

    // protect

    public function getUserEvents()
    {
        $userId = $_SESSION['user_id']; // Retrieve userId from session

        // Fetch rows from the table where user_id matches the session user and status is not 3
        $query = "SELECT * FROM `" . $this->table . "` WHERE `user_id` = :userid AND `status` != 3";

        $result = $this->query($query, [':userid' => $userId]);

        return $result;
    }


    public function addEvent($data) {
        return $this->insert($data) ? true : false;
    }


    public function getPageEvents() //Add page limit to events
    {
        $query = "SELECT * FROM `" . $this->table . "` WHERE status=1 ";

        $result = $this->query($query);

        return $result;
    }

    public function getEventById($id) {

        $event = $this->first(['event_id' => $id['id']]);
        return $event;

    }

}
