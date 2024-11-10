<?php

class SignUp {
    use Controller;

    public function index() {
        $this->view("signupLogin.f/signup");
    }
}