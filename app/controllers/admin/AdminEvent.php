<?php

class AdminEvent{

    use Controller;

    public function index(){
        $this->view('admin/event');
    }
}