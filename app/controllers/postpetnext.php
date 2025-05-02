<?php
class Postpetnext
{
    use Controller;

    public function index()
    {
        $this->view('postpetnext');
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['images']) && $_FILES['images']['error'][0] === UPLOAD_ERR_OK) {
                $baseUploadPath = $_SERVER['DOCUMENT_ROOT'] . '/PawCentral/public/assets/uploads/';
                $baseUploadUrl = ROOT . '/assets/uploads/';

                $totalImages = count($_FILES['images']['name']);
                if ($totalImages < 3) {
                    echo "<script>alert('Please upload at least 3 images.'); window.history.back();</script>";
                    exit;
                }
    
                if (!is_dir($baseUploadPath)) {
                    mkdir($baseUploadPath, 0777, true);
                }
    
                $uploadedImages = [];
                foreach ($_FILES['images']['name'] as $index => $name) {
                    $fileTmpName = $_FILES['images']['tmp_name'][$index];
                    $fileName = time() . '_' . $name;
                    $uploadPath = $baseUploadPath . $fileName;
                    $imageUrl = $baseUploadUrl . $fileName;
    
                    if (move_uploaded_file($fileTmpName, $uploadPath)) {
                        $uploadedImages[] = $imageUrl;
                    } else {
                        echo "Failed to upload: $name";
                        exit;
                    }
                }
    
                if (!empty($uploadedImages)) {
                    $_SESSION['postpet_data']['images'] = $uploadedImages;
                }
            } else {
                echo "No images uploaded or an error occurred during upload.";
                exit;
            }
    
            if (!isset($_SESSION['postpet_data']['tradeType'])) {
                echo "Trade type not found in session. Please go back and fill out the form.";
                exit;
            }
    
            $tradeType = $_SESSION['postpet_data']['tradeType'];
            if ($tradeType === 'Selling') {
                header("Location: " . ROOT . "/service/postpet/postpetnext/selling");
            } elseif ($tradeType === 'Renting') {
                header("Location: " . ROOT . "/service/postpet/postpetnext/rent");
            } elseif ($tradeType === 'Importing') {
                header("Location: " . ROOT . "/service/postpet/postpetnext/import");
            }
            exit;
        }
    }
}