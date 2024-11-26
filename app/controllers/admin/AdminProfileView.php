<?php

class AdminProfileView{
    use Controller;

    public function index(){
        

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin'])){
        $this->updateProfile();
        }
        // show($_SESSION['user']);
        $this->view('admin/profile_view');
    }

    private function updateProfile(){

        $updateAdmin = new User();
       
            // Sanitize POST array
            // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $updatename = explode(" ", $_POST['name']);
            $data = [
                'first_name' => trim($updatename[0]),
                'last_name' => trim($updatename[1]),
                'email' => trim($_POST['email']),
                'mobile_no' => trim($_POST['mobile']),
                // 'name_err' => '',
                // 'email_err' => '',
                // 'mobile_err' => ''
                
                
            ];

              // Handle profile image upload
              if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
                $target_dir = "profile-images/";
                show($target_dir);
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true); // Create directory if it doesn't exist
                }

                $file_name = basename($_FILES['profile_pic']['name']);
                $target_file = $target_dir . uniqid() . "_" . $file_name;

                // Validate image type
                $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($file_type, $allowed_types)) {
                    $_SESSION['error'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
                    $this->view('profile_view', $data);
                    return;
                }

                // Check if the file is a valid image
                if (getimagesize($_FILES['profile_pic']['tmp_name']) === false) {
                    $_SESSION['error'] = "The selected file is not a valid image.";
                    $this->view('profile_view', $data);
                    return;
                }

                // Move the uploaded file to the target directory
                if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
                    $data['profile_pic'] = $target_file; // Add the file path to the $data array
                } else {
                    $_SESSION['error'] = "Failed to upload the profile picture.";
                    $this->view('profile_view', $data);
                    return;
                }
            }


            // $id = $_SESSION['user']->id;
            // show($data);

            // Validate name
            // if(empty($data['name'])){
            //     $data['name_err'] = 'Please enter name';
            // }

            // Validate email
            // if(empty($data['email'])){
            //     $data['email_err'] = 'Please enter email';
            // }

            // Validate mobile
            // if(empty($data['mobile'])){
            //     $data['mobile_err'] = 'Please enter mobile number';
            // }

            // Make sure errors are empty
            if ($_SESSION['user']->id) {
                // Validated
                if ($updateAdmin->update( $_SESSION['user']->id,$data)) {
                     $arr['id']=$_SESSION['user']->id;
                    $updateUser = $updateAdmin->first($arr);
                    $_SESSION['user'] = $updateUser;

                    show($data);

                    // Redirect to profile
                    redirect('/admin/profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admin/profile_view', $data);
            }
        }
        // else {
        //     // Init data
        //     $data = [
        //         'name' => '',
        //         'email' => '',
        //         'mobile' => '',
        //         'name_err' => '',
        //         'email_err' => '',
        //         'mobile_err' => ''
        //     ];

        //     // Load view
        //     $this->view('admin/profile_view', $data);
        // }
    }