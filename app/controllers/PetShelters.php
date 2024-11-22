<?php

class PetShelters {

    use Controller;

    public function index() {

        $this->view('pet-shelters');
    }
}