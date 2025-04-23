<?php

class MedicalAppointment
{
    use Model;

    protected $table = 'medical_appointments';

    protected $order_column = 'appointment_id';

    public $errors = [];

    public function getAppointmentsByDate($date)
    {
        return $this->where(['med_id' => $_SESSION['role_id'], 'date' => $date]);
    }
}