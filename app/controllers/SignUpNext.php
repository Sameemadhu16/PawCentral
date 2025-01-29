<?php

class SignUpNext {
    use Controller;

    public function index() {

        $user = new User;
        $medprov = new MedicalProvModel;
        $seller = new SellerModel;
        $shelter = new ShelterModel;
        $serviceprov = new ServiceProvModel;


        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stepTwoSubmit'])) {
            $this->handleSecondStep($user,$medprov,$seller,$shelter,$serviceprov);
        }

        $this->view("signupLogin.f/signupNext" , $_SESSION['signup_data2'] ?? []);
        unset($_SESSION['signup_data2']);
    }

    // Handle the second step form submission
    private function handleSecondStep($user,$medprov,$seller,$shelter,$serviceprov) {

        // Collect data from session and form submission
        $userData = $_SESSION['signup_data'] ?? []; //data to be inserted in the user table 
        $data['is_service'] = $userData['is_service']?? 'no'; //data to insert in the relevant service table
        $data['service_type'] = $_POST['service_type'] ?? '';
        $data['service_name'] = $_POST['service_name'] ?? '';
        $data['location'] = $_POST['location'] ?? '';
        $data['proof'] = $_FILES['proof'] ?? null;
        $data['terms'] = $_POST['terms'] ?? '';

        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        if (isset($data['proof']) && !empty($data['proof']['name'])) {
            $data['license_proof'] = $user->uploadFile($data['proof']);
        }
        
        // Validate the data for the second step
        if ($user->validateSecondStep($data)) {
            // echo "Validation passed.<br>"; // Debug message
            unset($data['terms']);
            unset($data['proof']);
            unset($data['is_service']);
            unset($userData['terms']);
            unset($userData['is_service']);
            $userData['role']=$data['service_type'];
            // Attempt to create the user in the databaseS
            $user->insert($userData);
            // echo "User created.<br>"; // Debug message

           

            $userinfo=$user->getUserByEmail($userData['email']); //GET USERID TO INSERT AS THE FK
            $data['user_id'] = $userinfo->id;

            //IF ITS A MED PROV
            if($data['service_type']=='medical_provider'){
                unset($data['service_type']);
                $data['name'] = $data['service_name'];
                unset($data['service_name']);
                $medprov->insert($data);
            }   //IF SELLER
            else if($data['service_type']=='seller'){
                unset($data['service_type']);
                $data['merchant_name'] = $data['service_name'];
                unset($data['service_name']);
                $seller->insert($data);
            }//shelters
            else if($data['service_type']=='shelter'){
                unset($data['service_type']);
                $data['name'] = $data['service_name'];
                unset($data['service_name']);
                $shelter->insert($data);
            }//Other services
            else if($data['service_type']=='service_prov'){
                unset($data['service_type']);
                $data['name'] = $data['service_name'];
                unset($data['service_name']);
                $data['Areas'] = $data['location'];
                unset($data['location']);
                $serviceprov->insert($data);
            }


            // Clear session data
unset($_SESSION['signup_data']);
            // echo "Session cleared.<br>"; // Debug message

            // Redirect to login
redirect('login');
            // echo "Redirecting to login.<br>"; // Debug message (should not display if redirect works)
        } else {
            // Pass errors to the view if validation fails
            $data['errors'] = $user->errors;
            $_SESSION['signup_data2'] = $data;
            // $this->view('signupLogin.f/signupNext', $data);
        }
    }
}
