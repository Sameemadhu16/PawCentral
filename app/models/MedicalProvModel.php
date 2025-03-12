<?php

class MedicalProvModel
{
    use Model;

    protected $table = 'medical_providers';

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

    public $errors = [];
}