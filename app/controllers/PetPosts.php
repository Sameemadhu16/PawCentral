<?php

class PetPosts {

    use Controller;

    public function index() {

        $this->view('petposts');
    }
}