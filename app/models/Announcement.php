<?php

class Announcement {
    use Model;

    protected $table = 'announcements';

    // Insert announcement and return true on success, false on failure
    public function create($data) {
        // Attempt to insert data into the database
        return $this->insert($data) ? true : false;

    }
}
