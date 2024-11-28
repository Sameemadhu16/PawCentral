<?php

class Med_Dashboard_Appointments{
    use Controller;

    public function index() {
        $this->view("medi.f/profile/med-appointments");
    }
}