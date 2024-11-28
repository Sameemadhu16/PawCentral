<?php
class AddPostpet
{
    use Model;

    protected $table = 'post_pet';

    protected $allowedColumns = [
        'id',
        'tradeType',
        'petName',
        'species',
        'breed',
        'genderNeeds',
        'contactName',
        'contactNumber',
        'email',
        'image_path',
        'price',
        'feebox',
        'termsAccepted',
        'city',
        'address'
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
            'image_path' => null,
            'price' => 0,
            'feebox' => 0
        ];
    
        $data = array_merge($defaults, $data);
        $filteredData = array_intersect_key($data, array_flip($this->allowedColumns));
    
        // Insert data and return the result
        return $this->insert($filteredData);
    }
}