<?php

class SignUpNext {
    use Controller;

    public function index() {
        $this->view("signupLogin.f/signupNext");
    }
}