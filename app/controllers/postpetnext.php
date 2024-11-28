<?php 


class Postpetnext{
    use controller;

    public function index(){
        $this->view("postpetnext");
    }

        public function submit() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Check if files were uploaded
                if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
                    $imageData = [];
                    $totalFiles = count($_FILES['images']['name']);
                    // Base paths for images
                    $rootUrl='http://localhost/PawCentral/public/assets/';
                    $baseUploadPath = $_SERVER['DOCUMENT_ROOT'] . '/PawCentral/public/assets/uploads/';
                    $baseUploadUrl = $rootUrl . 'uploads/';
                    $defaultImageUrl = $rootUrl . 'images/sample.jpg';


                    // Loop through all files
                    for ($i = 0; $i < $totalFiles; $i++) {
                        // $fileTmpName = $_FILES['images']['tmp_name'][$i];
                        // $fileSize = $_FILES['images']['size'][$i];
                        // $fileError = $_FILES['images']['error'][$i];
                        $imageName = time() . '_' . $_FILES['images']['name'][$i];
                        $uploadPath = $baseUploadPath . $imageName;
                        $imageUrl = $baseUploadUrl . $imageName;
    
                        // Add binary data to imageData array
                        $imageData[] = $imageUrl;
                        echo json_encode($imageData);

                        if (!is_dir($baseUploadPath)) {
                            mkdir($baseUploadPath, 0777, true);
                        }
        
                        if (!move_uploaded_file($_FILES['images']['tmp_name'][$i], $uploadPath)) {
                            throw new Exception('Failed to move uploaded file');
                        }
                    }
    
                    // Store the image data in session
                    if (isset($_SESSION['postpet_data'])) {
                        $data1 = $_SESSION['postpet_data'];
                        $data1['images'] = $imageData;  // Add the uploaded binary image data to session
    
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
