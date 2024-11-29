<?php

class Med_Dashboard_Events{
    use Controller;

    public function index() {
        $this->view("medi.f/profile/med-events");
    }
}