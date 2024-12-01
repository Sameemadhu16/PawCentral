<?php

class Mypets{

    use Controller;

    public function index(){
        $this->view('user/mypets');
    }

    public function index2(){
        $this->view('user/selectedPet');
    }

}