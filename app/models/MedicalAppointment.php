<?php

class MedicalAppointment
{
    use Model;

    protected $table = 'medical_appointments';

    protected $order_column = 'created_at';

    public $errors = [];
}