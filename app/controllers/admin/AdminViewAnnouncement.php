<?php

class AdminViewAnnouncement
{
    use Controller;

    public function index($id)
    {
        if (!$id) {
            // Redirect if no ID is provided
            redirect('admin/announcement');
        }

        $announcementModel = new Announcement();

        // Fetch the announcement using the ID
        $announcement = $announcementModel->first(['id' => $id['id']]);

        if (!$announcement) {
            // Redirect if no matching announcement is found
            redirect('admin/announcement');
            //print_r('gg');
        }

        // Pass the announcement to the view
        $this->view('admin/view_announcement', ['announcement' => $announcement]);
    }

    
}
