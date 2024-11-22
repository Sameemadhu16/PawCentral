<?php

class AdminAnnouncement {

    use Controller;

    public function index() {

        $this->view('admin/announcement');
    }
}