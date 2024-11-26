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
        $data = ['postStatus' => 1]; // Set postStatus to completed

        $success=$model->update($id['id'], $data, 'petid');

        if ($success) {
            header("Location: " . ROOT . "/userprofile/lost_and_found?success=Marked as complete");
        } else {
            header("Location: " . ROOT . "/userprofile/lost_and_found?error=Failed to mark as complete");
        }
    }

    public function createReport()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lostnfoundModel = new LostAndFoundModel();

            // Collect form data
            $data = [
                'id' => 1,
                'petName' => $_POST['petName'],
                'breed' => $_POST['breed'],
                'type' => $_POST['type'],
                'address' => $_POST['address'],
                'location' => $_POST['location'],
                'status' => $_POST['status'],
                'height' => $_POST['height'],
                'sex' => $_POST['sex'],
                'age' => $_POST['age'],
                'health' => $_POST['health'],
                'color' => $_POST['color'],
                'contactNo' => $_POST['contact'],
                'description' => $_POST['description'],
                'img1' => null,
                'img2' => null,
                'img3' => null,
            ];

            // Process uploaded images
            if (isset($_FILES['photos'])) {
                $images = [];
                foreach ($_FILES['photos']['tmp_name'] as $key => $tmpName) {
                    if (!empty($tmpName) && $_FILES['photos']['error'][$key] === UPLOAD_ERR_OK) {
                        $images[] = file_get_contents($tmpName); // Read binary data
                    }
                }
                // Assign images to data array (up to 3 images)
                $data['img1'] = $images[0] ?? null;
                $data['img2'] = $images[1] ?? null;
                $data['img3'] = $images[2] ?? null;
            }

            
            // print($data['user_id']);
            // Insert data and store result
            
            $result = $lostnfoundModel->create($data);

            // Debugging: output result and check if it proceeds to redirect
            if ($result) {

                echo "Data inserted successfully. Redirecting...";

                redirect('userprofile/lost_and_found');
                exit; // Ensure script stops after redirect
            } else {

                echo "Data insertion failed.";

                $data['error'] = 'Failed to create announcement. Please try again.';
                $this->view('userprofile/lost_and_found', $data);
            }
        }
    }

    public function edit($id)
    {
        if (!$id) {
            // Redirect if no ID is provided
            redirect('lostandfound');
        }

        $lostnfoundModel = new LostAndFoundModel();

        // Fetch the announcement using the ID
        $post = $lostnfoundModel->first(['petid' => $id['id']]);
        

        if (!$post) {
            die("Post not found!");
        }

        // Pass post data to the view
        $this->view('user/lost_and_found_update', ['post' => $post]);
    }

    public function updatew($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $lostnfoundModel = new LostAndFoundModel();

            // Collect form data
            $data = [
                'id' => 1,
                'petName' => $_POST['petName'],
                'breed' => $_POST['breed'],
                'type' => $_POST['type'],
                'address' => $_POST['address'],
                'location' => $_POST['location'],
                'status' => $_POST['status'],
                'height' => $_POST['height'],
                'sex' => $_POST['sex'],
                'age' => $_POST['age'],
                'health' => $_POST['health'],
                'color' => $_POST['color'],
                'contactNo' => $_POST['contact'],
                'description' => $_POST['description'],
                'img1' => null,
                'img2' => null,
                'img3' => null,
            ];

            // Handle image uploads
            // Process uploaded images
            if (isset($_FILES['photos'])) {
                $images = [];
                foreach ($_FILES['photos']['tmp_name'] as $key => $tmpName) {
                    if (!empty($tmpName) && $_FILES['photos']['error'][$key] === UPLOAD_ERR_OK) {
                        $images[] = file_get_contents($tmpName); // Read binary data
                    }
                }
                // Assign images to data array (up to 3 images)
                $data['img1'] = $images[0] ?? null;
                $data['img2'] = $images[1] ?? null;
                $data['img3'] = $images[2] ?? null;
            }
            $aid=$id['id'];
            // Update the post
            $success=$lostnfoundModel->update($id['id'], $data, 'petid');

            if ($success) {
                echo "Post updated successfully!";
                echo "$aid";
                // redirect('home');
            } else {
                echo "Failed to update post.";
            }
        }
    }public function update($postId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Prepare the LostAndFoundModel for update
            $lostnfoundModel = new LostAndFoundModel;
    
            // Process form data
            $data = [
                'id'=>1,
                'petName' => $_POST['petName'],
                'breed' => $_POST['breed'],
                'type' => $_POST['type'],
                'address' => $_POST['address'],
                'location' => $_POST['location'],
                'status' => $_POST['status'],
                'height' => $_POST['height'],
                'sex' => $_POST['sex'],
                'age' => $_POST['age'],
                'health' => $_POST['health'],
                'color' => $_POST['color'],
                'contactNo' => $_POST['contact'],
                'description' => $_POST['description'],
                'img1' => isset($_FILES['img1']) && $_FILES['img1']['tmp_name'] 
        ? file_get_contents($_FILES['img1']['tmp_name']) 
        : (isset($_POST['old_img1']) ? base64_decode($_POST['old_img1']) : null),
    'img2' => isset($_FILES['img2']) && $_FILES['img2']['tmp_name'] 
        ? file_get_contents($_FILES['img2']['tmp_name']) 
        : (isset($_POST['old_img2']) ? base64_decode($_POST['old_img2']) : null),
    'img3' => isset($_FILES['img3']) && $_FILES['img3']['tmp_name'] 
        ? file_get_contents($_FILES['img3']['tmp_name']) 
        : (isset($_POST['old_img3']) ? base64_decode($_POST['old_img3']) : null)
            ];
    
            // Perform the update operation
            $result = $lostnfoundModel->update($postId['id'], $data,'petid');
    
            // Redirect or provide feedback
            if ($result) {
                redirect('home');
                echo 'asdsad';
            } else {
                echo "Failed to update the post.";
            }
        }
    }
    


}