<?php

class Events
{

    use Controller;

    public function index()
    {

        if (!($_SESSION['user_id'])) {

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
            } else {
                $event->eventimg = null;
            }
        }

        $this->view('shelter/events', $events);
    }

    public function NewEvent()
    {

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
                redirect('shelter/event');
                exit;
            } else {

                echo "Data insertion failed.";

                $data['error'] = 'Failed to register pet. Please try again.';
                $this->view('shelter/event', $data);
            }
        }
    }

    public function closeEvent($req_data)
    {
        $model = new EventsModel();
        $insert = explode("?", $req_data['id']);
        $id = $insert[0];
        parse_str($insert[1], $queryParams);
        $reason = $queryParams['reason'] ?? 'No reason provided';

        $data = ['status' => 1, 'closing_reason' => $reason]; // Set status to closed

        $success = $model->update($id, $data, 'event_id');

        if ($success) {
            redirect('shelter/event?success=Marked as complete');
        } else {
            redirect('shelter/event?error=Failed to mark as complete');
        }
    }

    public function showEnrolledEvents()
    {
        $model = new EventsModel();
        $events['enrolled_events'] = $model->getEnrolledEvents($_SESSION['user_id']);
        foreach ($events['enrolled_events'] as $event) {
            if (isset($event->eventimg)) {
                $event->eventimg = "data:image/jpeg;base64," . base64_encode($event->eventimg); // Adjust MIME type if not JPEG
            } else {
                $event->eventimg = null;
            }
        }
        $this->view('shelter/enrolled_events', $events);
    }

    public function downloadEnrollments()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
            $event_id = $_POST['event_id'];
            $event_name = $_POST['event_name'];

            $model = new EventsModel();
            $enrollments = $model->getEnrollmentsByEventId($event_id);

            // Call download method
            $this->exportToCSV($enrollments, $event_name . "_enrollments.csv");
        }
    }

    private function exportToCSV($data, $filename = "enrollments.csv")
    {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        if (!empty($data)) {
            // Output headers
            fputcsv($output, array_keys((array)$data[0]));

            // Output each row
            foreach ($data as $row) {
                fputcsv($output, (array)$row);
            }
        }

        fclose($output);
        exit;
    }
}
