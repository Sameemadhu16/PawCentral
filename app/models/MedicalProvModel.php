<?php

class MedicalProvModel
{
    use Model;

    protected $table = 'medical_providers';

    protected $order_column = "med_id";
    public $errors = [];

}