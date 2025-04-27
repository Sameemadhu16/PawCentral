<?php
class NotificationsController 
{
    use Controller;

    public function index()
    {
        if(!($_SESSION['user_id'])){
            
            redirect('home');
        }
        // Initialize the model
        $model = new NotificationsModel();

        // Retrieve all pets
        $data['notifications'] = $model->getNotifications($_SESSION['user_id']);
        
         // Process images: convert binary `img1` data to Base64-encoded string
        // print_r($data);
        // exit();
        
        // Pass data to the view
        // print_r($_SESSION);
        // exit();
        $this->view('user/notification', $data);
    }

    public function fetchNewNotifications()
    {
        if (!isset($_SESSION['user_id'])) {
            echo json_encode([]);
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $model = new NotificationsModel();

        // Make sure you pass $user_id to the model!
        $notifications = $model->getUnreadNotifications($user_id); 

        // Debug - Uncomment if needed
        // echo '<pre>'; print_r($notifications); echo '</pre>'; exit;

        echo json_encode($notifications);
        exit;
    }


    public function markAllRead()
    {
        if (!isset($_SESSION['user_id'])) return;
        $user_id = $_SESSION['user_id'];
        $model = new NotificationsModel();
        $model->markAsRead($user_id);

        redirect('userprofile/notifications');
    }

    public function markNotiRead($get_data) //fetch the id from GET and update as read
    {
        $noti_id = $get_data['post_id'];
        print_r($noti_id);
        // exit();
        if (!isset($_SESSION['user_id'])) return;
        $user_id = $_SESSION['user_id'];
        $model = new NotificationsModel();
        $model->markNotiAsRead($user_id,$noti_id); 
        // mark only the correct notification using new func in model
        
        redirect('userprofile/notifications');
    }
}
