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
            if (isset($pet->petimg)) {
                $pet->petimg = "data:image/jpeg;base64," . base64_encode($pet->petimg); // Adjust MIME type if not JPEG
            }else{
                $pet->petimg = null;
            }
        
        }
        $this->view('user/mypets',$pets);
    }

    public function index2(){
        $this->view('user/selectedPet');
    }

    public function RegPet(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $petmodel = new RegisterPet();

            // Collect form data
            $data = [
                'user_id' => $_SESSION['user_id'],
                'name' => $_POST['name'],
                'breed' => $_POST['breed'],
                'species' => $_POST['type'],
                'height' => $_POST['height'],
                'weight' => $_POST['weight'],
                'nuetered' => $_POST['neutered']=='Yes'? 1 : 0,
                'sex' => $_POST['sex'],
                'birth_date' => $_POST['birth_date'],
                'health' => $_POST['health'],
                'color' => $_POST['color'],
                'petimg' => null,
            ];

            // Process uploaded images
            if (isset($_FILES['photos'])) {
                $images = [];
                foreach ($_FILES['photos']['tmp_name'] as $key => $tmpName) {
                    if (!empty($tmpName) && $_FILES['photos']['error'][$key] === UPLOAD_ERR_OK) {
                        $images[] = file_get_contents($tmpName); // Read binary data
                    }
                }
                $data['petimg'] = $images[0] ?? null;
            }            
            $result = $petmodel->registerPet($data);
            if ($result) {

                echo "Data inserted successfully. Redirecting...";
                redirect('userprofile/mypets');
                exit; 
            } else {

                echo "Data insertion failed.";

                $data['error'] = 'Failed to register pet. Please try again.';
                $this->view('userprofile/mypets', $data);
            }
        }
    }

}