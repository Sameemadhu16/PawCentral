<?php

class EventsModel
{
    use Model;

    protected $table = 'events';
    protected $order_column = 'created_at';
    protected $eventtable = 'events';
    protected $enrolltable = 'event_enrollments';
    protected $notificationtable = 'notifications_t';

    public function getUserEvents()
    {
        $userId = $_SESSION['user_id']; // Retrieve userId from session
        $this->table = $this->eventtable;
            // $userId =2;
        // Fetch rows from the table where status = 0 and userid matches
        $query = "SELECT * FROM `" . $this->table . "` WHERE `user_id` = :userid"; //add approved filtering (maybe filter from frontend)

        $result = $this->query($query, [':userid' => $userId]);
            //$print=$_SESSION['user_id'];
            // echo "$print";
        return $result;
    }


    public function addEvent($data) {
        $this->table = $this->eventtable;
        return $this->insert($data) ? true : false;
    }


    public function getPageEvents() //Add page limit to events
    {
        $this->table = $this->eventtable;
        $query = "SELECT * FROM `" . $this->table . "` WHERE status=0 AND approved = 1";

        $result = $this->query($query);

        return $result;
    }

    public function getEventById($id) {

        $this->table = $this->eventtable;
        $event = $this->first(['event_id' => $id['id']]);
        return $event;

    }

    public function enrollUser($data) {
        $this->table = $this->enrolltable;
        return $this->insert($data) ? true : false;
    }

    public function getEnrolledEvents($userId) {
        $this->table = $this->enrolltable;
        $query = "SELECT * FROM `" . $this->table . "` ee JOIN events e ON e.event_id = ee.event_id WHERE ee.user_id = :userid AND e.status = 0";
        $result = $this->query($query, [':userid' => $userId]);
        // print_r($result);
        return $result;
    }

    public function incrementUserEnroll($data) {
        $this->table = $this->eventtable;
        $query = "UPDATE `" . $this->table . "` SET `enrolled` = `enrolled` + 1 WHERE `event_id` = :eventid";
        $result = $this->query($query, [':eventid' => $data['event_id']]);

        //check if enrolled is greater than max_participants
        // $query = "SELECT * FROM `" . $this->table . "` WHERE `event_id` = :eventid";
        // $this->query($query, [':eventid' => $data['event_id']]); Dont Use this as this uses Lazy fetching: give errors undefined params;
        // $checkcount = $this->fetch(); // or fetch(), result(), etc. — whatever you use to fetch 1 row

        $checkcount = $this->first(['event_id' => $data['event_id']]);

        if ($checkcount->enrolled >= $checkcount->max_participants) {

            $this->closeEvent($data);
        }

        return $result;
    }   

    public function closeEvent($data) {
        $this->table = $this->eventtable;
        $query = "UPDATE `" . $this->table . "` SET `status` = 1 WHERE `event_id` = :eventid";
        $result = $this->query($query, [':eventid' => $data['event_id']]);

        $event_id=['id' => $data['event_id']];
        $event = $this->getEventById($event_id);

        // prepare data for notification    
        $noti['title'] = $event->title . ' :Participants Filled Completely';
        $noti['user_id'] = $data['user_id'];  
        $noti['message'] = 'Good News! your event has been automatically closed as it has reached the maximum number of participants.';
        $this->addNotification($noti);
        return $result;
    }

    public function addNotification($data) {
        $this->table = $this->notificationtable;
        return $this->insert($data) ? true : false;
    }
}
