<?php
class Postpet
{
    use Controller;

    public function index()
    {
        $this->view('postpet');
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'tradeType' => htmlspecialchars($_POST['tradeType']),
                'petName' => htmlspecialchars($_POST['petName']),
                'species' => htmlspecialchars($_POST['species']),
                'breed' => htmlspecialchars($_POST['breed']),
                'sex' => htmlspecialchars($_POST['sex']),
                'age' => htmlspecialchars($_POST['age']),
                'height' => htmlspecialchars($_POST['height']),
                'weight' => htmlspecialchars($_POST['weight']),
                'neutered' => htmlspecialchars($_POST['neutered']),
                'trained' => htmlspecialchars($_POST['trained']),
                'pedigree' => htmlspecialchars($_POST['pedigree']),
                'vaccinated' => htmlspecialchars($_POST['vaccinated']),
                'contactName' => htmlspecialchars($_POST['contactName']),
                'contactNumber' => htmlspecialchars($_POST['contactNumber']),
                'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            ];
            $_SESSION['postpet_data'] = $data;
    
            // Redirect to the next step (image upload)
            header("Location: " . ROOT . "/service/postpet/postpetnext");
            exit();
        }
    }
}