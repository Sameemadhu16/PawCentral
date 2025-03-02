<?php
class AddPostpet
{
    use Model;

    protected $table = 'selling_posts'; // Default table, can be overridden

    protected $allowedColumns = [
        'pet_id',
        'merchant_id',
        'merchant_ref_id',
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
        // Fields for importing
        'country',
        'import_fees',
        'importing_owner',
        'transport_method',
        'importer_mobile',
        // Fields for renting
        'rental_duration',
        'rental_fee',
        'renter_name',
        'renter_contact',
        'renter_address',
        'rental_status',
        'agreed_terms',
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
        $defaults = [
            'img1' => null,
            'img2' => null,
            'img3' => null,
            'price' => 0,
            'import_fees' => 0,
            'rental_fee' => 0,
            'agreed_terms' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $data = array_merge($defaults, $data);

        // Determine the table based on tradeType
        $tradeType = strtolower($data['tradeType']);
        if ($tradeType === 'selling') {
            $this->table = 'selling_posts';
        } elseif ($tradeType === 'importing') {
            $this->table = 'import_posts';
        } elseif ($tradeType === 'renting') {
            $this->table = 'rent_posts';
        } else {
            throw new Exception("Invalid trade type.");
        }

        // Filter data to match the allowed columns for the selected table
        $filteredData = array_intersect_key($data, array_flip($this->allowedColumns));

        // Insert data and return the result
        return $this->insert($filteredData);
    }
}