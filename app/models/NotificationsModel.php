<?php
class NotificationsModel 
{
    use Model;
    protected $table = 'notifications_t';

    public function sendNotification($to,$title,$message){
        $notificationQuery = "INSERT INTO $this->table (user_id, title, message) 
                                      VALUES (:receiver_id, :title, :message)";

        $this->query($notificationQuery, [
            'receiver_id' => $to,
            'title' => $title,
            'message' => $message
        ]);
    }

    public function getUnreadNotifications($user_id)
    {
        $query = "SELECT * FROM $this->table WHERE user_id = :user_id AND is_read = 0 ORDER BY created_at DESC LIMIT 15";
        return $this->query($query, ['user_id' => $user_id]);
    }

    public function getNotifications($user_id)
    {
        $query = "SELECT * FROM $this->table WHERE user_id = :user_id ORDER BY created_at DESC";
        return $this->query($query, ['user_id' => $user_id]);
    }

    public function markAsRead($user_id)
    {
        $query = "UPDATE $this->table SET is_read = 1 WHERE user_id = :user_id";
        return $this->query($query, ['user_id' => $user_id]);
    }

    public function markNotiAsRead($user_id, $noti_id)
    {
        $query = "UPDATE $this->table SET is_read = 1 WHERE user_id = :user_id AND id = :noti_id";
        return $this->query($query, ['user_id' => $user_id,'noti_id' => $noti_id]);
    }

    public function insertNotification($user_id, $message)
    {
        $query = "INSERT INTO $this->table (user_id, message) VALUES (:user_id, :message)";
        return $this->query($query, [
            'user_id' => $user_id,
            'message' => $message
        ]);
    }

    // public function sendNotification($user_id, $title, $message)
    // {
    //     $query = "INSERT INTO $this->table (user_id, message,title) VALUES (:user_id, :message, :title)";
    //     return $this->query($query, [
    //         'user_id' => $user_id,
    //         'message' => $message,
    //         'title' => $title
    //     ]);
    // }
}
