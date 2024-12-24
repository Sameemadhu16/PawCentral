<?php

class AdminOverview {

    use Controller;
    private $valid_roles = ['admin'];   //allowed user roles. Make more arrays if needed

    public function index() {

        // CALL THE isAUthorized Function with the allowed roles that can access the route called page/controller function.
        // Pass an array of the user roles allowed 
        $this->isAuthorized($this->valid_roles);
        $this->getAnnouncementCount();

        $data = [
            'announcementCount' => $this->getAnnouncementCount()
            //add other data here
        ];

        $this->view('admin/overview', $data);
    }

    private function getAnnouncementCount(){

        $announcementModel = new Announcement;

        $announcementCount = $announcementModel->getCount();

        // show($announcementCount);
        return $announcementCount;

    }
}