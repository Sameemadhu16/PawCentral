<?php

class Post
{
    use Controller;
    private $valid_roles = ['shelter'];

    public function index()
    {
        if($this->isAuthorized($this->valid_roles)){

            if (!($_SESSION['user_id'])) {
                redirect('home');
            }
    
            $postModel = new AdoptionPostModel;
    
            $posts['posts'] = $postModel->getUserPosts();
    
            foreach ($posts['posts'] as $post) {
                if (isset($post->postimg1)){
                    $post->postimg1 = "data:image/jpeg;base64," . base64_encode($post->postimg1);
                    $post->postimg2 = "data:image/jpeg;base64," . base64_encode($post->postimg2);
                    $post->postimg3 = "data:image/jpeg;base64," . base64_encode($post->postimg3);
                }else{
                    $post->postimg1 = null;
                    $post->postimg2 = null;
                    $post->postimg3 = null;
                }
            }
    
            $this->view('shelter/post', $posts);

        } else {
            redirect('403');
        }
    }


    public function NewPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postModel = new AdoptionPostModel;

            $allowedSpecies = ['Cat', 'Dog', 'Other']; 
            $species = in_array($_POST['species'], $allowedSpecies) ? $_POST['species'] : 'Other';

            $data = [
                'shelter_id' => $_SESSION['role_id'],
                'name' => $_POST['name'],
                'species' => $species, 
                'breed' => $_POST['breed'],
                'sex' => $_POST['sex'],
                'age' => $_POST['age'],
                'height' => $_POST['height'],
                'weight' => $_POST['weight'],
                'pedigree' => $_POST['pedigree'],
                'neutered' => $_POST['neutered'],
                'trained' => $_POST['trained'],
                'vaccinated' => $_POST['vaccinated'],
                'postimg1' => null,
                'postimg2' => null,
                'postimg3' => null,
                'description' => $_POST['postdesc'] ?? '',
            ];

            if (isset($_FILES['photos'])) {
                $images = [];
                foreach ($_FILES['photos']['tmp_name'] as $key => $tmpName) {
                    if (!empty($tmpName) && $_FILES['photos']['error'][$key] === UPLOAD_ERR_OK) {
                        $images[] = file_get_contents($tmpName);
                    }
                }
                $data['postimg1'] = $images[0] ?? null;
                $data['postimg2'] = $images[1] ?? null;
                $data['postimg3'] = $images[2] ?? null;
            }
            $result = $postModel->addPost($data);
            if ($result) {
                echo "Data inserted successfully. Redirecting...";
                redirect('shelter/post');
                exit;
            } else {
                echo "Data insertion failed.";
                $data['error'] = 'Failed to register pet. Please try again.';
                $this->view('shelter/post', $data);
            }
        }
    }
}
