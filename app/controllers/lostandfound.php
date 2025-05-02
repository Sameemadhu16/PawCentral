<?php

class Lostandfound {

    use Controller;

    function indexWithpagination(){
        $model = new LostAndFoundModel();
        
        // Get filter status from query parameter
        $status = $_GET['status'] ?? 'all';
        $page_no = $_GET['page'] ?? 1;
        $page_size = 8; // Items per page
        
        // Calculate offset
        $offset = ($page_no - 1) * $page_size;

        // Get total count of requests based on filter
        $total_requests = $model->getTotalRequestsCount($status);
        $total_requests = $total_requests[0]->total_requests;
        // print_r($total_requests);
        $total_pages = ceil($total_requests / $page_size);

        // Get paginated requests with filter
        $requests['posts'] = $model->getViewReqWithPagination($offset, $page_size, $status);
        
        // Process images
        foreach ($requests['posts'] as $req) {
            if (isset($req->img1)) {
                $req->img1 = "data:image/jpeg;base64," . base64_encode($req->img1);
            }
        }
        
        // Add pagination data to the view
        $requests['pagination'] = [
            'current_page' => $page_no,
            'total_pages' => $total_pages,
            'total_requests' => $total_requests,
            'status' => $status
        ];

        $this->view('lostandfound', $requests);
    }

    function index(){
        $model = new LostAndFoundModel();

        // Retrieve all pets
        $posts['posts'] = $model->getViewPosts();
        
         // Process images: convert binary `img1` data to Base64-encoded string
         foreach ($posts['posts'] as $post) {
            if (isset($post->img1)) {
                $post->img1 = "data:image/jpeg;base64," . base64_encode($post->img1); // Adjust MIME type if not JPEG
            }else{
                $post->img1 = null;
            }
        }
        
        $this->view('lostandfound',$posts);
    }



}