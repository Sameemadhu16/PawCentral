<?php

class AdminViewAnnouncement{

    use Controller;

    public function index(){
        $this->view('admin/view_announcement');
    }
}