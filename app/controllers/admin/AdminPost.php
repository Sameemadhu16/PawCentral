<?php

class AdminPost{
     use Controller;

     public function index(){
        $this->view('admin/post');
     }
}