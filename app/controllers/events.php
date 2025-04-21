<?php

class Events {

    use Controller;

    public function index() {
        $model = new EventsModel();

        // Retrieve all pets
        $events['events'] = $model->getPageEvents();
        
         // Process images: convert binary `img1` data to Base64-encoded string
         foreach ($events['events'] as $event) {
            if (isset($event->eventimg)) {
                $event->eventimg = "data:image/jpeg;base64," . base64_encode($event->eventimg); // Adjust MIME type if not JPEG
            }else{
                $event->eventimg = null;
            }
        
        }

        $this->view('events',$events);
    }

    public function EventInfo($id) {

        if (!$id) {
            // Redirect if no ID is provided
            redirect('events');
        }

        $model = new EventsModel();

        // Retrieve all pets
        $event['event'] = $model->getEventById($id);       
        // $event = (array) $eventdata;

        // Process images: convert binary `eventimg` data to Base64-encoded string
        if (isset($event['event']->eventimg)) {
            $event['event']->eventimg = "data:image/jpeg;base64," . base64_encode($event['event']->eventimg);
        } else {
            $event['event']->eventimg = null;
        }

//         echo '<pre>';
// print_r($event['event']);
// echo '</pre>';
// die();

        $this->view('event-info',$event);
    }

    public function Enroll() {

        if(!isset($_SESSION['user_id'])){
            $user_id = -1; //Non registered user id
            // redirect('announcements');
            $email = $_POST['email'] ?? '';
        }else{
            $user_id = $_SESSION['user_id'];
            $email = $_SESSION['user']->email;
        }

        // Get POST data
        $data = [
            'event_id' => $_POST['event_id'] ?? '',
            // 'name' => $_POST['name'] ?? '',
            'contact_no' => $_POST['contact'] ?? '',
            'email' => $email,
            'notes' => $_POST['comment'] ?? '',
            'user_id' => $user_id
        ];

        // Validate required fields
        if(empty($data['event_id']) || empty($data['contact_no']) ) {
            redirect('eventsandcampaigns'); 
            return;
        }

        // print_r($data);
        $model = new EventsModel();
        // $result = $model->enrollUser($data);    

        try {
            $model->enrollUser($data);
            $event_id['id'] = $data['event_id'];
            $event['event'] = $model->getEventById($event_id);
            // $msg['msg'] = (object)['msg' => "You're already enrolled!"];

            $model->incrementUserEnroll($data);

            $this->view('eventsandcampaigns/enrollacknow',$event);
        
        } catch (PDOException $e) {
            $errorMsg = $e->getMessage();
        
            // Check if it's a duplicate entry for the same event+email
            if (strpos($errorMsg, 'Duplicate entry') !== false && strpos($errorMsg, 'unique_event_email') !== false) {
                // Already enrolled — show confirmation anyway
                $event_id['id'] = $data['event_id'];
                $event['event'] = $model->getEventById($event_id);
                // $msg['msg'] = (object)['msg' => "You're already enrolled!"];
                $this->view('eventsandcampaigns/enrollment_confirmation',$event); //,$msg can only pass 1 variable to frontend
            } else {
                // For all other errors
                // echo "ERROR: " . $errorMsg;
                $this->view('404');
            }
        }
    }   

}