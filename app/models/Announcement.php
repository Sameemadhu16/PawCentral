<?php
ini_set('memory_limit', '1024M');

class Announcement {
    use Model;

    protected $table = 'announcements';

   
    protected $allowedColumns = [
        'title',
        'date',
        'content',
        'user_id', 
        'updated_at',
        'status'
    ];

    public function create($data) {
        return $this->insert($data) ? true : false;
    }

    public function getViewAnnouncements() {
        $query = "SELECT * FROM {$this->table} WHERE status=0 ORDER BY created_at DESC LIMIT 5";
    
        return $this->query($query);
    }

    
}
