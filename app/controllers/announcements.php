<?php

class Announcements {

    use Controller;

    public function index() {

        $this->view('announcements');
    }
}