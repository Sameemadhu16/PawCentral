<?php

class AdoptionPost
{

    use Controller;

    public function index()
    {
  
        $data = [
            'post' => $this->getPostDetails(),
        ];
     
        $this->view('adoptionpost', $data);
    }

    private function getPostDetails()
    {
        if (!isset($_GET['id'])) {
            redirect('findapet'); 
        }


        $id = $_GET['id'];
 
        $postMoldel = new AdoptionPostModel();
        $post = $postMoldel->getPostDetailsById(['pet_id' => $id]);
    
        if (!$post) {
            redirect('findapet'); 
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
           
            'owned_pets' => $_POST['owned_pets'],
            'past_pets' => $_POST['past_pets'],
            'garden_area' => $_POST['garden_area'],
        ];

     
        $adoptionModel->insert($data);

        redirect('findapet'); 
    }

}
