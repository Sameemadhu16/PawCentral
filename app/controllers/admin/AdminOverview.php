<?php

class AdminOverview {

    use Controller;

    public function index() {

        $this->view('admin/adminoverview');
    }
}