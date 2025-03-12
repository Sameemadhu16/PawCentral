<?php

class AdminEvent{

    use Controller;

    public function index(){
        $data = [
            'events' => $this->getEvents()
        ];
        // show($data);
        $this->view('admin/event', $data);
    }

    private function getEvents(){
        $eventModel = new EventsModel;
        $eventDetails = $eventModel->get([],
        [
            'order_column' => 'created_at',
            'order_type' => 'desc'
        ]);
        return $eventDetails;
    }
}