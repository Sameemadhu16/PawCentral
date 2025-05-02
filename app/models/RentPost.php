<?php
class RentPost
{
    use Model;
    protected $table = 'rent_posts';
    protected $order_column='pet_id';
    protected $allowedColumns = [
        'pet_id',
        'merchant_id',
        'petName',
        'tradeType',
        'species',
        'breed',
        'sex',
        'age',
        'height',
        'weight',
        'neutered',
        'trained',
        'pedigree',
        'vaccinated',
        'rental_fee',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'description',
        'created_at',
        'contactName',
        'contactNumber',
        'renter_contact',
        'renter_address',
        'rental_duration',
        'renter_name',
        'email',
        'agreed_terms',
        'delete_status'
    ];

    public function create($data){
        $requiredFields = ['tradeType', 'petName', 'species', 'contactName', 'contactNumber', 'email'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                throw new Exception("The field '$field' is required.");
            }
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address.");
        }
        return $this->insert($data);
    }

}
