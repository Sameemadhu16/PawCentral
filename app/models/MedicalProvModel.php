<?php

class MedicalProvModel
{
    use Model;

    protected $table = 'medical_providers';

    protected $allowedColumns = [
        'medi_id', // added 'user_id'
        'updated_at',
        'verifiedStatus',
    ];

    protected $order_column = "med_id";
    public $errors = [];

}