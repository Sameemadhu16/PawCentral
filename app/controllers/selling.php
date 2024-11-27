<?php

class Selling{
    use controller;
    public function index(){
        $this->view("selling");
    }
    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $price = htmlspecialchars($_POST['price']);
            $feebox = isset($_POST['feebox']) ? 1 : 0;
            $city = htmlspecialchars($_POST['city']);
            $address = htmlspecialchars($_POST['address']);
            $termsAccepted = isset($_POST['checkbox']) ? 1 : 0;
    
            if (empty($price) || empty($city) || empty($address) || !$termsAccepted) {
                echo "Please fill in all required fields and accept the terms.";
                exit;
            }
    
            $petData = isset($_SESSION['postpet_data']) ? $_SESSION['postpet_data'] : null;
    
            if ($petData) {
                $data = [
                    'tradeType'    => $petData['tradeType'],
                    'petName'      => $petData['petName'],
                    'species'      => $petData['species'],
                    'breed'        => $petData['breed'],
                    'genderNeeds'  => $petData['genderNeeds'],
                    'contactName'  => $petData['contactName'],
                    'contactNumber'=> $petData['contactNumber'],
                    'email'        => $petData['email'],
                    'price'        => $price,
                    'feebox'       => $feebox,
                    'city'         => $city,
                    'address'      => $address,
                    'termsAccepted'=> $termsAccepted,
                    'image_path'       => isset($petData['images']) ? $petData['images'] : null, // Pass the BLOB data here(',', $petData['images']) : null,
                    // 'image_path' => isset($petData['images']) ? "http://localhost/PawCentral/public/uploads/" . $petData['images'][0] : null,

                ];
    
                $postPetModel = new AddPostpet();
                if ($postPetModel->create($data)) {
                    $_SESSION['success_message']="Post successfully created";
                    // Redirect to the selling page with a success message
                    header("Location:".ROOT."/service?success=1");
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