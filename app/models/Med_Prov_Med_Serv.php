<?php

class Med_Prov_Med_Serv {
    use Model;

    protected $table = 'med_prov_med_serv';
    protected $order_column = 'service_id';

    protected $allowedColumns = [
        'med_id',
        'service_id',
    ];

    public function create($data) {
        return $this->insert($data) ? true : false;
    }
}
