<?php

class AdminDonationCard{

    use Controller;

    public function index(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id']) && isset($_POST['approve'])) {
                $this->approveRequest($_POST['id']);
                redirect('/admin/donation'); // Redirect to avoid resubmission
                exit;
            }

            if (isset($_POST['id']) && isset($_POST['reject'])) {
                $this->rejectRequest($_POST['id']);
                redirect('/admin/donation');
                exit;
            }
        }
        $data = [
            'donation' => $this->getDonationDetails(),
        ];

        $this->view('admin/donation_card', $data);
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

        return $donation[0];
    }

    private function approveRequest($id)
    {
        $donationModel = new DonationsModel;
        $query = "UPDATE donation_requests SET status = 1 WHERE id = $id";
        return $donationModel->query($query);
    }

    private function rejectRequest($id)
    {
        $donationModel = new DonationsModel;
        $query = "UPDATE donation_requests SET status = 2 WHERE id = $id";
        return $donationModel->query($query);
    }
}