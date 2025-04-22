<?php

class Appointment_Date{
    use Controller;
    private $valid_roles = ['user'];   // Only regular users can access this page
    
    public function index() {
        
        //save the appointment date and time in session
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->save_appointment_datetime();
            // Ensure date and time are set in session before proceeding
            // if (!isset($_SESSION['appointment_date']) || !isset($_SESSION['appointment_time'])) {
            //     $_SESSION['error'] = "Please select appointment date and time first.";
            //     redirect('medical-appointment-date');
            //     return;
            // }
        }


        $veterinarianModel = new Veterinarians();
        $availabilityModel = new VeterinarianAvailability();
        
        // Fetch veterinarians data with their availability
        $vets = $veterinarianModel->findAll();
        
        // Get the currently selected medical provider from session
        $med_id = $_SESSION['selected_med_id'] ?? 1; // Default to 1 if not set
        
        // Filter veterinarians by the selected medical provider
        $vets = array_filter($vets, function($vet) use ($med_id) {
            return $vet->med_id == $med_id;
        });
        
        // Parse availability for each veterinarian
        $availableDays = [];
        $availableTimes = [];
        
        foreach($vets as $vet) {
            $parsedAvailability = $availabilityModel->parseAvailability($vet->availability);
            $availableDays = array_merge($availableDays, $parsedAvailability['days']);
            
            // Store times for each vet
            if(!empty($parsedAvailability['times'])) {
                $availableTimes[] = $parsedAvailability['times'];
            }
        }
        
        // Remove duplicates
        $availableDays = array_unique($availableDays);
        
        // Calculate common available time range across all vets
        $commonTimeRange = $availabilityModel->calculateCommonTimeRange($availableTimes);
        
        $data = [
            'vets' => $vets,
            'availableDays' => $availableDays,
            'timeRange' => $commonTimeRange,
            'med_id' => $med_id,
        ];
        
        // Check if user is a reg user
        if($this->isAuthorized($this->valid_roles)){
            $this->view("medi.f/appointment/appointment-1-date", ['data'=>$data]);
        } else {
            //access denied page
            redirect('403');
        }
    }
    
    public function save_appointment_datetime() {

        $appointment_date = $_POST['appointment_date'] ?? '';
        $appointment_time = $_POST['appointment_time'] ?? '';

        if(empty($appointment_date) || empty($appointment_time)) {
            $_SESSION['error'] = "Please select both date and time for your appointment.";
            redirect('medical-appointment-date');
            exit();
        }

        // Store appointment details in session
        $_SESSION['appointment_date'] = $appointment_date;
        $_SESSION['appointment_time'] = $appointment_time;

        error_log("Appointment Date: " . $_SESSION['appointment_date']);
        error_log("Appointment Time: " . $_SESSION['appointment_time']);
        redirect('medical-appointment-vet');
    }

}