<?php

class AdminDonation{

    use Controller;

    public function index(){

        $data = [
            'total_donations' => $this->getTotalDonations(),
            'pending_count' => $this->getPendingRequestCount(),
            'approved_count' => $this->getApprovedCount(),
            'pending_donations' => $this->getPendingRequests(),
            'all_requests' => $this->getAllDonationRequests()
        ];

        $this->view('admin/donation', $data);
    }

    private function getTotalDonations()
    {
        $donationModel = new DonationsModel;
        $query = "SELECT SUM(amount) as total FROM donations";
        $result = $donationModel->query($query);

        // Return the numeric total, or 0 if no result
        return isset($result[0]->total) ? (float)$result[0]->total : 0;
    }

    private function getPendingRequestCount(){
        $donationModel = new DonationsModel;
        $query = "SELECT COUNT(*) as count FROM donation_requests WHERE status= 0";
        $result = $donationModel->query($query);

        return isset($result[0]->count) ? (int)$result[0]->count : 0;
    }

    private function getApprovedCount(){
        $donationModel = new DonationsModel;
        $query = "SELECT COUNT(*) as count FROM donation_requests WHERE status= 1";
        $result = $donationModel->query($query);

        return isset($result[0]->count) ? (int)$result[0]->count : 0;
    }

    private function getPendingRequests(){
        $donationModel = new DonationsModel;
        $query = "SELECT * FROM donation_requests WHERE status= 0";

        $result = $donationModel->query($query);
        return $result;

    }

    private function getAllDonationRequests(){
        $donationModel = new DonationsModel;
        $query = "SELECT * FROM donation_requests";
        $result = $donationModel->query($query);
        return $result;
    }
}