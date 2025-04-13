<?php

class Med_Services {
    use Model;

    protected $table = 'medical_services';
    protected $order_column = 'service_id';

    protected $allowedColumns = [
        'service_id',
        'service_name',
    ];

    public function create($data) {
        return $this->insert($data) ? true : false;
    }
}
