<?php

class Lostandfound {

    use Controller;

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