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
}