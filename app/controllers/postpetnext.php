<?php 


class Postpetnext{
    use controller;

    public function index(){
        $this->view("postpetnext");
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if a file was uploaded
            if (isset($_FILES['images']) && $_FILES['images']['error'][0] === UPLOAD_ERR_OK) {
                $baseUploadPath = $_SERVER['DOCUMENT_ROOT'] . '/PawCentral/public/assets/uploads/';
                $baseUploadUrl = ROOT . '/assets/uploads/';
                
                // Ensure the directory exists
                if (!is_dir($baseUploadPath)) {
                    mkdir($baseUploadPath, 0777, true);
                }
        
                $uploadedImages = [];
                foreach ($_FILES['images']['name'] as $index => $name) {
                    $fileTmpName = $_FILES['images']['tmp_name'][$index];
                    $fileName = time() . '_' . $name;
                    $uploadPath = $baseUploadPath . $fileName;
                    $imageUrl = $baseUploadUrl . $fileName;
        
                    // Move the uploaded file to the specified directory
                    if (move_uploaded_file($fileTmpName, $uploadPath)) {
                        $uploadedImages[] = $imageUrl; // Store relative URL
                    } else {
                        echo "Failed to upload: $name";
                    }
                }
        
                // Save to session
                if (!empty($uploadedImages)) {
                    $_SESSION['postpet_data']['images'] = $uploadedImages;
                }
            }
        }
        
    
            // Redirect
            header("Location: " . ROOT . "/service/postpet/postpetnext/selling");
            exit();
        }
    }
    // }
