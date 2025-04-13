<?php

class AdminEvent{

    use Controller;

    public function index(){
        $data = [
            'events' => $this->getEvents(),
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