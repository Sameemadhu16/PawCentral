<?php

class AdminEventView {
    use Controller;
    public function index(){
        $eventId = $_GET['id'];
        $data = [
            'event' => $this->viewEvent($eventId)
        ];
        $this->view('admin/event_view', $data);
    }

    private function viewEvent($eventId){
        $eventModel = new EventsModel;
        $eventDetails = $eventModel->get([
            'event_id' => $eventId,
            
        ]);
        return $eventDetails;

    }
}
