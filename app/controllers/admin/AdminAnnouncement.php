<?php

class AdminAnnouncement
{
    use Controller;

    private $valid_roles = ['admin'];

    public function index()
    {
        $this->isAuthorized($this->valid_roles);
        $announcementModel = new Announcement();

        // Retrieve all announcements, ordered by the most recent ones
        $announcements = $announcementModel->get([
            'status' => 0
        ], [
            'order_column' => 'updated_at',
            'order_type' => 'desc',
            
        ]);

        // echo password_hash('lehan1234*', PASSWORD_DEFAULT);
        // Pass announcements to the view
        $this->view('admin/announcement', ['announcements' => $announcements]);
    }
}
