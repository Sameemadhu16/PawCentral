<?php

class AdoptionRequest{

    use Model;

    protected $table = 'adoption_requests';
    protected $order_column = 'created_at';

    public $errors = [];
}