<?php

class AdminPostInfo 
{
    use Controller;
    public function index()
    {
        $this->view('admin/post_info');
    }
}