<?php

class EventInfo{

    use Controller;
    private $valid_roles = ['shelter'];

    public function index()
    {
        $this->isAuthorized($this->valid_roles);
        $eventModel = new Event;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitEvent'])) {
            $this->submit($eventModel);
            return;
        }

        $this->view('shelter/eventInfo');

    }

    private function submit($eventModel){
         $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'date' => $_POST['date'],
            'time' => $_POST['time'],
            'location' => $_POST['location'],
            'address' => $_POST['address'],
            'max_participants' => $_POST['max_participants'],
            'user_id' => $_SESSION['user_id']
        ];

        show($data);

        $result = $eventModel->insert($data);

        show($result);

        if ($result) {
            redirect('shelter/event');
            exit;
        } else {
            $data['error'] = 'Failed to create event. Please try again.';
            $this->view('shelter/eventInfo', $data);
        }
    }
}