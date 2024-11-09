<?php

class Announcement {
    use Model;

    protected $table = 'announcements';

     // Specify allowed columns to prevent unwanted data from being inserted
     protected $allowedColumns = [
        'title',
        'date',
        'description',
        'created_at' // assuming 'created_at' is handled on insert or by default in the database
    ];

    // Insert announcement and return true on success, false on failure
    public function create($data) {
        // Attempt to insert data into the database
        return $this->insert($data) ? true : false;

    }
}
