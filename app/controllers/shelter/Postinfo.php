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
    
            // foreach ($data['post'] as $post) {
            //     if (isset($post->postimg1) || isset($post->postimg2) || isset($post->postimg3)) {
            //         $post->postimg1 = "data:image/jpeg;base64," . base64_encode($post->postimg1);
            //         $post->postimg2 = "data:image/jpeg;base64," . base64_encode($post->postimg2);
            //         $post->postimg3 = "data:image/jpeg;base64," . base64_encode($post->postimg3);
            //     } else {
            //         $post->postimg1 = null;
            //         $post->postimg2 = null;
            //         $post->postimg3 = null;
            //     }
            // }
    
            if ($_SERVER['REQUEST_METHOD'] && isset($_POST['deletepost'])) {
                $this->DeletePost();
                redirect('shelter/post');
            }
            // show($data);
            $this->view('shelter/postinfo', $data);
        } else {
            //access denied page
            redirect('403');
        }
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
