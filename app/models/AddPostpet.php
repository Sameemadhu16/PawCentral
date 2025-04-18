<?php
class AddPostpet
{
    use Model;

    protected $table = 'selling_posts';
    protected $order_column='pet_id';
    // Define allowed columns as a flat array (no multi-dimensional)
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
        'price',
        'img1',
        'img2',
        'img3',
        'created_at',
        'City',
        'Exact_address',
        'contactName',
        'contactNumber',
        'email',
        'fee_negotiable',
        'agreed_terms',
        'delete_status',
    ];

    public function create($data)
    {
        // Ensure required fields are present
        $requiredFields = ['tradeType', 'petName', 'species', 'contactName', 'contactNumber', 'email'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                throw new Exception("The field '$field' is required.");
            }
        }

        // Validate email format
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address.");
        }

        // Set default values
        $data = array_merge([
            'img1' => null,
            'img2' => null,
            'img3' => null,
            'price' => 0,
            'fee_negotiable' => 0,
            'agreed_terms' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ], $data);

        // Insert data and return the result
        return $this->insert($data);
    }
}
