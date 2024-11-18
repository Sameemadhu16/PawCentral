<?php

class AdminEditAnnouncement{
    use Controller;

    public function index() {

        //get the id from the query string
        $id = $_GET['id'] ?? null;

        if($id){
            $announcementModel = new Announcement();
            $announcement = $announcementModel->first(['id' => $id]);

            //if the annocemnent exist s then pass to the view
            if($announcement){
                $this->view('admin/edit_announcement', ['announcement' => $announcement]);
            } else {
                //redirect to the view announcement page
                redirect('admin/announcement');
            }
        }

        //redirect to the view announcement page
        redirect('admin/announcement');

    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $announcementModel = new Announcement;

            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['description'],
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Get the ID for the update
            $id = $_POST['id'] ?? null;

            if ($id) {
                $announcementModel->update($id, $data);
                redirect('admin/announcement');
            } else {
                $this->view('admin/edit_announcement', ['error' => 'Failed to update the announcement. Please try again.']);
            }
        } else {
            redirect('admin/announcement');
        }
    }
}