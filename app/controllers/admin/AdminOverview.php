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
        $this->getMedicalRegistrationCount();

        $data = [
            'announcementCount' => $this->getAnnouncementCount(),
            'userCount' => $this->getUserCount(),
            'mediRegCount' => $this->getMedicalRegistrationCount(),
            'eventCount' => $this->getEventCount(),
            'donationCount' => $this->getDonationCount(),
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

    private function getMedicalRegistrationCount(){

        $mediModel = new MedicalProvModel;

        $mediRegCount = $mediModel->getCount();

        return($mediRegCount);
    }

    private function getEventCount(){
        $eventModel = new Event;
        $eventCount = $eventModel->getCount();
        return $eventCount;
    }

    private function getDonationCount(){
        $donationModel = new DonationsModel;
        $donationCount = $donationModel->getCount($table = 'donations');
        return $donationCount;
    }

    // private function getPostCount(){
    //     $postModel = new AddPostpet;
    //     $postCount = $postModel->getCount();
    //     return $postCount;
    // }
}