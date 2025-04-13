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
            $city = htmlspecialchars($_POST['City']);
            $address = htmlspecialchars($_POST['Exact_address']);
            $termsAccepted = isset($_POST['agreed_terms']) ? 1 : 0;
            $feeNegotiable = isset($_POST['fee_negotiable']) ? 1 : 0;
    
            if (empty($price) || empty($city) || empty($address) || !$termsAccepted) {
                echo "Please fill in all required fields and accept the terms.";
                exit;
            }
    
            $petData = $_SESSION['postpet_data'];
            $imagePaths = $petData['images'] ?? [];
    
            $data = [
                'merchant_id' => $_SESSION['role_id'] ?? null,
                'tradeType' => $petData['tradeType'],
                'petName' => $petData['petName'],
                'species' => $petData['species'],
                'breed' => $petData['breed'],
                'sex' => $petData['sex'],
                'age' => (float)$petData['age'],
                'height' => $petData['height'],
                'weight' => $petData['weight'],
                'neutered' => $petData['neutered'] === 'Yes' ? 1 : 0,
                'trained' => $petData['trained'] === 'Yes' ? 1 : 0,
                'pedigree' =>$petData['pedigree'] === 'Yes' ? 1 : 0,
                'vaccinated' => $petData['vaccinated'] === 'Yes' ? 1 : 0,
                'contactName' => $petData['contactName'],
                'contactNumber' => $petData['contactNumber'],
                'email' => $petData['email'],
                'price' => $price,
                'City' => $city,
                'Exact_address' => $address,
                'img1' => $imagePaths[0] ?? null,
                'img2' => $imagePaths[1] ?? null,
                'img3' => $imagePaths[2] ?? null,
                'fee_negotiable' => isset($_POST['fee_negotiable']) ? 1 : 0,
                'agreed_terms' => isset($_POST['agreed_terms']) ? 1 : 0,
                'created_at'=>date('Y-m-d H:i:s')
            ];
            echo "<pre>";
            print_r($data);
            echo "<pre>";
            $postPetModel = new AddPostpet();
            if ($postPetModel->insert($data)) {
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