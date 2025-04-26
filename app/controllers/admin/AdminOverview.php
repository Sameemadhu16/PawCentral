<?php

class AdminOverview {

    use Controller;
    private $valid_roles = ['admin'];   //allowed user roles. Make more arrays if needed

    public function index() {

        $this->isAuthorized($this->valid_roles);

        // Calculate user growth
        $prevUsers = $this->getLastMonthUserCount();
        $currentUsers = $this->getThisMonthUserCount();
        $userGrowth = ($prevUsers === 0 && $currentUsers === 0) ? 0 : ($prevUsers > 0 ? round((($currentUsers - $prevUsers) / $prevUsers) * 100, 2) : 100);

        // Registered pets growth
        $prevPets = $this->getLastMonthRegisterPetCount();
        $currentPets = $this->getThisMonthRegisterPetCount();
        $petGrowth = ($prevPets === 0 && $currentPets === 0) ? 0 : ($prevPets > 0 ? round((($currentPets - $prevPets) / $prevPets) * 100, 2) : 100);

        // Active users growth
        $prevActive = $this->getLastMonthActiveUserCount();
        $currentActive = $this->getThisMonthActiveUserCount();
        $activeGrowth = ($prevActive === 0 && $currentActive === 0) ? 0 : ($prevActive > 0 ? round((($currentActive - $prevActive) / $prevActive) * 100, 2) : 100);

        // Donation growth
        $prevDonation = $this->getLastMonthDonations();
        $currentDonation = $this->getThisMonthDonations();
        $donationGrowth = ($prevDonation === 0 && $currentDonation === 0) ? 0 : ($prevDonation > 0 ? round((($currentDonation - $prevDonation) / $prevDonation) * 100, 2) : 100);


        $data = [
            'announcementCount' => $this->getAnnouncementCount(),
            'userCount' => $this->getUserCount(),
            'activeUser' => $this->getActiveUserCount(),
            'mediRegCount' => $this->getMedicalRegistrationCount(),
            'eventCount' => $this->getEventCount(),
            'donationCount' => $this->getDonationCount(), 
            'regPetCount' => $this->getRegisteredpetCount(),
            'donationPrice' => $this->totalDonationPrice(),
            'adoptionPosts' => $this->getAdoptionPostCount(),
            'sellingPosts' => $this->getSellingPostCount(),
            'importingPosts' => $this->getImportPostCount(),
            'rentingPosts' => $this->getRentPostCount(),
            'growthUsers' => $userGrowth,
            'growthPets' => $petGrowth,
            'growthActiveUsers' => $activeGrowth,
            'growthDonations' => $donationGrowth,
            
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

    private function getThisMonthUserCount()
    {
        $userModel = new User;
        $query = "SELECT COUNT(*) as count FROM users WHERE MONTH(created_at) = MONTH(CURRENT_DATE)";
        $result = $userModel->query($query);
        return isset($result[0]->count) ? (int)$result[0]->count : 0; // Use 'count' instead of 'total'
    }

    private function getLastMonthUserCount()
    {
        $userModel = new User;
        $query = "SELECT COUNT(*) as count FROM users WHERE MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
        $result = $userModel->query($query);
        return isset($result[0]->count) ? (int)$result[0]->count : 0;
    }

    private function getActiveUserCount() {
        $userModel = new User;
        $activeUserCount = $userModel->getCount('Users', ['status' => 'active']); // Pass 'status' condition
        return $activeUserCount;
    }

    private function getThisMonthActiveUserCount()
    {
        $userModel = new User;
        $query = "SELECT COUNT(*) as count FROM users WHERE  status = 'active' && MONTH(created_at) = MONTH(CURRENT_DATE)";
        $result = $userModel->query($query);
        return isset($result[0]->count) ? (int)$result[0]->count : 0; // Use 'count' instead of 'total'
    }

    private function getLastMonthActiveUserCount()
    {
        $userModel = new User;
        $query = "SELECT COUNT(*) as count FROM users WHERE status = 'active' && MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
        $result = $userModel->query($query);
        return isset($result[0]->count) ? (int)$result[0]->count : 0;
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
        $petModel = new RegisterPet();
        $petCount = $petModel->getCount();
        return $petCount;
    }

    private function getThisMonthRegisterPetCount(){
        $petModel = new RegisterPet();
        $query = "SELECT COUNT(*) as count FROM registered_pets WHERE MONTH(created_at) = MONTH(CURRENT_DATE)";
        $result = $petModel->query($query);
        return isset($result[0]->count) ? (int)$result[0]->count : 0;
    }
    private function getLastMonthRegisterPetCount()
    {
        $petModel = new RegisterPet();
        $query = "SELECT COUNT(*) as count FROM registered_pets WHERE MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
        $result = $petModel->query($query);
        return isset($result[0]->count) ? (int)$result[0]->count : 0;
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