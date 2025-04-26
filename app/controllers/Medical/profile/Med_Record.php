<?php

class Med_Record{

    use Controller;

    public function ShowPetRecords(){

        if(!($_SESSION['user_id'])){
            redirect('home');
        }
        
        $petid = $_GET['id'] ?? null; // Use null coalescing operator for safety
        if (!$petid) {
            // Handle missing ID error
            echo json_encode(['status' => 'error', 'message' => 'Pet ID is required']);
            exit;
        }

        $model = new RegisterPet();
        $petData = $model->getPet($petid);
        $medicalRecords = $model->getMedicalRecords($petid, $petData->user_id);

        // Prepare the response data
        $responseData = [
            'status' => 'success',
            'pet' => null, // Initialize pet as null
            'medical_records' => $medicalRecords ?: [] // Ensure medical_records is always an array
        ];

        if ($petData) {
            // Process image if pet data exists
            if (isset($petData->petimg)) {
                $petData->petimg = "data:image/jpeg;base64," . base64_encode($petData->petimg);
            } else {
                $petData->petimg = null;
            }
            $responseData['pet'] = $petData;
        } else {
            // Optionally handle the case where the pet is not found, though the JS might handle a null pet
            // $responseData['status'] = 'error';
            // $responseData['message'] = 'Pet not found';
        }
        
        // Set header to indicate JSON response
        header('Content-Type: application/json');
        echo json_encode($responseData);
        exit;    
    }
}