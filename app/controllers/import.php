<?php
class Import
{
    use controller;

    public function index()
    {
        $this->view("import");
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $country = htmlspecialchars($_POST['country']);
            $owner = htmlspecialchars($_POST['owner']);
            $transport = htmlspecialchars($_POST['transport']);
            $mobile = htmlspecialchars($_POST['mobile']);
            $fees = htmlspecialchars($_POST['fees']);
            $termsAccepted = isset($_POST['terms']) ? 1 : 0;

            if (empty($country) || empty($owner) || empty($transport) || empty($mobile) || empty($fees) || !$termsAccepted) {
                echo "Please fill in all required fields and accept the terms.";
                exit;
            }

            $petData = isset($_SESSION['postpet_data']) ? $_SESSION['postpet_data'] : null;
            
            if ($petData) {
                $imagePaths = isset($petData['images']) ? $petData['images'] : [];
                
                if (count($imagePaths) < 3 || empty($imagePaths[0]) || empty($imagePaths[1]) || empty($imagePaths[2])) {
                    echo "Please upload at least 3 images (Image 1, Image 2, and Image 3 are required).";
                    exit;
                }
                $data = [
                    'merchant_id'=>$_SESSION['role_id']?? null,
                    'tradeType' => $petData['tradeType'],
                    'petName' => $petData['petName'],
                    'species' => $petData['species'],
                    'breed' => $petData['breed'],
                    'sex' => $petData['sex'],
                    'age' => $petData['age'],
                    'height' =>(float)$petData['height'],
                    'weight' => (float)$petData['weight'],
                    'neutered' => $petData['neutered'],
                    'trained' => $petData['trained'],
                    'pedigree' => $petData['pedigree'],
                    'vaccinated' => $petData['vaccinated'],
                    'contactName' => $petData['contactName'],
                    'contactNumber' => $petData['contactNumber'],
                    'country' => $country,
                    'import_fees' => $fees,
                    'importing_owner' => $owner,
                    'transport_method' => $transport,
                    'importer_mobile' => $mobile,
                    'description'=>$petData['description'],
                    'img1' => $imagePaths[0] ,
                    'img2' => $imagePaths[1] ,
                    'img3' => $imagePaths[2] ,
                    'img4' => $imagePaths[3] ?? null,
                    'img5' => $imagePaths[4] ?? null,
                    'agreed_terms' => $termsAccepted,
                    'email'=>$petData['email'],
                    'delete_status'=>0
                ];

               
                $postPetModel = new ImportPet();
                if ($postPetModel->insert($data)) {
                    $_SESSION['success_message'] = "Post successfully created";
                    header("Location: " . ROOT . "/service?success=1");
                    exit();
                } else {
                    echo "Error saving data. Please try again.";
                    exit();
                }
            } else {
                echo "No pet data found. Please go back and fill out the previous steps.";
                exit();
            }
        }
    }
}