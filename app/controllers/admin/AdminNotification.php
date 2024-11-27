<?php

class AdminNotification{
    use Controller;

    public function index(){
        $this->view('admin/notification');
    }
}