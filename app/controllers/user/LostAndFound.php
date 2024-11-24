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
}
