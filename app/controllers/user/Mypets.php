<?php

class Mypets{

    use Controller;

    public function index(){

        if(!($_SESSION['user_id'])){

            redirect('home');
        }
        // Initialize the model
        $model = new RegisterPet();

        // Retrieve all pets
        $pets['pets'] = $model->getRegPets();
        
         // Process images: convert binary `img1` data to Base64-encoded string
         foreach ($pets['pets'] as $pet) {
            if (isset($pet->img1)) {
                $pet->img1 = "data:image/jpeg;base64," . base64_encode($pet->img1); // Adjust MIME type if not JPEG
            }
        
        }
        $this->view('user/mypets',$pets);
    }

    public function index2(){
        $this->view('user/selectedPet');
    }

    public function RegPet(){
        $this->view('user/regPet');
    }

}