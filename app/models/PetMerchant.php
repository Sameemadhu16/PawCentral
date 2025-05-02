<?php
class PetMerchant {
    use Model;

    protected $table = 'pet_merchant';

    protected $allowedColumns = [
        'user_id',
        'merchant_name',
        'address',
        'location',
    ];

    public function updateByUserId($user_id, $data)
    {
        $query = "UPDATE pet_merchant SET 
                    merchant_name = :merchant_name,
                    location = :location,
                    address = :address
                  WHERE user_id = :user_id";

        $data['user_id'] = $user_id;

        return $this->query($query, $data);
    }
}