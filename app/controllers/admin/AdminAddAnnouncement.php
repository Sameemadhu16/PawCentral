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
            redirect('403');
        }
        
    }

    private function submit($announcementModel)
    {
        if ($_SESSION['user']) {
            if ($_SESSION['user']->role !== 'admin') {
                $data['error'] = 'Only access to admin for this process';
                $this->view('admin/add_announcement', $data);
            } else {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $announcementModel = new Announcement;

                    $data = [
                        'title' => $_POST['title'],
                        'content' => $_POST['description'],
                        'user_id' => $_SESSION['user_id']  
                    ];

                    $result = $announcementModel->create($data);

                    if ($result) {


                        redirect('admin/announcement');
                        exit; 
                    } else {


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
