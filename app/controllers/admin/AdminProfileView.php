<?php

class AdminProfileView{
    use Controller;

    public function index(){
        $this->view('admin/profile_view');
    }
}