<?php

class Donation{

    use Controller;

    function index(){
        if(!($_SESSION['user_id'])){

            redirect('home');
        }
        // Initialize the model
        $model = new DonationsModel();

        // Retrieve all pets
        $requests['requests'] = $model->getUserReq();
        
         // Process images: convert binary `img1` data to Base64-encoded string
         foreach ($requests['requests'] as $req) {
            if (isset($req->img)) {
                $req->img = "data:image/jpeg;base64," . base64_encode($req->img); // Adjust MIME type if not JPEG
            }else{
                $req->timg = null;
            }
        }

        $this->view('user/donation',$requests);

    }

    public function AddReq(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $donations = new DonationsModel();

            // Collect form data
            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => $_POST['title'],
                'reason' => $_POST['reason'],  // Renamed from 'health' to 'need'
                'info' => $_POST['info'],  // Explanation for the donation request
                'expire_date' => $_POST['before_date'],
                'amount' => $_POST['amount'],
                'collected' => 0,
                'img' => null,
                // Bank details
                // 'bank_name' => $_POST['bankName'] ?? null,
                // 'account_holder' => $_POST['accountHolder'] ?? null,
                // 'account_number' => $_POST['accountNumber'] ?? null,
                // 'swift_code' => $_POST['swiftCode'] ?? null,
            ];

            // Process uploaded images
            if (isset($_FILES['photos'])) {
                $images = [];
                foreach ($_FILES['photos']['tmp_name'] as $key => $tmpName) {
                    if (!empty($tmpName) && $_FILES['photos']['error'][$key] === UPLOAD_ERR_OK) {
                        $images[] = file_get_contents($tmpName); // Read binary data
                    }
                }
                $data['img'] = $images[0] ?? null;
            }            

            $result = $donations->addReq($data);
            if ($result) {

                echo "Data inserted successfully. Redirecting...";
                redirect('userprofile/event');
                exit; 
            } else {

                echo "Data insertion failed.";

                $data['error'] = 'Failed to register pet. Please try again.';
                $this->view('userprofile/event', $data);
            }
        }

    }
}