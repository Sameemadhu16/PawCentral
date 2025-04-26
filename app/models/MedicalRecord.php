<?php

class MedicalRecord
{
    use Model;

    protected $table = 'medical_records';
   
    protected $allowedColumns = [
        'record_id',
        'appointment_id',
        'pet_id',
        'vet_name',
        'owner_id',
        'med_id',
        'diagnosis',
        'treatment',
        'vet_notes',
        'record_added_at'
    ];

    protected $order_column = 'record_added_at';

    public $errors = [];
    
    /**
     * Get all medical records for a specific pet
     * 
     * @param int $petId The ID of the pet
     * @return array Array of medical records
     */
    public function getPetRecords($petId) 
    {
        $query = "SELECT mr.*, ma.date as app_date, v.name as vet_name
                FROM {$this->table} mr
                LEFT JOIN medical_appointments ma ON mr.appointment_id = ma.id
                LEFT JOIN veterinarians v ON mr.vet_name = v.name
                WHERE mr.pet_id = :pet_id
                ORDER BY ma.date DESC";
                
        return $this->query($query, [
            'pet_id' => $petId
        ]);
    }
    
    /**
     * Add a new medical record
     * 
     * @param array $data The record data
     * @return bool True on success, False on failure
     */
    public function addRecord($data) 
    {
        // Validate required data
        if (!isset($data['pet_id']) || !isset($data['diagnosis']) || !isset($data['treatment'])) {
            return false;
        }
        
        // Format the data for insertion
        $recordData = [
            'appointment_id' => $data['appointment_id'] ?? null,
            'pet_id' => $data['pet_id'],
            'vet_name' => $data['vet_name'] ?? null,
            'med_id' => $data['med_id'] ?? null,
            'diagnosis' => $data['diagnosis'],
            'treatment' => $data['treatment'],
            'vet_notes' => $data['vet_notes'] ?? null,
        ];
        
        // Use the insert method from the Model trait
        return $this->insert($recordData);
    }
    
    /**
     * Update an existing medical record
     * 
     * @param int $id The record ID
     * @param array $data The updated data
     * @return bool True on success, False on failure
     */
    public function updateRecord($id, $data) 
    {
        $updateData = [
            'diagnosis' => $data['diagnosis'] ?? null,
            'treatment' => $data['treatment'] ?? null,
            'vet_notes' => $data['vet_notes'] ?? null
        ];
        
        return $this->update($id, $updateData);
    }
    
    /**
     * Delete a medical record
     * 
     * @param int $id The record ID
     * @return bool True on success, False on failure
     */
    public function deleteRecord($id) 
    {
        $query = "DELETE FROM {$this->table} WHERE appointment_id = :appointment_id";
        return $this->query($query, ['appointment_id' => $id]);
    }
}