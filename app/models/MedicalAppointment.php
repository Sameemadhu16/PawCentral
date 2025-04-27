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

    public function getAppointmentsAhead($providerId, $date)
    {
        $query = "SELECT * FROM {$this->table} WHERE date > :date AND med_id = :med_id ORDER BY date ASC, timeslot ASC";
        $params = [
            'date' => $date,
            'med_id' => $providerId
        ];
        // $appointmentsCount = $this->query($query, $params)[0]['Count(*)'];
        $appointments = $this->query($query, $params);
        return $appointments;
    }
}