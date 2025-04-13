<?php

class AdminEditAnnouncement
{
    use Controller;

    public function index()
    {

        $status=$this->getAnnouncement();

        if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submitAnnouncement'])) {
            $announcementModel = new Announcement;
            $this->editAnnouncement($announcementModel, $status);

        }
        $this->view('admin/edit_announcement', ['announcement' => $status]);
        // $this->view('admin/edit_announcement');
    }

    private function getAnnouncement()
    {
        //get the id from the query string
        $id = $_GET['id'] ?? null;
        // show($id);
        if ($id) {
            $announcementModel = new Announcement();
            $announcement = $announcementModel->first(['id' => $id]);

            if($announcement->status=1){
                if ($announcement) {
                    return $announcement;
                    // $this->view('admin/edit_announcement', ['announcement' => $announcement]);
                    // return true;
                } else {
                    //redirect to the view announcement page
                    redirect('admin/announcement');
                }
            }
            
        }
        // $this->view('admin/edit_announcement');
        //redirect to the view announcement page
        // redirect('admin/announcement');
    }
    private function editAnnouncement($announcementModel, $status)
    {

        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['description'],
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Get the ID for the update
        $id = $_POST['id'] ?? null;
        // show($id);

        if ($id) {
            $announcementModel->update($id, $data);
            // show($announcementModel);
            redirect('admin/announcement');
        } else {
            $this->view('admin/edit_announcement', ['error' => 'Failed to update the announcement. Please try again.', 'announcement' => $status]);
        }
    }
}
