<?php

class AdminReport
{
    use Controller;

    private $valid_roles = ['admin'];

    public function index()
    {
        if ($this->isAuthorized($this->valid_roles)){

            $data = [
                'userCount' => $this->getUserCount(),
                'thisMonthUsers' => $this->getThisMonthUsers(),
                'lastMonthUsers' => $this->getLastMonthUsers(),
                'monthlyUsers' => $this->getMonthlyUsers(),
    
                'thisMonthDonations' => $this->getThisMonthDonations(),
                'lastMonthDonations' => $this->getLastMonthDonations(),
                'monthlyDonations' => $this->getMonthlyDonations(),
                'allDonations' => $this->getAllDonations(),
    
                'thisMonthMedicalProviders' => $this->getThisMonthMedicalProviders(),
                'lastMonthMedicalProviders' => $this->getLastMonthMedicalProviders(),
                'monthlyMedicalProviders' => $this->getMonthlyMedicalProviders(),
                'allMedicalProviders' => $this->getAllMedicalProviders(),
    
                'thisMonthEvents' => $this->getThisMonthEvents(),
                'lastMonthEvents' => $this->getLastMonthEvents(),
                'monthlyEvents' => $this->getMonthlyEvents(),
                'allEvents' => $this->getAllEvents(),
    
                'thisMonthRegisteredPets' => $this->getThisMonthRegisteredPets(),
                'lastMonthRegisteredPets' => $this->getLastMonthRegisteredPets(),
                'monthlyRegisteredPets' => $this->getMonthlyRegisteredPets(),
                'allRegisteredPets' => $this->getAllRegisteredPets(),
            ];
    
            // show($data);
            $this->view('admin/report', $data);
        } else {
            //access denied page
            redirect('403');
        }
    }

    // --- PRIVATE FUNCTIONS ---

    private function getUserCount()
    {
        $userModel = new User;
        return $userModel->query("SELECT COUNT(*) AS total FROM users")[0]->total ?? 0;
    }

    private function getThisMonthUsers()
    {
        $userModel = new User;
        return $userModel->query("SELECT COUNT(*) AS total FROM users WHERE MONTH(created_at) = MONTH(CURRENT_DATE)")[0]->total ?? 0;
    }

    private function getLastMonthUsers()
    {
        $userModel = new User;
        return $userModel->query("SELECT COUNT(*) AS total FROM users WHERE MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)")[0]->total ?? 0;
    }

    private function getMonthlyUsers()
    {
        $userModel = new User;
        $muser=$userModel->query("select DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS count 
            FROM users 
            WHERE created_at >= DATE_FORMAT(CURDATE(), '%Y-01-01') 
            GROUP BY month 
            ORDER BY month
        ");
        return $muser;
    }

    private function getAllDonations()
    {
        $donationModel = new DonationsModel;
        return $donationModel->query("SELECT SUM(amount) AS total FROM donations")[0]->total ?? 0;
    }

    private function getThisMonthDonations()
    {
        $donationModel = new DonationsModel;
        return $donationModel->query("SELECT SUM(amount) AS total FROM donations WHERE MONTH(donated_at) = MONTH(CURRENT_DATE)")[0]->total ?? 0;
    }

    private function getLastMonthDonations()
    {
        $donationModel = new DonationsModel;
        return $donationModel->query("SELECT SUM(amount) AS total FROM donations WHERE MONTH(donated_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)")[0]->total ?? 0;
    }

    private function getMonthlyDonations()
    {
        $donationModel = new DonationsModel;
        return $donationModel->query("SELECT DATE_FORMAT(donated_at, '%Y-%m') AS month, SUM(amount) AS count
            FROM donations
            WHERE donated_at >= DATE_FORMAT(CURDATE(), '%Y-01-01')
            GROUP BY month
            ORDER BY month
        ");
    }

    private function getAllMedicalProviders()
    {
        $medicalModel = new MedicalProvModel;
        return $medicalModel->query("SELECT COUNT(*) AS total FROM medical_providers")[0]->total ?? 0;
    }

    private function getThisMonthMedicalProviders()
    {
        $medicalModel = new MedicalProvModel;
        return $medicalModel->query("SELECT COUNT(*) AS total FROM medical_providers WHERE MONTH(created_at) = MONTH(CURRENT_DATE)")[0]->total ?? 0;
    }

    private function getLastMonthMedicalProviders()
    {
        $medicalModel = new MedicalProvModel;
        return $medicalModel->query("SELECT COUNT(*) AS total FROM medical_providers WHERE MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)")[0]->total ?? 0;
    }

    private function getMonthlyMedicalProviders()
    {
        $medicalModel = new MedicalProvModel;
        return $medicalModel->query("SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS count
            FROM medical_providers
            WHERE created_at >= DATE_FORMAT(CURDATE(), '%Y-01-01')
            GROUP BY month
            ORDER BY month
        ");
    }

    private function getAllEvents()
    {
        $eventModel = new Event;
        return $eventModel->query("SELECT COUNT(*) AS total FROM events")[0]->total ?? 0;
    }

    private function getThisMonthEvents()
    {
        $eventModel = new Event;
        return $eventModel->query("SELECT COUNT(*) AS total FROM events WHERE MONTH(created_at) = MONTH(CURRENT_DATE)")[0]->total ?? 0;
    }

    private function getLastMonthEvents()
    {
        $eventModel = new Event;
        return $eventModel->query("SELECT COUNT(*) AS total FROM events WHERE MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)")[0]->total ?? 0;
    }

    private function getMonthlyEvents()
    {
        $eventModel = new Event;
        return $eventModel->query("SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS count
            FROM events
            WHERE created_at >= DATE_FORMAT(CURDATE(), '%Y-01-01')
            GROUP BY month
            ORDER BY month
        ");
    }

    private function getAllRegisteredPets()
    {
        $petModel = new RegisterPet;
        return $petModel->query("SELECT COUNT(*) AS total FROM registered_pets")[0]->total ?? 0;
    }

    private function getThisMonthRegisteredPets()
    {
        $petModel = new RegisterPet;
        return $petModel->query("SELECT COUNT(*) AS total FROM registered_pets WHERE MONTH(created_at) = MONTH(CURRENT_DATE)")[0]->total ?? 0;
    }

    private function getLastMonthRegisteredPets()
    {
        $petModel = new RegisterPet;
        return $petModel->query("SELECT COUNT(*) AS total FROM registered_pets WHERE MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)")[0]->total ?? 0;
    }

    private function getMonthlyRegisteredPets()
    {
        $petModel = new RegisterPet;
        return $petModel->query("SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS count
            FROM registered_pets
            WHERE created_at >= DATE_FORMAT(CURDATE(), '%Y-01-01')
            GROUP BY month
            ORDER BY month
        ");
    }
}
