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

        // Pass announcements to the view
        $this->view('admin/announcement', ['announcements' => $announcements]);
    }
}
