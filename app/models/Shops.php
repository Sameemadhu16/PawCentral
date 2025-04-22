<?php
class Shops{
    use Model;
    protected $table='service_providers';
    protected $order_column='id';
    protected $allowedColumns=[
        'user_id',
        'name',
        'service_type',
        'Areas',
        'open_hours',
        'closing_hours',
        'available_days',
        'description',
        'registered_on',
    ];
}