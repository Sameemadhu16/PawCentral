<?php

class RequestToAdopt{
    use Controller;

    public function index(){

        // show($_SESSION['role_id'] );

        $data = [
            'adoptionRequests' => $this->getAdoptionRequestsByShelter(),

        ];

        
        
       

        $this->view('shelter/requests_to_adopt',$data);
    }

    private function getAdoptionRequestsByShelter()
    {
        $adoptionModel = new AdoptionRequest;
        $id = $_SESSION['role_id']; // Retrieve shelter ID from session

        $adoptionRequests = $adoptionModel->getAdoptionRequests($id); // Retrieve shelter ID from session  

        if (!$adoptionRequests) {
            redirect('shelter/requests_to_adopt'); // Redirect if no requests are found
        }

        return $adoptionRequests;
    }
}