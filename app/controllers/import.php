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
                    'country' => $country,
                    'import_fees' => $fees,
                    'importing_owner' => $owner,
                    'transport_method' => $transport,
                    'importer_mobile' => $mobile,
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