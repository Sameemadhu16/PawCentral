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
    
    public function createCheckoutSession()
    {
        require_once(__DIR__ . '/../../public/stripe/init.php'); 
    
        \Stripe\Stripe::setApiKey('sk_test_51REdIxFTo4VHHbeOHSLcbBaXmJnCiM2rHqyrMVEwS9eksOVHTIXSfupIP8MTBn5KaEDQvdisKdF1nOHa1zwkbr3r00ZYAWN6PV'); // your secret test key

        try {
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => 'Donation'],
                        'unit_amount' => 5000,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost/PawCentral/public/donationsnsupport/paymentsuccess',
                'cancel_url' => 'http://localhost/PawCentral/public/donationsnsupport',
            ]);
    
            header("Location: " . $session->url);
            exit;
        } catch (Exception $e) {
            echo 'Stripe error: ' . $e->getMessage();
        }
    }

    public function paySuccess() {
        $this->view('PaymentSuccessful');
    }


    
}