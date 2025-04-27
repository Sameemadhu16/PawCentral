<?php

class AdminAddAnnouncement
{
    use Controller;
    private $valid_roles = ['admin'];

    public function index()
    {
        if($this->isAuthorized($this->valid_roles)){
            $announcementModel = new Announcement;

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitAnnouncement'])) {
                $this->submit($announcementModel);
                return;
            }
            $this->view('admin/add_announcement');

        } else {
            //access denied page
            redirect('403');
        }
        
    }

    private function submit($announcementModel)
    {
        if ($_SESSION['user']) {
            if ($_SESSION['user']->role !== 'admin') {
                // $data['error'] = 'You do not have permission to create an announcement.';
                $data['error'] = 'Only access to admin for this process';
                $this->view('admin/add_announcement', $data);
            } else {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $announcementModel = new Announcement;

                    // Collect form data
                    $data = [
                        'title' => $_POST['title'],
                        'content' => $_POST['description'],
                        //  'date' => $_POST['date'],
                        'user_id' => $_SESSION['user_id']  // Set to 1 for testing if no session user_id
                    ];

                    // print($data['user_id']);
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
        }else{
            redirect('login');
        }
    }
}
