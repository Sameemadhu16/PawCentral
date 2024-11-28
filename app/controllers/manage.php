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
        
    
        // Fetch the current post data
        $post = $managePost->first(['id' => $id['id']]);
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
public function update()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Fetch the ID from the hidden input field
        $id = $_POST['id'] ?? null;

        if (!$id) {
            echo "Error: No post ID provided.";
            return;
        }

        // Sanitize and validate the form data
        $data = [
            'petName' => htmlspecialchars($_POST['petName']),
            'species' => htmlspecialchars($_POST['species']),
            'breed' => htmlspecialchars($_POST['breed']),
            'genderNeeds' => htmlspecialchars($_POST['genderNeeds']),
            'contactName' => htmlspecialchars($_POST['contactName']),
            'contactNumber' => htmlspecialchars($_POST['contactNumber']),
            'email' => htmlspecialchars($_POST['email']),
            'price' => htmlspecialchars($_POST['price']),
            'feebox' => isset($_POST['feebox']) ? 1 : 0, // Handle checkbox
            'city' => htmlspecialchars($_POST['city']),
            'address' => htmlspecialchars($_POST['address']),
        ];

        $managePost = new AddPostpet();

        // Attempt to update the record
        if ($managePost->update($id, $data)) {
            header("Location: " . ROOT . "/service/manage");
            exit;
        } else {
            echo "Error: Unable to update the post.";
        }
    } else {
        echo "Invalid request method.";
    }
}
}