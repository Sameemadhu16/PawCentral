<?php
class Selling
{
    use Controller;

    public function index()
    {
        $this->view('selling');
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $price = htmlspecialchars($_POST['price']);
            $city = htmlspecialchars($_POST['city']);
            $address = htmlspecialchars($_POST['address']);
            $termsAccepted = isset($_POST['checkbox']) ? 1 : 0;
            $feeNegotiable = isset($_POST['feebox']) ? 1 : 0;
    
            if (empty($price) || empty($city) || empty($address) || !$termsAccepted) {
                echo "Please fill in all required fields and accept the terms.";
                exit;
            }
    
            $petData = $_SESSION['postpet_data'];
            $imagePaths = $petData['images'] ?? [];
    
            $data = [
                'pet_id' => uniqid(), // Generate unique ID
                'merchant_id' => $_SESSION['user_id'] ?? null, // Set from session
                'tradeType' => 'Selling', // Explicitly set
                'petName' => $petData['petName'],
                'species' => $petData['species'],
                'breed' => $petData['breed'],
                'sex' => $petData['sex'],
                'age' => $petData['age'],
                'height' => $petData['height'],
                'weight' => $petData['weight'],
                'neutered' => $petData['neutered'],
                'trained' => $petData['trained'],
                'pedigree' => $petData['pedigree'],
                'vaccinated' => $petData['vaccinated'],
                'contactName' => $petData['contactName'],
                'contactNumber' => $petData['contactNumber'],
                'email' => $petData['email'],
                'price' => $price,
                'City' => $city, // Matches table column
                'Exact_address' => $address, // Matches table column
                'img1' => $imagePaths[0] ?? null,
                'img2' => $imagePaths[1] ?? null,
                'img3' => $imagePaths[2] ?? null,
                'fee_negotiable' => $feeNegotiable,
                'agreed_terms' => $termsAccepted,
                'created_at' => date('Y-m-d H:i:s')
            ];
    
            $postPetModel = new AddPostpet();
            if ($postPetModel->create($data)) {
                $_SESSION['success_message'] = "Post successfully created";
                header("Location: " . ROOT . "/service?success=1");
                exit();
            } else {
                echo "Error saving data. Please try again.";
                exit();
            }
        }
    }
}