<?php

class Med_Dashboard_Veterinarians {
    use Controller;

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            $veterinarianModel = new Veterinarians;
            $this->submit($veterinarianModel);
            return;
        }

        $veterinarianModel = new Veterinarians;
        $veterinarians = $veterinarianModel->get([], [
            'order_column' => 'name',
            'order_type' => 'desc'
        ]);
        $this->view("medi.f/profile/med-veterinarians",['veterinarians' => $veterinarians]);
    }

    private function submit($veterinarianModel) {
        try {
            // Base paths for images
            $rootUrl='http://localhost/PawCentral/public/assets/';
            $baseUploadPath = $_SERVER['DOCUMENT_ROOT'] . '/PawCentral/public/assets/uploads/vet-images/';
            $baseUploadUrl = $rootUrl . 'uploads/vet-images/';
            $defaultImageUrl = $rootUrl . 'images/sample.jpg';

            // Handle image upload
            if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                $imageUrl = $defaultImageUrl;
            } else {
                $imageName = time() . '_' . $_FILES['image']['name'];
                $uploadPath = $baseUploadPath . $imageName;
                $imageUrl = $baseUploadUrl . $imageName;

                if (!is_dir($baseUploadPath)) {
                    mkdir($baseUploadPath, 0777, true);
                }

                if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                    throw new Exception('Failed to move uploaded file');
                }
            }

            $data = [
                'name' => $_POST['name'] ?? '',
                'image_url' => $imageUrl,
                'experience' => $_POST['experience'] ?? '',
                'availability' => $_POST['availability'] ?? ''
            ];

            // Validate data
            foreach ($data as $key => $value) {
                if (empty($value)) {
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