<?php

class Postinfo{

    use Controller;
    private $valid_roles = ['shelter'];

    public function index()
    {
        if($this->isAuthorized($this->valid_roles)){
            if (!($_SESSION['user_id'])) {
                redirect('home');
            }
            $data = [
                'post' => $this->getPostDetails(),
            ];
    
            
    
            if ($_SERVER['REQUEST_METHOD'] && isset($_POST['deletepost'])) {
                $this->DeletePost();
                redirect('shelter/post');
            }
            $this->view('shelter/postinfo', $data);
        } else {
            redirect('403');
        }
    }

    private function getPostDetails()
    {
        if (!isset($_GET['id'])) {
        }


        $id = $_GET['id'];
        $postMoldel= new AdoptionPostModel();
        $post = $postMoldel->getPostDetailsById(['pet_id' => $id]);
        if (!$post) {
            redirect('shelter/post');
        }

        return $post[0];
    }

    private function DeletePost(){

        $postModel = new AdoptionPostModel;
        $postModel->update($_POST['pet_id'], ['is_deleted' => 1],'pet_id');

    }


}
