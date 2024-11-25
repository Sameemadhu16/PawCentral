<?php

class Veterinarians {
    use Model;

    protected $table = 'veterinarian';

    // Specify allowed columns to prevent unwanted data from being inserted
    protected $allowedColumns = [
        'name',
        'image-url',
        'experience',
        'availability'
        // 'updated_at'
    ];

    public function create($data) {
        return $this->insert($data) ? true : false;
    }

    // Update announcement by ID
    // public function update($id, $data) {
    //     return parent::update($id, $data); // Call the update function from the Model trait
    // }
}
