<?php

class PostUpdate{

    use Controller;
    private $valid_roles = ['shelter'];

    public function index()
    {
        if($this->isAuthorized($this->valid_roles)){

            if (!($_SESSION['user_id'])) {
                redirect('home');
            }
    
            $updatedData = $this->updatePost();
    
            $data = [
                'post' => $this->getPostDetails(),
                'update' => $updatedData
            ];
    
            $this->view('shelter/postupdate',$data);

        } else {
            redirect('403');
        }

    }

    private function getPostDetails()
    {
        if (!isset($_GET['id'])) {
            redirect('shelter/post'); 
        }


        $id = $_GET['id'];
        $postMoldel = new AdoptionPostModel();
        $post = $postMoldel->getPostDetailsById(['pet_id' => $id]);
        if (!$post) {
            redirect('shelter/post'); 
        }

        return $post[0];
    }

    private function updatePost(){

        $postModel  = new AdoptionPostModel;

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){

            $updateData = [

                    'name' => $_POST['name'],
                    'sex' => $_POST['sex'],
                    'age' => $_POST['age'],
                    'height' => $_POST['height'],
                    'weight' => $_POST['weight'],
                    'pedigree' => $_POST['pedigree'],
                    'neutered' => $_POST['neutered'],
                    'trained' => $_POST['trained'],
                    'vaccinated' => $_POST['vaccinated'],
                    'description' => $_POST['postdesc'] ?? '',
            ];

        $postModel->update($_POST['id'],$updateData,'pet_id');

        }
    }
}