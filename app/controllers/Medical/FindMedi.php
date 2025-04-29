<?php

class FindMedi{
    use Controller;

    function indexWithpagination(){
        $model = new MedicalProvModel();
        
        // Get filters from query parameters
        $location = $_GET['location'] ?? 'all';
        $service_type = $_GET['medical_Name'] ?? 'all';
        $page_no = $_GET['page'] ?? 1;
        $page_size = 6; // Items per page
        
        // Calculate offset
        $offset = ($page_no - 1) * $page_size;

        // Get total count of Med based on filters
        $total_Med = $model->getTotalMedsCount($location, $service_type);
        $total_Med = $total_Med[0]->total_Meds;
        $total_pages = ceil($total_Med / $page_size);
        // print_r($total_Med);
        // Get paginated Med with filters
        $data['medical_centers'] = $model->getMedsWithPagination($offset, $page_size, $location, $service_type);
        
        // print_r($data['Med']);
        // exit();
        // Get distinct locations and service types for the dropdowns
        $data['locations'] = $model->getDistinctLocations();
        $data['medical_Names'] = $model->getDistinctNames();
        
        // Add pagination data to the view
        $data['pagination'] = [
            'current_page' => $page_no,
            'total_pages' => $total_pages,
            'total_Med' => $total_Med,
            'location' => $location,
            'medical_Name' => $service_type
        ];

        $this->view('medi.f/findMedi', $data);
    }

    public function index() {
        $medicalCenterModel = new MedicalProvModel;
        $medical_centers = $medicalCenterModel->get([], [
            'order_column' => 'name',
            'order_type' => 'asc'
        ]);
        $this->view("medi.f/findMedi", ['medical_centers' => $medical_centers]);
    }
}