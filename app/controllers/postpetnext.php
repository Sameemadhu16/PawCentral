<?php 


class Postpetnext{
    use controller;

    public function index(){
        $this->view("postpetnext");
    }

        public function submit() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Check if files were uploaded
                if (isset($_FILES['image'])) {
                    $totalFiles = count($_FILES['image']['name']);
                    // Base paths for image
                    $rootUrl='http://localhost/PawCentral/public/assets/';
                    $baseUploadPath = $_SERVER['DOCUMENT_ROOT'] . '/PawCentral/public/assets/uploads/';
                    $baseUploadUrl = $rootUrl . 'uploads/';
                    $defaultImageUrl = $rootUrl . 'image/sample.jpg';

                        // $fileTmpName = $_FILES['image']['tmp_name'];
                        // $fileSize = $_FILES['image']['size'];
                        // $fileError = $_FILES['image']['error'];
                        $imageName = time() . '_' . $_FILES['image']['name'];
                        $uploadPath = $baseUploadPath . $imageName;
                        $imageUrl = $baseUploadUrl . $imageName;
    
                        // Add binary data to imageData array
                        $imageUrl;
                        echo json_encode($imageUrl);

                        if (!is_dir($baseUploadPath)) {
                            mkdir($baseUploadPath, 0777, true);
                        }
        
                        if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                            throw new Exception('Failed to move uploaded file');
                        }
                    
    
                    // Store the image data in session
                    if (isset($_SESSION['postpet_data'])) {
                        $data1 = $_SESSION['postpet_data'];
                        $data1['image'] = $imageUrl;  // Add the uploaded binary image data to session
    
                        // Save the updated data back to session
                        $_SESSION['postpet_data'] = $data1;
                    }
                }
    
                // Redirect to the confirmation or next page
                header("Location: " . ROOT . "/service/postpet/postpetnext/selling");
                exit();
            }
        }
    }
