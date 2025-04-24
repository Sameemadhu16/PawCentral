<?php

class Postinfo{

    use Controller;

    public function index(){
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
        // show($data);
        $this->view('shelter/postinfo', $data);
    }

    private function getPostDetails()
    {
        if (!isset($_GET['id'])) {
            // redirect('shelter/post'); // Redirect if no ID is provided
        }


        $id = $_GET['id'];
        // show($id);
        $postMoldel= new AdoptionPostModel();
        $post = $postMoldel->getPostDetailsById(['pet_id' => $id]);
        // show($post);
        if (!$post) {
            redirect('shelter/post'); // Redirect if no donation is found
        }

        return $post[0];
    }

    private function DeletePost(){

        $postModel = new AdoptionPostModel;
        $postModel->update($_POST['pet_id'], ['is_deleted' => 1],'pet_id');

    }


}
