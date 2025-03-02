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
            $duration = htmlspecialchars($_POST['duration']);
            $fee = htmlspecialchars($_POST['fee']);
            $renterName = htmlspecialchars($_POST['renterName']);
            $renterContact = htmlspecialchars($_POST['renterContact']);
            $renterAddress = htmlspecialchars($_POST['renterAddress']);
            $termsAccepted = isset($_POST['terms']) ? 1 : 0;

            if (empty($duration) || empty($fee) || empty($renterName) || empty($renterContact) || empty($renterAddress) || !$termsAccepted) {
                echo "Please fill in all required fields and accept the terms.";
                exit;
            }

            $petData = isset($_SESSION['postpet_data']) ? $_SESSION['postpet_data'] : null;

            if ($petData) {
                $imagePaths = isset($petData['images']) ? $petData['images'] : [];

                $data = [
                    'tradeType' => $petData['tradeType'],
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
                    'rental_duration' => $duration,
                    'rental_fee' => $fee,
                    'renter_name' => $renterName,
                    'renter_contact' => $renterContact,
                    'renter_address' => $renterAddress,
                    'img1' => $imagePaths[0] ?? null,
                    'img2' => $imagePaths[1] ?? null,
                    'img3' => $imagePaths[2] ?? null,
                    'agreed_terms' => $termsAccepted,
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
            } else {
                echo "No pet data found. Please go back and fill out the previous steps.";
                exit();
            }
        }
    }
}