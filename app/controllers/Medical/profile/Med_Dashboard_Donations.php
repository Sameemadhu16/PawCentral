<?php

class Med_Dashboard_Donations{
    use Controller;

    public function index() {
        $this->view("medi.f/profile/med-donations");
    }
}