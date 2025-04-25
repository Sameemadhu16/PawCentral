<?php

class PostUpdate{

    use Controller;
    private $valid_roles = ['shelter'];

    public function index()
    {
        $this->isAuthorized($this->valid_roles);

        if (!($_SESSION['user_id'])) {
            redirect('home');
        }

        $updatedData = $this->updatePost();

        $data = [
            'post' => $this->getPostDetails(),
            'update' => $updatedData
        ];

        $this->view('shelter/postupdate',$data);
    }

    private function getPostDetails()
    {
        if (!isset($_GET['id'])) {
            redirect('shelter/post'); // Redirect if no ID is provided
        }


        $id = $_GET['id'];
        // show($id);
        $postMoldel = new AdoptionPostModel();
        $post = $postMoldel->getPostDetailsById(['pet_id' => $id]);
        // show($post);
        if (!$post) {
            redirect('shelter/post'); // Redirect if no donation is found
        }

        return $post[0];
    }

    private function updatePost(){

        $postModel  = new AdoptionPostModel;

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){

            $updateData = [

                    'name' => $_POST['name'],
                    // 'species' => $_POST['species'], // Ensure species is validated
                    // 'breed' => $_POST['breed'],
                    'sex' => $_POST['sex'],
                    'age' => $_POST['age'],
                    'height' => $_POST['height'],
                    'weight' => $_POST['weight'],
                    'pedigree' => $_POST['pedigree'],
                    'neutered' => $_POST['neutered'],
                    'trained' => $_POST['trained'],
                    'vaccinated' => $_POST['vaccinated'],
                    // 'postimg1' => '',
                    // 'postimg2' => '',
                    // 'postimg3' => '',
                    'description' => $_POST['postdesc'] ?? '',
            ];

        $postModel->update($_POST['id'],$updateData,'pet_id');

        }
        // $post = $postModel->update();
    }
}