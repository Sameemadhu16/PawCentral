<?php

class DonationsAndSupport {

    use Controller;

    function index(){
        // if(!($_SESSION['user_id'])){
        //     redirect('home');
        // }
        // Initialize the model
        $model = new DonationsModel();

        // Retrieve all pets
        $requests['requests'] = $model->getViewReq();
        
         // Process images: convert binary `img1` data to Base64-encoded string
         foreach ($requests['requests'] as $req) {
            if (isset($req->img)) {
                $req->img = "data:image/jpeg;base64," . base64_encode($req->img); // Adjust MIME type if not JPEG
            }else{
                $req->timg = null;
            }
        }

        // $this->view('user/donation',$requests);
        
        $this->view('donations&sup' ,$requests);
    }

    function showPost($id){
        // if(!($_SESSION['user_id'])){
        //     redirect('home');
        // }
        // Initialize the model
        $model = new DonationsModel();

        // Retrieve all posts
        $post_id = $id['id'];
        $post['post'] = $model->getDonReq($post_id);
        // print_r($request);
        // exit();
        // Process images: convert binary `img1` data to Base64-encoded string
            if (isset($post['post']->img)) {
                $post['post']->img = "data:image/jpeg;base64," . base64_encode($post['post']->img); // Adjust MIME type if not JPEG
            }else{
                $post['post']->img = null;
            }

        $this->view('donations&supportPost' ,$post);
    }

    function AddDonation($id) {
        if (!isset($_SESSION['user_id'])) {
            $donator_id=-1;
        }else {
            $donator_id=$_SESSION['user_id'];
        }
    
        $model = new DonationsModel();
        $post_id = $id['id'];
    
        // Handle POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $donator_id;
            $card_type = $_POST['card_type'] ?? '';
            $name = $_POST['holder'] ?? '';
            $account_no = $_POST['account'] ?? '';
            // $vcc = $_POST['vcc'] ?? '';
            $donateAmount = $_POST['donateAmount'] ?? '';
    
            // Save donation
            $status=$model->insertDonation([
                'user_id' => $user_id,
                'req_id' => $post_id,
                'card_type' => $card_type,
                'name' => $name,
                'account_no' => $account_no,
                'amount' => $donateAmount
            ]);
            // if($status==true){
            //     print_r("done");
            //     exit();
            // }else{
            //     print_r("not done");
            //     exit();
            // }
            // Redirect or show success message
            redirect("donationsnsupport/req?id=" . $post_id);
        }
    
    }
    

}