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



    public function show($id)
    {
        if (!$id) {
            // Redirect if no ID is provided
            redirect('lostandfound');
        }

        $lostnfoundModel = new LostAndFoundModel();

        // Fetch the announcement using the ID
        $pet = $lostnfoundModel->first(['petid' => $id['id']]);

        if (!$pet) {
            // Redirect if no matching pet post is found
            redirect('lostandfound');
        }

        // foreach (['img1', 'img2', 'img3'] as $imgColumn) {
        //     if (isset($pet->$imgColumn)) {
        //         $pet->$imgColumn = "data:image/jpeg;base64," . base64_encode($pet->$imgColumn);
        //     }
        // }
        
        
        // Pass the announcement to the view
        $this->view('lost-pet', ['pet' => $pet]);
    }

    // Mark as complete (delete)
    public function markAsComplete($id)
{
    $model = new LostAndFoundModel();
    $data = ['postStatus' => 0]; // Set postStatus to completed

    $success=$model->update($id['id'], $data, 'petid');

    if ($success) {
        header("Location: " . ROOT . "/userprofile/lost_and_found?success=Marked as complete");
    } else {
        header("Location: " . ROOT . "/userprofile/lost_and_found?error=Failed to mark as complete");
    }
}


    
}