<?php
ini_set('memory_limit', '1024M');

class Announcement {
    use Model;

    protected $table = 'announcements';

    // Specify allowed columns to prevent unwanted data from being inserted
    protected $allowedColumns = [
        'title',
        'date',
        'content',
        'user_id', // added 'user_id'
        'updated_at',
        'status'
    ];

    // Insert announcement and return true on success, false on failure
    public function create($data) {
        return $this->insert($data) ? true : false;
    }

    // Update announcement by ID
    // public function update($id, $data) {
    //     return parent::update($id, $data); // Call the update function from the Model trait
    // }

    public function getViewAnnouncements() {
        $query = "SELECT * FROM {$this->table} WHERE status=0 ORDER BY created_at DESC LIMIT 5";
        // print_r($this->query($query));
        // exit();
        return $this->query($query);
    }
}
