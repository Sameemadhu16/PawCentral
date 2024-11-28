<?php

class Appointment_Pet{
    use Controller;

    public function index() {
        $this->view("medi.f/appointment-selectpet");
    }
}