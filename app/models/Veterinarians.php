<?php

class Veterinarians {
    use Model;

    protected $table = 'veterinarians';

    protected $allowedColumns = [
        'name',
        'img',
        'experience',
        'availability',
        'med_id'
    ];

    public function create($data) {
        return $this->insert($data) ? true : false;
    }
}
