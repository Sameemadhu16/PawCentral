<?php

class AdminAnnouncement
{
    use Controller;

    private $valid_roles = ['admin'];

    public function index()
    {
        if($this->isAuthorized($this->valid_roles)){
            $announcementModel = new Announcement();

            $announcements = $announcementModel->get([
                'status' => 0
            ], [
                'order_column' => 'updated_at',
                'order_type' => 'desc',

            ]);

            $this->view('admin/announcement', ['announcements' => $announcements]);

        } else {
            redirect('403');
        }

        
    }
}
