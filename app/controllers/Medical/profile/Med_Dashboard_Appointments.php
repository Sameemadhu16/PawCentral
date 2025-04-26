<?php

class Med_Dashboard_Appointments{
    use Controller;

    public function index() {
        if(!($_SESSION['role_id'])){
            redirect('home');
        }
        $appointmentModel = new MedicalAppointment();
        $med_id = $_SESSION['role_id'];
        $appointments = $appointmentModel->where(['med_id' => $med_id]);
        $today = date('Y-m-d');
        
        // Pass the provider ID (role_id) along with the date
        $todayCount = count($appointmentModel->getAppointmentsByDate($med_id, $today));
        $upcomingCount = count($appointmentModel->getAppointmentsByDate($med_id, date('Y-m-d', strtotime('+1 day'))));
        
        $this->view("medi.f/profile/med-appointments", [
            'todayCount' => $todayCount,
            'upcomingCount' => $upcomingCount,
            'appointments' => $appointments
        ]);
    }

    public function appointmentsByDate() {
        // Make sure to send headers first to avoid any output before JSON
        header('Content-Type: application/json');
        
        try {
            // Check if date parameter is provided
            if (!isset($_GET['date'])) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Date parameter is required'
                ]);
                exit();
            }

            $date = $_GET['date'];
            
            // Validate date format (YYYY-MM-DD)
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid date format. Use YYYY-MM-DD'
                ]);
                exit();
            }
            
            // Ensure role_id exists in session
            if (!isset($_SESSION['role_id'])) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'User not authenticated properly'
                ]);
                exit();
            }

            // Use the improved getAppointmentsByDate method
            $appointmentsModel = new MedicalAppointment();
            $appointments = $appointmentsModel->getAppointmentsByDate($_SESSION['role_id'], $date);
            //get pet name
            $petModel= new RegisterPet();
            foreach ($appointments as $appointment) {
                $pet = $petModel->first(['pet_id' => $appointment->pet_id]);
                $appointment->pet_name = $pet->name;
            }
            //get owner name
            $ownerModel= new User();
            foreach ($appointments as $appointment) {
                $owner = $ownerModel->first(['id' => $appointment->owner_id]);
                $appointment->owner_name = $owner->first_name . ' ' . $owner->last_name;
            }
            //get vet name
            $vetModel= new Veterinarians();
            foreach ($appointments as $appointment) {
                $vet = $vetModel->first(['vet_id' => $appointment->vet_id]);
                $appointment->vet_name = $vet->name;
            }
            
            echo json_encode([
                'status' => 'success',
                'appointments' => $appointments
            ]);
        } catch (Exception $e) {
            // Log error for debugging
            error_log('Error in appointmentsByDate: ' . $e->getMessage());
            
            echo json_encode([
                'status' => 'error',
                'message' => 'Error fetching appointments: ' . $e->getMessage()
            ]);
        }
        
        exit();
    }

    //update status of appointment to success
    public function completeStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            // Read JSON input from request body or fallback to POST form data
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? $_POST['id'] ?? null;

            if (!$id) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
                return;
            }
            $appointmentModel = new MedicalAppointment();
            $updated = $appointmentModel->update($id, ['status' => 'complete'], 'appointment_id'); 

            if ($updated) {
                    // return a success message
                    http_response_code(200); // OK
                    print_r($updated);
                    exit();
                 echo json_encode(['status' => 'success', 'message' => 'Appointment marked as complete']);
            } else {
                 http_response_code(500); // Internal Server Error
                 echo json_encode(['status' => 'error', 'message' => 'Failed to update appointment status']);
            }
            exit();
        }
         // Handle non-POST requests if necessary, e.g., return 405 Method Not Allowed
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
        exit();
    }
    //update status of appointment to cancel
    public function cancelStatus() { // Removed $id parameter from signature
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            // Read JSON input from request body or fallback to POST form data
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? $_POST['id'] ?? null;

            if (!$id) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
                return;
            }
            $appointmentModel = new MedicalAppointment();
            $updated = $appointmentModel->update($id, ['status' => 'cancel'], 'appointment_id');

            if ($updated) {
                 echo json_encode(['status' => 'success', 'message' => 'Appointment marked as canceled']);
            } else {
                 http_response_code(500);
                 echo json_encode(['status' => 'error', 'message' => 'Failed to update appointment status']);
            }
            // redirect('medical-center/dashboard/appointments'); // Consider removing redirect
            exit();
        }
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
        exit();
    }
    //update status of appointment to pending
    public function pendingStatus() { // Removed $id parameter from signature
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            // Read JSON input from request body or fallback to POST form data
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? $_POST['id'] ?? null;

            if (!$id) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
                return;
            }
            $appointmentModel = new MedicalAppointment();
            $updated = $appointmentModel->update($id, ['status' => 'pending'], 'appointment_id');

            if ($updated) {
                 echo json_encode(['status' => 'success', 'message' => 'Appointment status reverted to pending']);
            } else {
                 http_response_code(500);
                 echo json_encode(['status' => 'error', 'message' => 'Failed to update appointment status']);
            }
            exit();
        }
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
        exit();
    }
}