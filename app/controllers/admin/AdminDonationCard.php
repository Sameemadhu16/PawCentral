<?php

class AdminDonationCard{

    use Controller;
    private $valid_roles = ['admin'];

    public function index()
    {
        if($this->isAuthorized($this->valid_roles)){

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['id']) && isset($_POST['approve'])) {
                    $this->approveRequest($_POST['id']);
                    redirect('/admin/donation'); // Redirect to avoid resubmission
                    exit;
                }
    
                if (isset($_POST['id']) && isset($_POST['reject'])) {
                    $this->rejectDonationModel($_POST['id'], $_POST['reason']);
                    redirect('/admin/donation');
                    exit;
                }
            }
            $donationDetails = $this->getDonationDetails();
    
            // Process the image for the single donation object
            if (isset($donationDetails->img) && !empty($donationDetails->img)) {
                $donationDetails->img = "data:image/jpeg;base64," . base64_encode($donationDetails->img); // Adjust MIME type if not JPEG
            } else {
                $donationDetails->img = ROOT . "/assets/images/default-placeholder.png"; // Fallback image
            }
    
            $data = [
                'donation' => $donationDetails,
            ];
    
            // show($data);
    
            $this->view('admin/donation_card', $data);

        } else {
            //access denied page
            redirect('403');
        }
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
        $query = "UPDATE donation_requests SET approved = 1 WHERE id = $id";
        return $donationModel->query($query);
    }

    private function rejectDonationModel($id, $reason){
        $donationModel = new DonationsModel;
        $query = "UPDATE donation_requests SET approved = 2, rejection_reason = :reason WHERE id =:id";
        $params = [
            ':id' => $id,
            ':reason' => $reason
        ];
        return $donationModel->query($query, $params);
    }
}