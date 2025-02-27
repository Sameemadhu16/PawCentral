<?php

class Med_Dashboard_Veterinarians {
    use Controller;

    public function index($parms = null) {
        $id = $parms['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            $veterinarianModel = new Veterinarians;
            // Check if 'id' is set to determine if it's an edit
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $id = $_POST['id'];
                $this->edit($veterinarianModel, $id);
            } else {
                $this->submit($veterinarianModel);
            }
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            header('Content-Type: application/json');
            $veterinarianModel = new Veterinarians;
            $id = $_GET['id'] ?? null;
            if (!$id) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
                return;
            }
            $this->delete($veterinarianModel, $id);
            return;
        }

        // Remove the PUT request handling since we're using POST for edits

        $veterinarianModel = new Veterinarians;
        $veterinarians = $veterinarianModel->get([], [
            'order_column' => 'name',
            'order_type' => 'desc'
        ]);
        echo json_encode($veterinarians);
        $this->view("medi.f/profile/med-veterinarians",['veterinarians' => $veterinarians]);
    }

    public function getVeterinarian($params) {
        header('Content-Type: application/json');
        
        $id = $params['id'] ?? null;
        if (!$id) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
            return;
        }

        try {
            $veterinarianModel = new Veterinarians;
            $vet = $veterinarianModel->first(['id' => $id]);
            
            if ($vet) {
                echo json_encode([
                    'status' => 'success',
                    'vet' => [
                        'id' => $vet->id,
                        'name' => $vet->name,
                        'experience' => $vet->experience,
                        'availability' => $vet->availability,
                        'img' => $vet->img
                    ]
                ]);
            } else {
                throw new Exception('Veterinarian not found');
            }
        } catch (Exception $e) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
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
                'img' => $imageUrl, // This will now always have a value
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

    private function delete($veterinarianModel, $id) {
        $result = $veterinarianModel->delete($id);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Veterinarian deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete veterinarian']);
        }
    }

    private function edit($veterinarianModel, $id) {
        try {
            $data = [];
            
            // Only add fields that have non-empty values
            if (!empty($_POST['name'])) {
                $data['name'] = $_POST['name'];
            }
            
            if (!empty($_POST['experience'])) {
                $data['experience'] = $_POST['experience'];
            }
            
            if (!empty($_POST['availability'])) {
                $data['availability'] = $_POST['availability'];
            }

            // Add med_id from session if not already set
            if (isset($_SESSION['role_id'])) {
                $data['med_id'] = $_SESSION['role_id'];
            }

            // Handle image upload if new image is provided
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $rootUrl = 'http://localhost/PawCentral/public/assets/';
                $baseUploadPath = $_SERVER['DOCUMENT_ROOT'] . '/PawCentral/public/assets/uploads/vet-images/';
                $baseUploadUrl = $rootUrl . 'uploads/vet-images/';
                
                $imageName = time() . '_' . $_FILES['image']['name'];
                $uploadPath = $baseUploadPath . $imageName;
                $imageUrl = $baseUploadUrl . $imageName;

                if (!is_dir($baseUploadPath)) {
                    mkdir($baseUploadPath, 0777, true);
                }

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                    $data['img'] = $imageUrl;
                }
            }

            // Only proceed with update if there are changes
            if (!empty($data)) {
                // Validate data
                foreach ($data as $key => $value) {
                    if (empty($value)) {
                        throw new Exception("Missing required field: {$key}");
                    }
                }

                $result = $veterinarianModel->update($id, $data);
                
                if ($result) {
                    echo json_encode(['status' => 'success', 'message' => 'Veterinarian updated successfully', 'vet' => $data]);
                } else {
                    throw new Exception('Database update failed');
                }
            } else {
                throw new Exception('No data to update');
            }

        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}