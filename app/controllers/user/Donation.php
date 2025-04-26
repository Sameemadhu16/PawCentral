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
                'reason' => $_POST['reason'],  
                'need_category' => $_POST['need_category'],
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
                redirect('userprofile/donations');
                exit; 
            } else {

                echo "Data insertion failed.";

                $data['error'] = 'Failed to register pet. Please try again.';
                $this->view('user/donations', $data);
            }
        }

    }

    public function CloseReq($req_data)
    {

        $insert=explode("?",$req_data['id']);
        $id=$insert[0];
        parse_str($insert[1], $queryParams);
        $reason = $queryParams['reason'] ?? 'No reason provided';

// echo "<pre>";
// print_r($reason);
// print_r("adsd\n");
// print_r($insert);
// echo "</pre>";
// exit();

        $model = new DonationsModel();
        $data = ['status' => 1, 'closing_reason'=>$reason]; // Set status to closed

        $success=$model->closeReq($id, $data, 'id');

        if ($success) {
            header("Location: " . ROOT . "/userprofile/donations");
        } else {
            header("Location: " . ROOT . "/userprofile/donations");
        }
    }

    //update Donation Requests: make approve = 0 for re review
    function EditReq($id){
        if(!($_SESSION['user_id']) OR $id == NULL){
            redirect('userprofile/donations');
        }

        // Initialize the model
        $model = new DonationsModel();
        $post_id = $id['id']; //req id

        // Retrieve all pets
        $post['post'] = $model->getDonReq($post_id);
        // print_r($post);
        // exit();
         // Process images: convert binary `img1` data to Base64-encoded string
    
         if (isset($post['post']->img)) {
            $post['post']->img = "data:image/jpeg;base64," . base64_encode($post['post']->img); // Adjust MIME type if not JPEG
        }else{
            $post['post']->img = null;
        }

        $this->view('user/updatepending_req',$post);
    }

    function UpdateReq(){
        //get data from the form and update the donation request in the table using updateInfo function in donationModel
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $donations = new DonationsModel();

            // Collect form data
            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => $_POST['title'],
                'reason' => $_POST['reason'],  
                'need_category' => $_POST['need_category'],
                'info' => $_POST['info'],  // Explanation for the donation request
                'expire_date' => $_POST['before_date'],
                'amount' => $_POST['amount'],
                'approved' => 0,
            ];

            // Handle image upload
            if (isset($_FILES['newimg']) && $_FILES['newimg']['tmp_name']) {
                // New image was uploaded
                $data['img'] = file_get_contents($_FILES['newimg']['tmp_name']);
            } elseif (isset($_POST['old_img']) && !empty($_POST['old_img'])) {
                // No new image, but old image exists - convert from base64 data URL back to binary
                $base64_string = str_replace('data:image/jpeg;base64,', '', $_POST['old_img']);
                $data['img'] = base64_decode($base64_string);
            } else {
                // No image at all
                $data['img'] = null;
            }

            $result = $donations->UpdateReq($_POST['id'],$data,'id');
            if ($result) {
                // print_r('suxes');
                header("Location: " . ROOT . "/userprofile/donations");
                exit; 
            } else {
                echo "Failed to update donation request";
                $data['error'] = 'Failed to update donation request. Please try again.';
                header("Location: " . ROOT . "/404");
            }
        }
    }

    function UpdateView($id){
        if(!($_SESSION['user_id']) OR $id == NULL){
            redirect('home');
        }

        // Initialize the model
        $model = new DonationsModel();
        $post_id = $id['id']; //req id

        // Retrieve all pets
        $post['post'] = $model->getDonReq($post_id);
        // print_r($post);
        // exit();
         // Process images: convert binary `img1` data to Base64-encoded string
    
         if (isset($post['post']->img)) {
            $post['post']->img = "data:image/jpeg;base64," . base64_encode($post['post']->img); // Adjust MIME type if not JPEG
        }else{
            $post['post']->img = null;
        }

        $this->view('user/donation_req_update',$post);
    }
}