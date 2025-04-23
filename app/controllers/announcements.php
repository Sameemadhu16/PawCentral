<?php

class Announcements {

    use Controller;

    public function index() {
        $model=new Announcement();
        $announcements['announcements'] = $model->getViewAnnouncements();
        $this->view('announcements',$announcements);
    }
}