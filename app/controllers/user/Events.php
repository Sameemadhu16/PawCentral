<?php

class Events{

    use Controller;

    public function index(){

        if(!($_SESSION['user_id'])){

            redirect('home');
        }
        // Initialize the model
        $model = new EventsModel();

        // Retrieve all pets
        $events['events'] = $model->getUserEvents();
        
         // Process images: convert binary `img1` data to Base64-encoded string
         foreach ($events['events'] as $event) {
            if (isset($event->eventimg)) {
                $event->eventimg = "data:image/jpeg;base64," . base64_encode($event->eventimg); // Adjust MIME type if not JPEG
            }else{
                $event->eventimg = null;
            }
        
        }

        $this->view('user/events',$events);
    }

    public function NewEvent(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $eventmodel = new EventsModel();

            // Collect form data
            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => $_POST['title'],
                'date' => $_POST['date'],
                'location' => $_POST['location'],
                'max_participants' => $_POST['participants'],
                'description' => $_POST['desc'],
                'time' => $_POST['time'],
                'address' => $_POST['address'],
                'eventimg' => null,
            ];

            // Process uploaded images
            if (isset($_FILES['photos'])) {
                $images = [];
                foreach ($_FILES['photos']['tmp_name'] as $key => $tmpName) {
                    if (!empty($tmpName) && $_FILES['photos']['error'][$key] === UPLOAD_ERR_OK) {
                        $images[] = file_get_contents($tmpName); // Read binary data
                    }
                }
                $data['eventimg'] = $images[0] ?? null;
            }
            $result = $eventmodel->addEvent($data);
            if ($result) {

                echo "Data inserted successfully. Redirecting...";
                redirect('userprofile/event');
                exit; 
            } else {

                echo "Data insertion failed.";

                $data['error'] = 'Failed to register pet. Please try again.';
                $this->view('userprofile/event', $data);
            }
        }

    }
    
    public function closeEvent($req_data)
    {
        $model = new EventsModel();
        $insert=explode("?",$req_data['id']);
        $id=$insert[0];
        parse_str($insert[1], $queryParams);
        $reason = $queryParams['reason'] ?? 'No reason provided';

        $data = ['status' => 3, 'closing_reason'=>$reason]; // Set status to closed

        $success=$model->update($id, $data, 'event_id');

        if ($success) {
            redirect('userprofile/event?success=Marked as complete');
        } else {
            redirect('userprofile/event?error=Failed to mark as complete');
        }
    }

}