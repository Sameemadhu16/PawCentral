<?php

class AdminEventView {
    use Controller;

    public function index() {
        $eventId = $_GET['id'];
        if (isset($_POST['approve'])) {
            $this->approveEvent($eventId);
        }
        if (isset($_POST['reject'])) {
            $this->rejectEvent($eventId);
        }
        $data = [
            'event' => $this->viewEvent($eventId),
        ];
        $this->view('admin/event_view', $data);
    }

    private function viewEvent($eventId) {
        $eventModel = new EventsModel;
        $eventDetails = $eventModel->get([
            'event_id' => $eventId,
        ]);
        return $eventDetails;
    }

    private function approveEvent($eventId) {
        $eventModel = new EventsModel;
        $eventModel->update($eventId, ['status' => 1], 'event_id');
        redirect('admin/event');
    }

    private function rejectEvent($eventId) {
        $eventModel = new EventsModel;
        $eventModel->update($eventId, ['status' => 2], 'event_id');
        redirect('admin/event');
    }
}
