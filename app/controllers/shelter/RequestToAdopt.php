<?php

class RequestToAdopt{
    use Controller;

    public function index(){
        $this->view('shelter/requests_to_adopt');
    }
}