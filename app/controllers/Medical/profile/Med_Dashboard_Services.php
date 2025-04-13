<?php

class Med_Dashboard_Services{
    use Controller;

    public function index() {

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            header('Content-Type: application/json');
            $med_servicesModel = new Med_Prov_Med_Serv;
            $id = $_GET['id'] ?? null;
            if (!$id) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
                return;
            }
            $this->delete($med_servicesModel, $id);
            return;
        }

        $med_prov_med_serv = new Med_Prov_Med_Serv;
        $med_servicesModel = new Med_Services;
        
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

    private function delete($med_servicesModel, $id) {
        $result = $med_servicesModel->delete($id, 'service_id');
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Service deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete service']);
        }
    }

    private function submit($veterinarianModel) {
        try {
            // Base paths for images
            $rootUrl='http://localhost/PawCentral/public/assets/';
            $baseUploadPath = $_SERVER['DOCUMENT_ROOT'] . '/PawCentral/public/assets/uploads/vet-images/';
            $baseUploadUrl = $rootUrl . 'uploads/vet-images/';
            $defaultImageUrl = $rootUrl . 'images/sample.jpg';

            // Handle image upload
            $imageUrl = $defaultImageUrl; // Set default image URL first
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageName = time() . '_' . $_FILES['image']['name'];
                $uploadPath = $baseUploadPath . $imageName;
                $tempImageUrl = $baseUploadUrl . $imageName;

                if (!is_dir($baseUploadPath)) {
                    mkdir($baseUploadPath, 0777, true);
                }

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                    $imageUrl = $tempImageUrl;
                }
            }

            $data = [
                'name' => $_POST['name'] ?? '',
                'img' => $imageUrl,
                'experience' => $_POST['experience'] ?? '',
                'availability' => $_POST['availability'] ?? '',
                'med_id' => $_SESSION['role_id'] ?? null
            ];

            // Validate data
            foreach ($data as $key => $value) {
                if (empty($value) && $key !== 'img') {
                    throw new Exception("Missing required field: {$key}");
                }
            }

            $result = $veterinarianModel->create($data);
            
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Veterinarian added successfully']);
            } else {
                throw new Exception('Database insert failed');
            }

        } catch (Exception $e) {
            error_log("Error in submit: " . $e->getMessage());
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            exit; // Ensure no other output
        }
    }
}