<?php
class Rent
{
    use controller;

    public function index()
    {
        $this->view("rent");
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $duration = htmlspecialchars($_POST['rentalDuration']);
            $fee = htmlspecialchars($_POST['rentalFee']);
            $renterName = htmlspecialchars($_POST['renterName']);
            $renterContact = htmlspecialchars($_POST['renterContact']);
            $renterAddress = htmlspecialchars($_POST['renterAddress']);
            $termsAccepted = isset($_POST['agreeTerms']) ? 1 : 0;

            if (empty($duration) || empty($fee) || empty($renterName) || empty($renterContact) || empty($renterAddress) || !$termsAccepted) {
                echo "Please fill in all required fields and accept the terms.";
                exit;
            }

            $petData = isset($_SESSION['postpet_data']) ? $_SESSION['postpet_data'] : null;

            if ($petData) {
                $imagePaths = isset($petData['images']) ? $petData['images'] : [];

                $data = [
                    'merchant_id'=>$_SESSION['role_id']?? null,
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
                    'rental_duration' => $duration,
                    'rental_fee' => $fee,
                    'renter_name' => $renterName,
                    'renter_contact' => $renterContact,
                    'renter_address' => $renterAddress,
                    'contactName'=>$petData['contactName'],
                    'contactNumber'=>$petData['contactNumber'],
                    'img1' => $imagePaths[0] ?? null,
                    'img2' => $imagePaths[1] ?? null,
                    'img3' => $imagePaths[2] ?? null,
                    'agreed_terms' => $termsAccepted,
                    'email'=>$petData['email'],
                    'delete_status'=>0
                ];
               
                $postPetModel = new RentPost();
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