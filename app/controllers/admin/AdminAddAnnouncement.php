<?php

class AdminAddAnnouncement
{
    use Controller;

    public function index()
    {
        $this->view('admin/add_announcement');
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $announcementModel = new Announcement;

            // Collect form data
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['description'],
                //  'date' => $_POST['date'],
                'user_id' => $_SESSION['user_id'] ?? 1 // Set to 1 for testing if no session user_id
            ];

            // Insert data and store result
            $result = $announcementModel->create($data);

            // Debugging: output result and check if it proceeds to redirect
            if ($result) {

                //echo "Data inserted successfully. Redirecting..."; 

                redirect('admin/announcement');
                exit; // Ensure script stops after redirect
            } else {

                // echo "Data insertion failed.";

                $data['error'] = 'Failed to create announcement. Please try again.';
                $this->view('admin/add_announcement', $data);
            }
        } else {
            redirect('admin/add_announcement');
        }
    }
}
