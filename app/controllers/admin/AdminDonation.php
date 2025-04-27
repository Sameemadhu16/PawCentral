<?php

class AdminDonation{

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
    
            // Retrieve pending donations
            $pendingDonations = $this->getPendingRequests();
    
            // Process images: convert binary `img` data to Base64-encoded string
            foreach ($pendingDonations as $donation) {
                if (isset($donation->img) && !empty($donation->img)) {
                    $donation->img = "data:image/jpeg;base64," . base64_encode($donation->img); // Adjust MIME type if not JPEG
                } else {
                    $donation->img = ROOT . "/assets/images/default-placeholder.png"; // Fallback image
                }
            }
    
            // Prepare the view data
            $data = [
                'total_donations' => $this->getTotalDonations(),
                'pending_count' => $this->getPendingRequestCount(),
                'approved_count' => $this->getApprovedCount(),
                'pending_donations' => $pendingDonations,
                'all_requests' => $this->getAllDonationRequests(),
                'thisMonthDonations' => $this->getThisMonthDonations(),
            ];
    
            $this->view('admin/donation', $data);
        } else {
            //access denied page
            redirect('403');
        }

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
        $query = "SELECT COUNT(*) as count FROM donation_requests WHERE status= 0 AND approved = 0";
        $result = $donationModel->query($query);

        return isset($result[0]->count) ? (int)$result[0]->count : 0;
    }

    private function getApprovedCount(){
        $donationModel = new DonationsModel;
        $query = "SELECT COUNT(*) as count FROM donation_requests WHERE status= 0 AND approved = 1";
        $result = $donationModel->query($query);

        return isset($result[0]->count) ? (int)$result[0]->count : 0;
    }

    private function getPendingRequests(){
        $donationModel = new DonationsModel;
        $query = "SELECT * FROM donation_requests WHERE status= 0 AND approved = 0";

        $result = $donationModel->query($query);
        return $result;

    }

    private function getAllDonationRequests(){
        $donationModel = new DonationsModel;
        $query = "SELECT * FROM donation_requests WHERE status != 1";
        $result = $donationModel->query($query);
        return $result;
    }

    private function approveRequest($id)
    {
        $donationModel = new DonationsModel;
        $notifiModel = new NotificationsModel;

        // 1. Approve the donation request
        $query = "UPDATE donation_requests SET approved = 1 WHERE id = :id";
        $params = [':id' => $id];
        $donationModel->query($query, $params);

        // 2. Fetch the donation request to get user info
        $query = "SELECT * FROM donation_requests WHERE id = :id LIMIT 1";
        $donation = $donationModel->query($query, $params);

        if ($donation && count($donation) > 0) {
            $donation = $donation[0]; // get the first record

            $userId = $donation->user_id; // assuming user_id column exists

            // 3. Send notification
            $notifiModel->sendNotification(
                $userId,
                "Donation Request Approved",
                "Your donation request has been approved. Thank you for your contribution!"
            );
        }

        return true;
    }



    private function rejectDonationModel($id, $reason)
    {
        $donationModel = new DonationsModel;
        $notifiModel = new NotificationsModel;

        // 1. Reject the donation request and save rejection reason
        $query = "UPDATE donation_requests SET approved = 2, rejection_reason = :reason WHERE id = :id";
        $params = [
            ':id' => $id,
            ':reason' => $reason
        ];
        $donationModel->query($query, $params);

        // 2. Fetch the donation request to get user info
        $query2 = "SELECT * FROM donation_requests WHERE id = :id LIMIT 1";
        $params2 = [':id' => $id];
        $donation = $donationModel->query($query2, $params2);

        if ($donation && count($donation) > 0) {
            $donation = $donation[0]; // select the first record

            $userId = $donation->user_id; // assuming donation_requests table has user_id

            // 3. Send notification with rejection reason
            $notifiModel->sendNotification(
                $userId,
                "Donation Request Rejected",
                "Unfortunately, your donation request has been rejected. Reason: " . $reason
            );
        }

        return true;
    }




    private function getThisMonthDonations()
    {
        $donationModel = new DonationsModel;
        $query = "SELECT SUM(amount) as total FROM donations WHERE MONTH(donated_at) = MONTH(CURRENT_DATE)";
        $result = $donationModel->query($query);
        return isset($result[0]->total) ? (float)$result[0]->total : 0;
    }
}