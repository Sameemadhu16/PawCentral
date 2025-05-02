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
            $contactNumber = $_POST['contactNumber'];

        // Basic validation: allow only digits, length between 10 and 15
        if (!preg_match('/^\d{10,15}$/', $contactNumber)) {
            echo "<script>alert('Invalid contact number. Please enter a valid phone number with 10 to 15 digits.'); window.history.back();</script>";
            exit();
        }
            $data = [
                'tradeType' => htmlspecialchars($_POST['tradeType']),
                'petName' => htmlspecialchars($_POST['petName']),
                'species' => htmlspecialchars($_POST['species']),
                'breed' => htmlspecialchars($_POST['breed']),
                'sex' => $_POST['sex'],
                'age' => $_POST['age'],
                'height' => (float)$_POST['height'],
                'weight' => (float)$_POST['weight'],
                'neutered' => htmlspecialchars($_POST['neutered']),
                'trained' => htmlspecialchars($_POST['trained']),
                'pedigree' => htmlspecialchars($_POST['pedigree']),
                'vaccinated' => htmlspecialchars($_POST['vaccinated']),
                'description'=>htmlspecialchars($_POST['description']),
                'contactName' => htmlspecialchars($_POST['contactName']),
                'contactNumber' => htmlspecialchars($_POST['contactNumber']),
                'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            ];
            $_SESSION['postpet_data'] = $data;
            $_SESSION['common_data']=$data;
            header("Location: " . ROOT . "/service/postpet/postpetnext");
            exit();
        }
    }
}