<?php

class AdminEditAnnouncement{
    use Controller;

    public function index() {

        $this->view('admin/edit_announcement');
    }
}