<?php

class FindMedi{
    use Controller;

    public function index() {
        $this->view("medi.f/findMedi");
    }
}