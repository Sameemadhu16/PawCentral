<?php

class ShelterDetails{

    use Controller;

    public function index(){

        $model = new ShelterModel;
        
      

        $id = $_GET['id'] ?? null; // Retrieve 'id' from the query string or set to null if not provided
        if (!$id) {
            die('Error: ID is required.');
        }
        $shelterdata = $model->first(['id' => $id]);


        $data =[
            'shelter' => $shelterdata
            
        ];
        
    

        // show($data);

        $this->view('petshelterdetails',$data);

    }
}