<?php

class AdminEditAnnouncement
{
    use Controller;
    private $valid_roles = ['admin'];

    public function index()
    {
        if($this->isAuthorized($this->valid_roles)){


            $status=$this->getAnnouncement();
    
            if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submitAnnouncement'])) {
                $announcementModel = new Announcement;
                $this->editAnnouncement($announcementModel, $status);
    
            }
            $this->view('admin/edit_announcement', ['announcement' => $status]);
        } else {
            redirect('403');
        }
    }

    private function getAnnouncement()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $announcementModel = new Announcement();
            $announcement = $announcementModel->first(['id' => $id]);

            if($announcement->status=1){
                if ($announcement) {
                    return $announcement;
                } else {
                    redirect('admin/announcement');
                }
            }
            
        }
    }
    private function editAnnouncement($announcementModel, $status)
    {

        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['description'],
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $id = $_POST['id'] ?? null;

        if ($id) {
            $announcementModel->update($id, $data);
            redirect('admin/announcement');
        } else {
            $this->view('admin/edit_announcement', ['error' => 'Failed to update the announcement. Please try again.', 'announcement' => $status]);
        }
    }
}
