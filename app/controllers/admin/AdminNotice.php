<?php

class AdminNotice{
    use Controller;

    public function index(){

        $this->view("admin/notice");
    }
}