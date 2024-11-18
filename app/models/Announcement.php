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
        'updated_at'
    ];

    // Insert announcement and return true on success, false on failure
    public function create($data) {
        // Attempt to insert data into the database
        return $this->insert($data) ? true : false;
    }

    public function update($id, $data) {
        return $this->update($id, $data);
    }
}
