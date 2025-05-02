<?php

class PetPosts {

    use Controller;

    function indexWithpagination(){
        $model = new PetsViewModel();
        
        // Get filters from query parameters
        $post_type = $_GET['post_type'] ?? 'all';
        $location = $_GET['location'] ?? 'all';
        $page_no = $_GET['page'] ?? 1;
        $page_size = 8; // Items per page
        
        // Calculate offset
        $offset = ($page_no - 1) * $page_size;

        // Get total count of posts based on filters
        $total_posts = $model->getTotalPostsCount($post_type, $location);
        $total_posts = $total_posts[0]->total_posts;
        $total_pages = ceil($total_posts / $page_size);

        // Get paginated posts with filters
        $data['posts'] = $model->getPostsWithPagination($offset, $page_size, $post_type, $location);
        
        // Get unique locations for the dropdown
        $data['locations'] = $model->getDistinctLocations();
        
        // Add pagination data to the view
        $data['pagination'] = [
            'current_page' => $page_no,
            'total_pages' => $total_pages,
            'total_posts' => $total_posts,
            'post_type' => $post_type,
            'location' => $location
        ];

        $this->view('petposts', $data);
    }

    public function index() {
        $this->indexWithpagination();
    }
}