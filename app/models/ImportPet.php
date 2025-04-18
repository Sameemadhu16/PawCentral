<?php
class ImportPet
{
    use Model;
    protected $table = 'import_posts';
    protected $order_column='pet_id';
    protected $allowedColumns = [
        'pet_id',
        'merchant_id',
        'pet_name',
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
        'contactName',
        'contactNumber',
        'import_fees',
        'img1',
        'img2',
        'img3',
        'created_at',
        'country',
        'importing_owner',
        'transport_method',
        'importer_mobile',
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
