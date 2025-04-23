<?php

class Med_Dashboard_Appointments{
    use Controller;

    public function index() {
        $appointmentModel=new MedicalAppointment();
        $appointments=$appointmentModel->where(['med_id' => $_SESSION['role_id']]);
        $today = date('Y-m-d');
        $todayCount=count($appointmentModel->getAppointmentsByDate($today));
        $upcomingCount=count($appointmentModel->getAppointmentsByDate(date('Y-m-d', strtotime('+1 day'))));
        
        
        $this->view("medi.f/profile/med-appointments", [
            'todayCount' => $todayCount,
            'upcomingCount' => $upcomingCount,
            'appointments' => $appointments
        ]);
        
        $this->view("medi.f/profile/med-appointments");
    }

    public function appointmentsByDate() {
        // Check if date parameter is provided
        if (!isset($_GET['date'])) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Date parameter is required'
            ]);
            return;
        }

        $date = $_GET['date'];
        
        // Validate date format (YYYY-MM-DD)
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid date format. Use YYYY-MM-DD'
            ]);
            return;
        }
        
        // Get appointments for the specified date
        $appointmentsModel = new MedicalAppointment();
        $appointments = $appointmentsModel->getAppointmentsByDate($this->$_SESSION['role_id'], $date);
        
        echo json_encode([
            'status' => 'success',
            'appointments' => $appointments
        ]);
    }
}