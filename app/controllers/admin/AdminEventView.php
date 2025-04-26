<?php

class AdminEventView {
    use Controller;
    private $valid_roles = ['admin'];

    public function index()
    {
        $this->isAuthorized($this->valid_roles);
        
        $eventId = $_GET['id'] ?? null;

        if (!$eventId) {
            redirect('admin/event'); // Redirect if no event ID is provided
            exit;
        }

        if (isset($_POST['approve'])) {
            $this->approveEvent($eventId);
        }
        if (isset($_POST['reject'])) {
            $this->rejectEvent($eventId);
        }

        $viewEvents = $this->viewEvent($eventId);

        // Ensure $viewEvents is an object or handle the case where it is not found
        if (!$viewEvents) {
            redirect('admin/event'); // Redirect if no event is found
            exit;
        }

        // Process the image for the single event object
        if (isset($viewEvents->eventimg) && !empty($viewEvents->eventimg)) {
            $viewEvents->eventimg = "data:image/jpeg;base64," . base64_encode($viewEvents->eventimg); // Adjust MIME type if not JPEG
        } else {
            $viewEvents->eventimg = ROOT . "/assets/images/default-placeholder.png"; // Fallback image
        }

        $data = [
            'event' => $viewEvents,
        ];
        
        $this->view('admin/event_view', $data);
    }

    private function viewEvent($eventId) {
        $eventModel = new EventsModel;
        $eventDetails = $eventModel->get([
            'event_id' => $eventId,
        ]);

        // Return the first result as an object or false if not found
        return $eventDetails ? (object) $eventDetails[0] : false;
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
