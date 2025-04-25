<?php

class AdminOverview {

    use Controller;
    private $valid_roles = ['admin'];   //allowed user roles. Make more arrays if needed

    public function index() {

        // CALL THE isAUthorized Function with the allowed roles that can access the route called page/controller function.
        // Pass an array of the user roles allowed 
        // $this->isAuthorized($this->valid_roles);
        // $this->getAnnouncementCount();
        // $this->getUserCount();
        // $this->getMedicalRegistrationCount();
        // $this->getRegisteredpetCount();

        $data = [
            'announcementCount' => $this->getAnnouncementCount(),
            'userCount' => $this->getUserCount(),
            'activeUser' => $this->getActiveUserCount(),
            'mediRegCount' => $this->getMedicalRegistrationCount(),
            'eventCount' => $this->getEventCount(),
            'donationCount' => $this->getDonationCount(),
            'lastMonthDonations' => $this->getLastMonthDonations(),
            'thisMonthDonations' => $this->getThisMonthDonations(),
            'regPetCount' => $this->getRegisteredpetCount(),
            'donationPrice' => $this->totalDonationPrice(),
            'adoptionPosts' => $this->getAdoptionPostCount(),
            'sellingPosts' => $this->getSellingPostCount(),
            'importingPosts' => $this->getImportPostCount(),
            'rentingPosts' => $this->getRentPostCount(),
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

    private function getActiveUserCount() {
        $userModel = new User;
        $activeUserCount = $userModel->getCount('Users', ['status' => 'active']); // Pass 'status' condition
        return $activeUserCount;
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

    private function getRegisteredpetCount(){
        $petModel = new RegisterPet;
        $petCount = $petModel->getCount();
        return $petCount;
    }

    private function getDonationCount(){
        $donationModel = new DonationsModel;
        $donationCount = $donationModel->getCount($table = 'donations');
        return $donationCount;
    }

    private function getLastMonthDonations() {
        $donationModel = new DonationsModel;
        $query = "SELECT SUM(amount) as total FROM donations WHERE MONTH(donated_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
        $result = $donationModel->query($query);
        // show($result);
        return isset($result[0]->total) ? (float)$result[0]->total : 0;
    }

    private function getThisMonthDonations() {
        $donationModel = new DonationsModel;
        $query = "SELECT SUM(amount) as total FROM donations WHERE MONTH(donated_at) = MONTH(CURRENT_DATE)";
        $result = $donationModel->query($query);
        return isset($result[0]->total) ? (float)$result[0]->total : 0;
    }

    private function totalDonationPrice(){
        $donationModel = new DonationsModel;
        $query = "SELECT SUM(amount) as total FROM donations";
        $result = $donationModel->query($query);

        return isset($result[0]->total) ? (float)$result[0]->total : 0;
    }

    private function getAdoptionPostCount() {
        $postModel = new AdoptionPostModel; // Use the correct model name
        $postCount = $postModel->getCount(); // Fetch the count of posts
        return $postCount;
    }

    private function getSellingPostCount()
    {
        $postModel = new AddPostpet; // Use the correct model name
        $postCount = $postModel->getCount(); // Fetch the count of posts
        return $postCount;
    }

    private function getRentPostCount()
    {
        $postModel = new RentPost; // Use the correct model name
        $postCount = $postModel->getCount(); // Fetch the count of posts
        return $postCount;
    }

    private function getImportPostCount()
    {
        $postModel = new ImportPet; // Use the correct model name
        $postCount = $postModel->getCount(); // Fetch the count of posts
        return $postCount;
    }
}