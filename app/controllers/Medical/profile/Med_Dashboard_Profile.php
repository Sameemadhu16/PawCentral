<?php

class Med_Dashboard_Profile{
    use Controller;

    public function index() {
        $this->view("medi.f/profile/med-profile");
    }
}