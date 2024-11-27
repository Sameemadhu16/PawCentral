<?php

class Manage{
    use Controller;
    public function index(){
        $managePost=new AddPostpet();
        $posts=$managePost->findAll();
        $this->view("Manage",['posts'=>$posts]);
    }
    public function edit($id)
    {
        $managePost = new AddPostpet();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form submission
            $data = $_POST;
    
            try {
                $managePost->update($id, $data);
                header("Location: " . ROOT . "/manage");
                exit;
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        }
    
        // Fetch the current post data
        $post = $managePost->first(['id' => $id]);
        if (!$post) {
            header("Location: " . ROOT . "/manage");
            exit;
        }
    
        // Pass the post data and any errors to the view
        $this->view("editpost", ['post' => $post, 'error' => $error ?? null]);
    }
public function delete() 
{
    $id = $_GET['id'] ?? null; // Get the `id` from the query parameter

    if (!$id) {
        echo "Error: No post ID provided.";
        return;
    }

    $managePost = new AddPostpet();

    // Attempt to delete the post
    if ($managePost->delete($id)) {
        header("Location: " . ROOT . "/service/manage");
        exit;
    } else {
        echo "Error: Unable to delete the post.";
    }
}
public function details($id) {
    $managePost = new AddPostpet();

    // Fetch the post details by ID
    $post = $managePost->first(['id' => $id]);

    if (!$post) {
        header("Location: " . ROOT . "/manage");
        exit;
    }

    // Display the details page
    $this->view('PostDetails', ['post' => $post]);
}

}