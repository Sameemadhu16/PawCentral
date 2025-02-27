<?php

class AdminOverview {

    use Controller;
    private $valid_roles = ['admin'];   //allowed user roles. Make more arrays if needed

    public function index() {

        // CALL THE isAUthorized Function with the allowed roles that can access the route called page/controller function.
        // Pass an array of the user roles allowed 
        $this->isAuthorized($this->valid_roles);
        $this->getAnnouncementCount();
        $this->getUserCount();

        $data = [
            'announcementCount' => $this->getAnnouncementCount(),
            'userCount' => $this->getUserCount()
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

    private function getUserCount(){
        
        $userModel = new User;

        $userCount = $userModel->getCount();

        // show($userCount);
        return $userCount;
    }
}