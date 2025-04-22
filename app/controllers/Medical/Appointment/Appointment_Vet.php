<?php

class Appointment_Vet{
    use Controller;
    private $valid_roles = ['user'];   // Only regular users can access this page

    public function index() {

        // Handle form submission first
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->save_appointment_vet();
        }

        // Check if user is authorized first
        if(!$this->isAuthorized($this->valid_roles)){
             //access denied page
             redirect('403');
             exit();
        }

        $med_id = $_SESSION['selected_med_id'] ?? null;
        $appointment_date = $_SESSION['appointment_date'] ?? null;
        $appointment_time = $_SESSION['appointment_time'] ?? null;

        // Check if necessary session variables are set
        if (!$med_id || !$appointment_date || !$appointment_time) {
            // Redirect back to date selection or show an error if prerequisites are missing
            $_SESSION['error'] = "Please select a date and time first.";
            redirect('medical-appointment-date');
            exit();
        }

        // Load veterinarians for this medical center
        $veterinariansModel = new Veterinarians();
        $availabilityModel = new VeterinarianAvailability();

        //convert date in to a day of week
        $dayOfWeek = date('1', strtotime($_SESSION['appointment_date']));
        //get only the hour of the appointment time in 24 hour format
        $timeIn24 = (int)date('H', strtotime($_SESSION['appointment_time']));
        echo json_encode(['status' => 'success', 'dayOfWeek' => $dayOfWeek, 'timeIn24' => $timeIn24]);
       
        $availableVets=$availabilityModel->getAvailableVeterinariansForDay($med_id, $dayOfWeek, $timeIn24);
        

        // Display the view for GET requests
        $this->view("medi.f/appointment/appointment-2-selectVet", ['availableVets' => $availableVets]);

    }

    public function save_appointment_vet() {

        $appointment_vet_id = $_POST['vet_id'] ?? '';

        if(empty($appointment_vet_id)) {
            $_SESSION['error'] = "Please select a veterinarian for your appointment.";
            redirect('medical-appointment-vet');
            exit();
        }

        // Store appointment details in session
        $_SESSION['appointment_vet_id'] = $appointment_vet_id;

        // Redirect to the next page
        redirect('medical-appointment-pet');
        exit();
    }


}