<?php

class AdminDonationCard{

    use Controller;

    public function index(){
        $this->getDonationDetails();
    }

    private function getDonationDetails()
    {
        if (!isset($_GET['id'])) {
            redirect('admin/donation'); // Redirect if no ID is provided
        }

        $id = $_GET['id'];
        $donationModel = new DonationsModel;
        $donation = $donationModel->getDonations(['id' => $id]);

        if (!$donation) {
            redirect('admin/donation'); // Redirect if no donation is found
        }

        $data = [
            'donation' => $donation[0], // Pass the first result as the donation details
        ];

        $this->view('admin/donation_card', $data);
    }
}