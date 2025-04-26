<?php

class AdminEvent{

    use Controller;

    public function index(){

        $pendingEvents = $this->getEvents();

        foreach ($pendingEvents as $event) {
            if (isset($event->eventimg) && !empty($event->eventimg)) {
                $event->eventimg = "data:image/jpeg;base64," . base64_encode($event->eventimg); // Adjust MIME type if not JPEG
            } else {
                $event->eventimg = ROOT . "/assets/images/default-placeholder.png"; // Fallback image
            }
        }

        $data = [
            'events' => $pendingEvents,
            'allEvents' => $this->getALLEvents()
        ];
        // show($data);
        $this->view('admin/event', $data);
    }

    private function getEvents(){
        $eventModel = new EventsModel;
        $eventDetails = $eventModel->get([
            'status' => 0
        ],
        [
            'order_column' => 'created_at',
            'order_type' => 'desc'
        ]);
        return $eventDetails;
    }

    private function getALLEvents()
    {
        $eventModel = new EventsModel;
        $eventDetails = $eventModel->get(
            [],
            [
                'order_column' => 'created_at',
                'order_type' => 'desc'
            ]
        );
        return $eventDetails;
    }
}