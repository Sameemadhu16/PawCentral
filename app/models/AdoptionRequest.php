<?php

class AdoptionRequest{

    use Model;

    protected $table = 'adoption_requests';
    protected $order_column = 'created_at';

    public $errors = [];

    public function getAdoptionRequests($id){

        $query = "select ap.pet_id,ar.id, ar.approved, ap.status, ar.adoptor_name, ar.contact_no,ar.residence , ap.name,ap.postimg1 , ar.garden_area, ar.owned_pets, ar.past_pets from adoption_requests ar join adoption_posts ap ON ar.adoption_postid = ap.pet_id WHERE ap.shelter_id = :id ";
        $params = [':id' => $id];

        return $this->query($query, $params);

    }

    
}