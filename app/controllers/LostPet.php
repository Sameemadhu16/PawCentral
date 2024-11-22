<?php

class LostPet {

    use Controller;

    public function index() {

        $this->view('lost-pet');
    }
}