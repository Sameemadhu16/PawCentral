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
            'user' => $userdata,
            'postcards' => $this->getPostCardstoProfile($shelterdata->id)
        ];

        // Very important: decode images correctly
        foreach ($data['postcards'] as $post) {
            if (is_object($post) && (isset($post->postimg1) || isset($post->postimg2) || isset($post->postimg3))) {
                $post->postimg1 = "data:image/jpeg;base64," . base64_encode($post->postimg1);
                $post->postimg2 = "data:image/jpeg;base64," . base64_encode($post->postimg2);
                $post->postimg3 = "data:image/jpeg;base64," . base64_encode($post->postimg3);
            } elseif (is_object($post)) {
                $post->postimg1 = null;
                $post->postimg2 = null;
                $post->postimg3 = null;
            }
        }

        // show($data);

        $this->view('petshelterdetails', $data);
    }

    private function getPostCardstoProfile($shelter_id){
        $postModel = new AdoptionPostModel;

        $posts['posts'] = $postModel->getShelterPosts($shelter_id);

        // Very important: decode images correctly
        foreach ($posts['posts'] as $post) {
            if (isset($post->postimg1) || isset($post->postimg2) || isset($post->postimg3)) {
                $post->postimg1 = "data:image/jpeg;base64," . base64_encode($post->postimg1);
                $post->postimg2 = "data:image/jpeg;base64," . base64_encode($post->postimg2);
                $post->postimg3 = "data:image/jpeg;base64," . base64_encode($post->postimg3);
            } else {
                $post->postimg1 = null;
                $post->postimg2 = null;
                $post->postimg3 = null;
            }
        }
        return $posts;
    }
}