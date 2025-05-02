<?php

class PetShelters {

    use Controller;

    function indexWithpagination(){
        $model = new ShelterModel();
        
        // Get location filter from query parameter
        $location = $_GET['location'] ?? 'all';
        $page_no = $_GET['page'] ?? 1;
        $page_size = 12; // Items per page
        
        // Calculate offset
        $offset = ($page_no - 1) * $page_size;

        // Get total count of shelters based on location filter
        $total_shelters = $model->getTotalSheltersCount($location);
        $total_shelters = $total_shelters[0]->total_shelters;
        $total_pages = ceil($total_shelters / $page_size);
        // print_r($total_shelters);
        // Get paginated shelters with location filter
        $data['shelters'] = $model->getSheltersWithPagination($offset, $page_size, $location);
        
        // print_r($data['shelters']);
        // exit();
        // Get distinct locations for the dropdown
        $data['locations'] = $model->getDistinctLocations();
        
        // Add pagination data to the view
        $data['pagination'] = [
            'current_page' => $page_no,
            'total_pages' => $total_pages,
            'total_shelters' => $total_shelters,
            'location' => $location
        ];

        $this->view('pet-shelters', $data);
    }

    public function index() {

        $this->view('pet-shelters');
    }
}