<?php

class Appointment_Reason{
    use Controller;
    private $valid_roles = ['user']; // Assuming only users book appointments

    public function index() {
        // Check authorization (example, adjust as needed)
        if (!$this->isAuthorized($this->valid_roles)) {
            redirect('403');
            exit();
        }

        // echo json_encode([
        //     'vet_id' => $_SESSION['appointment_vet_id'] ?? null,
        //     'date' => $_SESSION['appointment_date'] ?? null,
        //     'time' => $_SESSION['appointment_time'] ?? null,
        //     'pet_id' => $_SESSION['appointment_pet_id'] ?? null
        // ]);

        // Check if the form was submitted from the vet selection page
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->saveAppointment();
        }

        $this->view("medi.f/appointment/appointment-4-reason");
    }

    private function saveAppointment(){
        // Get the selected pet ID from the form submission
        $reason = $_POST['appointment_reason'] ?? null;
                // Validate the pet ID
        if (empty($reason)) {
            $_SESSION['error'] = "Please state the reason for the appointment.";
            redirect('medical-appointment-reason');
            exit();
        }
        //get other appointment data from session
        $pet_id = $_SESSION['appointment_pet_id'];
        $owner_id = $_SESSION['user_id'];
        $vet_id= $_SESSION['appointment_vet_id'];
        $med_id = $_SESSION['selected_med_id'];
        $timeslot = $_SESSION['appointment_time'];
        $date= $_SESSION['appointment_date'];

        $appointmentModel = new MedicalAppointment();
        
        // Check for existing appointment with the same date, and timeslot
        $existingAppointment = $appointmentModel->first([
            // 'pet_id' => $pet_id,
            'date' => $date,
            'timeslot' => $timeslot,
            'status' => 'pending'
        ]);
        if(empty($existingAppointment)){
            $existingAppointment = $appointmentModel->first([
                'pet_id' => $pet_id,
                'date' => $date,
                'timeslot' => $timeslot,
                'status' => 'complete'
            ]);
        }
        
        if ($existingAppointment) {
            $_SESSION['appointment_error'] = "An appointment at the same date and time already exists.";
            unset($_SESSION['appointment_vet_id']);
            unset($_SESSION['appointment_date']);
            unset($_SESSION['appointment_time']);
            unset($_SESSION['appointment_pet_id']);
            redirect('medical-appointment-confirmation');
            exit();
        }
        
        // Save the appointment details to the database
        $data = [
            'pet_id' => $pet_id,
            'owner_id' => $owner_id,
            'vet_id' => $vet_id,
            'med_id' => $med_id,
            'timeslot' => $timeslot,
            'date' => $date,
            'reason' => $reason,
        ];

        if ($appointmentModel->insert($data)) {
            // Clear session data after successful insertion
            unset($_SESSION['appointment_vet_id']);
            unset($_SESSION['appointment_date']);
            unset($_SESSION['appointment_time']);
            unset($_SESSION['appointment_pet_id']);

            // Redirect
            $_SESSION['appointment_success'] = "Appointment booked successfully!";
            redirect('medical-appointment-confirmation'); 
            exit();
        } else {
            // Handle insertion error
            $_SESSION['appointment_error'] = "Failed to book appointment. Please try again.";
            unset($_SESSION['appointment_vet_id']);
            unset($_SESSION['appointment_date']);
            unset($_SESSION['appointment_time']);
            unset($_SESSION['appointment_pet_id']);
            // Optionally log the error: error_log(print_r($appointmentModel->errors, true));
            redirect('medical-appointment-confirmation');
            exit();
        }
    }
}