<?php

class Appointment_Pet{
    use Controller;
    private $valid_roles = ['user']; // Assuming only users book appointments

    public function index() {

        // Check authorization (example, adjust as needed)
        if (!$this->isAuthorized($this->valid_roles)) {
            redirect('403');
            exit();
        }

        // debug
        // echo json_encode([
        //     'vet_id' => $_SESSION['appointment_vet_id'] ?? null,
        //     'date' => $_SESSION['appointment_date'] ?? null,
        //     'time' => $_SESSION['appointment_time'] ?? null
        // ]);

        // Check if the form was submitted from the vet selection page
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->saveAppointmentPet();
        }

        
        // Load the view for selecting the pet
        // Initialize the model
        $model = new RegisterPet();

        // Retrieve all pets
        $pets['pets'] = $model->getRegPets();

        // Process images: convert binary `img1` data to Base64-encoded string
        foreach ($pets['pets'] as $pet) {
            if (isset($pet->petimg)) {
                $pet->petimg = "data:image/jpeg;base64," . base64_encode($pet->petimg); // Adjust MIME type if not JPEG
            }else{
                $pet->petimg = null;
            }

        }
        //calculate age
        foreach ($pets['pets'] as $pet) {
            if (isset($pet->birth_date)) {
                $birthDate = new DateTime($pet->birth_date);
                $currentDate = new DateTime();
                $age = $currentDate->diff($birthDate)->y; // Get the age in years
                $pet->age = $age;
            }else{
                $pet->age = null;
            }
        }
        $this->view("medi.f/appointment/appointment-3-selectPet",$pets);
    }

    private function saveAppointmentPet(){
        // Get the selected pet ID from the form submission
        $pet_id = $_POST['pet_id'] ?? null;

        // Validate the pet ID
        if (empty($pet_id)) {
            $_SESSION['error'] = "Please select a pet for your appointment.";
            redirect('medical-appointment-pet');
            exit();
        }

        // Save the pet ID in the session for later use
        $_SESSION['appointment_pet_id'] = $pet_id;

        // Redirect to the confirmation page or next step
        redirect('medical-appointment-reason');
    }
}