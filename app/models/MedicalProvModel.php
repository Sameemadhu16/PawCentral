<?php

class MedicalProvModel
{
    use Model;

    protected $table = 'medical_providers';

    protected $allowedColumns = ['user_id', 'med_id', 'location', 'about', 'service_name', 'status'];

    protected $order_column = 'created_at';

    public $errors = [];
}