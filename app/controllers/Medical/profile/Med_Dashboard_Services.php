<?php

class Med_Dashboard_Services{
    use Controller;

    public function index() {
        $med_prov_med_serv = new Med_Prov_Med_Serv;
        $med_servicesModel = new Med_Services;

        // Handle DELETE request
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            header('Content-Type: application/json');
            $id = $_GET['id'] ?? null;
            if (!$id) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
                return;
            }
            $this->delete($med_prov_med_serv, $id);
            return;
        }

        // Handle POST request (for service submission)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->submit($med_prov_med_serv, $_SESSION['role_id']);
            return;
        }

        // For GET requests, render the view
        $all_services = $med_servicesModel->findAll();
        // Get service IDs
        $service_ids = $med_prov_med_serv->where(['med_id' => $_SESSION['role_id']]);
        // Get service names
        $services = [];
        if ($service_ids) {
            foreach ($service_ids as $service) {
                $service_details = $med_servicesModel->first(['service_id' => $service->service_id]);
                // Combine the service ID with the service name
                $service->service_name = $service_details->service_name;
                $services[] = $service;
            }
        }
        
        $this->view("medi.f/profile/med-services", ['services' => $services, 'all_services' => $all_services]);
    }

    private function delete($med_prov_med_serv, $id) {
        $result = $med_prov_med_serv->delete($id, 'service_id');
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Service deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete service']);
        }
    }

    // Update this method to handle multiple services
    private function submit($med_prov_med_serv, $id) {
        header('Content-Type: application/json');
        try {
            // Validate that services array exists
            if (!isset($_POST['services']) || !is_array($_POST['services'])) {
                throw new Exception('No services selected');
            }
            
            // Log selected services for debugging
            error_log("Selected services: " . print_r($_POST['services'], true));
            
            $successCount = 0;
            $errorCount = 0;
            
            // Process each selected service
            foreach ($_POST['services'] as $service_id) {
                $data = [
                    'med_id' => $id,
                    'service_id' => $service_id,
                ];
                
                // Check if this service already exists for this provider
                $exists = $med_prov_med_serv->first([
                    'med_id' => $id,
                    'service_id' => $service_id
                ]);
                
                if ($exists) {
                    $errorCount++;
                    error_log("The service with ID $service_id already exists for this provider.");
                    continue; // Skip this one, already exists
                }
                
                $result = $med_prov_med_serv->create($data);
                if ($result) {
                    $successCount++;
                } else {
                    $errorCount++;
                }
            }
            
            if ($successCount > 0) {
                echo json_encode([
                    'status' => 'success', 
                    'message' => "$successCount services added successfully" . 
                                ($errorCount > 0 ? " ($errorCount failed, possibly already added)" : "")
                ]);
            } else {
                throw new Exception('No services were added. They may already exist for your profile.');
            }

        } catch (Exception $e) {
            error_log("Error adding services: " . $e->getMessage());
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}