<?php

class RequestToAdopt{
    use Controller;
    private $valid_roles = ['shelter'];

    public function index()
    {
        if($this->isAuthorized($this->valid_roles)){
            
                    $A=$this->getAdoptionRequestsByShelter();
                    $this->acceptAdoptionRequest();
                    $this->rejectAdoptionRequest();
            
                    foreach ($A as $B) {
                        if (isset($B->postimg1) && !empty($B->postimg1)) {
                            $B->postimg1 = "data:image/jpeg;base64," . base64_encode($B->postimg1);
                        } else {
                            $B->postimg1 = ROOT . "/assets/images/default-placeholder.png"; 
                        }
                    }
            
                    $data = [
                        'adoptionRequests' => $A,
                        
                    ];
            
            
                    $this->view('shelter/requests_to_adopt',$data);


        } else {
            redirect('403');
        }
    }

    private function getAdoptionRequestsByShelter()
    {
        $adoptionModel = new AdoptionRequest;
        $id = $_SESSION['role_id']; 

        $adoptionRequests = $adoptionModel->getAdoptionRequests($id); 

        if (!$adoptionRequests) {
        }

        return $adoptionRequests;
    }

    private function acceptAdoptionRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve'])) {

            $adoptionModel = new AdoptionRequest;
            $postModel = new AdoptionPostModel;
            $notificModel = new NotificationsModel;

            $postModel->update($_POST['pet_id'], ['status' => 1], 'pet_id'); 
            $adoptionModel->update($_POST['id'], ['approved' => 1], 'id');   

            $notificModel->sendNotification($_POST['user_id'], "Adoption Request Accepted", 'Adoption of ' . $_POST['pet_name'] . ' by pet shelter');

            $pet_id = $_POST['pet_id'];
            $approved_request_id = $_POST['id'];

            $query = "SELECT * FROM adoption_requests WHERE adoption_postid = ? AND id != ?";
            $data = [$pet_id, $approved_request_id];
            $rejectedRequests = $adoptionModel->query($query, $data);

            if (!empty($rejectedRequests)) {
                foreach ($rejectedRequests as $request) {
                    $adoptor_id = $request->adoptor_id; 

                    $notificModel->sendNotification($adoptor_id, "Adoption Request Rejected", 'Sorry, adoption of ' . $_POST['pet_name'] . ' has been accepted by another adopter.');

                    $adoptionModel->update($request->id, ['approved' => 2], 'id'); 
                }
            }

            redirect('shelter/requests_to_adopt'); 
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