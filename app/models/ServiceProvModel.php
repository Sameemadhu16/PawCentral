<?php

class ServiceProvModel
{
    use Model;

    protected $table = 'service_providers';
    public $errors = [];
    protected $allowedColumns=[
        'user_id',
        'name',
        'service_type',
        'Areas',
        'open_hour',
        'closing_hour',
        'available_days',
        'description',
        'registered_on'
        
    ];
    public function updateByUserId($user_id, $data)
{
    $query = "UPDATE service_providers SET 
                name = :name,
                service_type = :service_type,
                Areas = :Areas,
                open_hour = :open_hour,
                closing_hour = :closing_hour,
                description = :description
              WHERE user_id = :user_id";

    $data['user_id'] = $user_id;

    return $this->query($query, $data);
}

}