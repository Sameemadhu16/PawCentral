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
    
                    // Loop through all files
                    for ($i = 0; $i < $totalFiles; $i++) {
                        $fileTmpName = $_FILES['images']['tmp_name'][$i];
                        $fileSize = $_FILES['images']['size'][$i];
                        $fileError = $_FILES['images']['error'][$i];
    
                        // Validate file size (limit to 10MB)
                        if ($fileSize > 10485760) {
                            echo "File size too large. Maximum size allowed is 10MB.";
                            exit;
                        }
    
                        // Read the file content and convert it to binary data
                        $fileContent = file_get_contents($fileTmpName);
                        if ($fileContent === false) {
                            echo "Error reading file: " . $_FILES['images']['name'][$i];
                            exit;
                        }
    
                        // Add binary data to imageData array
                        $imageData[] = $fileContent;
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
