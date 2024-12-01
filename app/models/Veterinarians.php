<?php

class Veterinarians {
    use Model;

    protected $table = 'veterinarian';

    protected $allowedColumns = [
        'name',
        'image_url',
        'experience',
        'availability'
    ];

    public function create($data) {
        return $this->insert($data) ? true : false;
    }
}
