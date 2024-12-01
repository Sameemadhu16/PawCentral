<?php

class AdminReport{

    use Controller;

    public function index(){
        $this->view('admin/report');
    }
}