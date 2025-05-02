<?php

class AdoptionPost
{

    use Controller;

    public function index()
    {
        // if (!($_SESSION['user_id'])) {
        //     redirect('home');
        // }
        $data = [
            'post' => $this->getPostDetails(),
        ];
        // show($data);
        $this->view('adoptionpost', $data);
    }

    private function getPostDetails()
    {
        if (!isset($_GET['id'])) {
            redirect('findapet'); // Redirect if no ID is provided
        }


        $id = $_GET['id'];
        // show($id);
        $postMoldel = new AdoptionPostModel();
        $post = $postMoldel->getPostDetailsById(['pet_id' => $id]);
        // show($post);
        if (!$post) {
            redirect('findapet'); // Redirect if no donation is found
        }

        return $post[0];
    }

    public function AddAdoptionRequest(){

        $adoptionModel = new AdoptionRequest;

        $id = $_GET['id'];

        $data =[
            'adoptor_name' => $_POST['name'],
            'adoptor_id' => $_SESSION['user_id'],
            'contact_no' => $_POST['contact_no'],
            'residence' => $_POST['residence'],
            'adoption_postid' => $id,
            // 'adoptor_name' => $_POST['adoptor_name'],
            'owned_pets' => $_POST['owned_pets'],
            'past_pets' => $_POST['past_pets'],
            'garden_area' => $_POST['garden_area'],
        ];

        // show($data);
        $adoptionModel->insert($data);

        redirect('findapet'); // Redirect to avoid resubmission
    }

}
