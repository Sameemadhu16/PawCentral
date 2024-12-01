<?php

class AdminAnnouncement
{
    use Controller;

    public function index()
    {
        $announcementModel = new Announcement();

        // Retrieve all announcements, ordered by the most recent ones
        $announcements = $announcementModel->get([], [
            'order_column' => 'updated_at',
            'order_type' => 'desc'
        ]);

        // echo password_hash('lehan1234*', PASSWORD_DEFAULT);
        // Pass announcements to the view
        $this->view('admin/announcement', ['announcements' => $announcements]);
    }
}
