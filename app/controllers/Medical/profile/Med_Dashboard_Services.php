<?php

class Med_Dashboard_Services{
    use Controller;

    public function index() {
        $this->view("medi.f/profile/med-services");
    }
}