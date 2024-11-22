<?php

class AdminAddAnnouncement {

    use Controller;

    public function index() {

        $this->view('admin/add_announcement');
    }
}