<?php

class EventsModel
{
    use Model;

    protected $table = 'events';
    protected $order_column = 'created_at';
    protected $eventtable = 'events';
    protected $enrolltable = 'event_enrollments';
    protected $notificationtable = 'notifications_t';

    // protect

    public function getUserEvents()
    {
        $userId = $_SESSION['user_id']; // Retrieve userId from session
        $this->table = $this->eventtable;
        
        $query = "SELECT * FROM `" . $this->table . "` WHERE `user_id` = :userid ";

        $result = $this->query($query, [':userid' => $userId]);

        return $result;
    }


    public function addEvent($data) {
        $this->table = $this->eventtable;
        return $this->insert($data) ? true : false;
    }


    public function getPageEvents() //Add page limit to events
    {
        $this->table = $this->eventtable;
        $query = "SELECT * FROM `" . $this->table . "` WHERE status=1 ";

        $result = $this->query($query);

        return $result;
    }

    //for pagination for page amount of requests
    public function getTotalRequestsCount() {
        $this->table = $this->eventtable;
        $query = "SELECT COUNT(*) as total_requests FROM `" . $this->table . "` WHERE status=0 AND approved = 1";
        return $this->query($query);
    }

//filter out needed for each page
    public function getViewReqWithPagination($offset, $page_size) {
        $this->table = $this->eventtable;
        $offset = (int)$offset;
        $page_size = (int)$page_size;

        $query = "SELECT * FROM `" . $this->eventtable . "` WHERE status=0 AND approved = 1 ORDER BY created_at DESC LIMIT $offset, $page_size";
        return $this->query($query);
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
        $query = "SELECT * FROM `" . $this->table . "` ee JOIN events e ON e.event_id = ee.event_id WHERE ee.user_id = :userid AND `e`.`date` > NOW()";
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
        $query = "UPDATE `" . $this->table . "` SET `status` = 1, closing_reason = 'max participants' WHERE `event_id` = :eventid";
        $result = $this->query($query, [':eventid' => $data['event_id']]);

        // $query ="SELECT * FROM events WHERE event_id = :event_id";
        $event_id=['id' => $data['event_id']];
        $event = $this->getEventById($event_id);

        // prepare data for notification    
        $noti['title'] = $event->title . ' :Participants Filled Completely';
        $noti['user_id'] = $event->user_id;  
        $noti['message'] = 'Good News! your event has been automatically closed as it has reached the maximum number of participants.';
        $this->addNotification($noti);
        return $result;
    }

    public function addNotification($data) {
        $this->table = $this->notificationtable;
        return $this->insert($data) ? true : false;
    }

    //to download all the users enrolled in an event
    public function getEnrollmentsByEventId($event_id)
{
    $query = "SELECT u.id, u.first_name,u.last_name, e.email, e.reg_at 
              FROM event_enrollments e 
              Left JOIN users u ON e.user_id = u.id 
              WHERE e.event_id = :event_id";
    
    return $this->query($query, [':event_id' => $event_id]);
}

}
