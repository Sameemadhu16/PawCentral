<?php

class ShelterDetails{

    use Controller;

    public function index() {
        $model = new ShelterModel;

        $id = $_GET['id'] ?? null; // Retrieve 'id' from the query string or set to null if not provided
        if (!$id) {
            die('Error: ID is required.');
        }

        // Fetch shelter data
        $shelterdata = $model->first(['id' => $id]);

        // Fetch user data associated with the shelter
        $userModel = new UserProfilesModel();
        $userdata = $userModel->first(['id' => $shelterdata->user_id]);

        $data = [
            'shelter' => $shelterdata,
            'user' => $userdata
        ];

        // show($data);

        $this->view('petshelterdetails', $data);
    }
}