<?php

class MedicalProvModel
{
    use Model;

    protected $table = 'medical_providers';
    protected $order_column = 'med_id';

    protected $allowedColumns = [
        'user_id',
        'med_id',
        'name',
        'img',
        'license_proof',
        'location',
        'contact_no',
        'services',
        'about_us',
        'verifiedStatus'
    ];

    protected $order_column = 'created_at';

    public $errors = [];
}