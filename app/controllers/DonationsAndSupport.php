<?php

class DonationsAndSupport {

    use Controller;

    function index(){
        if(!($_SESSION['user_id'])){

            redirect('home');
        }
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
}