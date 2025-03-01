<?php

class MedicalProvModel
{
    use Model;

    protected $table = 'medical_providers';

    protected $allowedColumns = [
        'med_id',
        'user_id',
        'name',
        'location',
        'license_proof',
        'verifiedStatus',
        'created_at',
        'updated_at'
    ];

    protected $order_column = "med_id";
    public $errors = [];

}