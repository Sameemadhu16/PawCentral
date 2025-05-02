<?php

class AdminPostInfo 
{
    use Controller;
    private $valid_roles = ['admin'];

    public function index()
    {
        $this->isAuthorized($this->valid_roles);
        $this->view('admin/post_info');
    }
}