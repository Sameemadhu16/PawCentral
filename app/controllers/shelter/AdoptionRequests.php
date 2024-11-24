<?php

class AdoptionRequests{

    use Controller;

    public function index(){
        $this->view('shelter/adoption_requests');
    }
}