<?php
class NotificationsModel 
{
    use Model;
    protected $table = 'notifications_t';

    public function getUnreadNotifications($user_id)
    {
        $query = "SELECT * FROM $this->table WHERE user_id = :user_id AND is_read = 0 ORDER BY created_at DESC";
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
}
