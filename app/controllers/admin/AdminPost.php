<?php

class AdminPost{
     use Controller;
   private $valid_roles = ['admin'];

   public function index()
   {
      $this->isAuthorized($this->valid_roles);
        $this->view('admin/post');
     }
}