<?php

class Appointment_Reason{
    use Controller;

    public function index() {
        $this->view("medi.f/appointment-reason");
    }
}