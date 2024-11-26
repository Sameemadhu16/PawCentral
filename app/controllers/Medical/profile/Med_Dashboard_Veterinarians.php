<?php

class Med_Dashboard_Veterinarians{
    use Controller;

    public function index() {
        $veterinarianModel = new Veterinarians;
        $veterinarians = $veterinarianModel->get([], [
            'order_column' => 'name',
            'order_type' => 'desc'
        ]);
        $this->view("medi.f/profile/med-veterinarians",['veterinarians' => $veterinarians]);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-vet-submit-btn'])) {
            $this->submit($veterinarianModel);
            return;
        }
    }

    private function submit($veterinarianModel)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle file upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $_FILES['image']['tmp_name'];
                $imageName = $_FILES['image']['name'];
                $uploadDir = '<?=ROOT?>/assets/uploads/vet-images/';
                $imagePath = $uploadDir . $imageName;

                // Ensure the upload directory exists
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Move the uploaded file to the desired directory
                if (move_uploaded_file($imageTmpPath, $imagePath)) {
                    $imageUrl = $imagePath;
                } else {
                    $data['error'] = 'Failed to upload image. Please try again.';
                    $this->view('medi.f/profile/popup/add-veterinarian', $data);
                    return;
                }
            } else {
                $data['error'] = 'No image uploaded or upload error.';
                $this->view('medi.f/profile/popup/add-veterinarian', $data);
                return;
            }

            //catch data
            $data = [
                'name' => $_POST['name'],
                'image_url' => $imageUrl,
                'experience' => $_POST['experience'],
                'availability' => $_SESSION['availability']
            ];

            $result = $veterinarianModel->create($data);
            echo $result;
            if ($result) {
                $data['success_message'] = 'Veterinarian added successfully.';
                $this->view('medi.f/profile/med-veterinarians', $data);
                return;
            } else {
                $data['error'] = 'Failed to add veterinarian. Please try again.';
                $this->view('medi.f/profile/popup/add-veterinarian', $data);
            }
        } else {
            redirect('medical-center/dashboard');
        }
    }
}