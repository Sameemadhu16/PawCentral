<?php

class MedicalAppointment
{
    use Model;

    protected $table = 'medical_appointments';
    protected $order_column = 'timeslot';
    protected $order_type = 'asc';

    public $errors = [];

    /**
     * Get appointments for a specific date
     */
    public function getAppointmentsByDate($providerId, $date)
    {
        $appointments = $this->get([
            'date' => $date,
            'med_id' => $providerId
        ]);
        return $appointments;
    }

    public function getAppointmentById($id)
    {
        $appointment = $this->first(['appointment_id' => $id]);
        if (!$appointment) {
            error_log("No appointment found with ID: " . $id);
        }
        return $appointment;
    }
}