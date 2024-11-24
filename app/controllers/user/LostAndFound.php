<?php

// class LostAndFound{

//     use Controller;

//     function index(){
//         $this->view('user/lost_and_found');
//     }
// }


class LostAndFound
{
    use Controller;

    public function index()
    {
        // Initialize the model
        $model = new LostAndFoundModel();

        // Retrieve all pets
        $data['pets'] = $model->getAllPets();
        
         // Process images: convert binary `img1` data to Base64-encoded string
         foreach ($data['pets'] as $pet) {
            if (isset($pet->img1)) {
                $pet->img1 = "data:image/jpeg;base64," . base64_encode($pet->img1); // Adjust MIME type if not JPEG
            }
        }

        // Pass data to the view
        $this->view('user/lost_and_found', $data);
    }


    // Method to show the detailed view of a pet
    public function show($petid)
    {
        // Initialize the model
        $model = new LostAndFoundModel();

        // Retrieve the pet data by petid
        $data['pet'] = $model->getPetById($petid);

        // Check if pet data was found
        if (!$data['pet']) {
            // Handle error if pet not found (optional)
            echo "Pet not found.";
            exit;
        }

        // Pass data to the view
        $this->view('lost-pet', $data);
    }
}
