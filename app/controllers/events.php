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

    
}