<?php

class RequestToAdopt{
    use Controller;
    private $valid_roles = ['shelter'];

    public function index()
    {
        $this->isAuthorized($this->valid_roles);

        $A=$this->getAdoptionRequestsByShelter();
        $this->acceptAdoptionRequest();
        $this->rejectAdoptionRequest();

        foreach ($A as $B) {
            if (isset($B->postimg1) && !empty($B->postimg1)) {
                $B->postimg1 = "data:image/jpeg;base64," . base64_encode($B->postimg1); // Adjust MIME type if not JPEG
            } else {
                $B->postimg1 = ROOT . "/assets/images/default-placeholder.png"; // Fallback image
            }
        }

        $data = [
            'adoptionRequests' => $A,
            
        ];


        $this->view('shelter/requests_to_adopt',$data);
    }

    private function getAdoptionRequestsByShelter()
    {
        $adoptionModel = new AdoptionRequest;
        $id = $_SESSION['role_id']; // Retrieve shelter ID from session

        $adoptionRequests = $adoptionModel->getAdoptionRequests($id); // Retrieve shelter ID from session  

        if (!$adoptionRequests) {
            // redirect('shelter/requests_to_adopt'); // Redirect if no requests are found
        }

        return $adoptionRequests;
    }

    private function acceptAdoptionRequest(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve'])) {

            $adoptionModel = new AdoptionRequest;
            $postModel = new AdoptionPostModel;
            $notificModel =new NotificationsModel;
            
            $postModel->update($_POST['pet_id'], ['status' => 1],'pet_id'); // Update the status to accepted (1)
            // show($_POST['pet_id']);
            // show($_POST['id']);
            $adoptionModel->update($_POST['id'], ['approved' => 1],'id'); // Update the status to accepted (1)
            $notificModel->sendNotification($_POST['user_id'],"Adoption Request Accepted",'Adoption of '.$_POST['pet_name'].' by pet shelter');
            redirect('shelter/requests_to_adopt'); // Redirect after processing
        }
    }

    private function rejectAdoptionRequest() {

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reject'])){

            $adoptionModel = new AdoptionRequest;
            $adoptionModel->update($_POST['id'], ['approved' => 2], 'id');
            redirect('shelter/requests_to_adopt');
        }

        
    }
}