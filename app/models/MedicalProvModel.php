<?php

class MedicalProvModel
{
    use Model;

    protected $table = 'medical_providers';
   

    protected $allowedColumns = [
        'user_id',
        'med_id',
        'name',
        'img',
        'license_proof',
        'location',
        'contact_no',
        'services',
        'about_us',
        'verifiedStatus'
    ];

    protected $order_column = 'created_at';

    public $errors = [];

    public function getTotalMedsCount($location = 'all', $medical_Name = 'all') {
        $query = "SELECT COUNT(*) as total_Meds FROM `" . $this->table . "` m 
                LEFT JOIN users u ON m.user_id = u.id WHERE u.status='active' AND m.verifiedStatus = 'approved'";
        
        $params = [];
        
        if ($location !== 'all') {
            $query .= " AND m.location = :location";
            $params[':location'] = $location;
        }
        
        if ($medical_Name !== 'all') {
            $query .= " AND m.name = :medical_Name";
            $params[':medical_Name'] = $medical_Name;
        }
        
        return $this->query($query, $params);
    }

    public function getMedsWithPagination($offset, $page_size, $location = 'all', $medical_Name = 'all') {
        $offset = (int)$offset;
        $page_size = (int)$page_size;
        
          $query = "SELECT m.*, m.name as med_Name, m.img as image 
                 FROM `" . $this->table . "` m 
                 LEFT JOIN users u ON m.user_id = u.id WHERE u.status='active' AND m.verifiedStatus = 'approved'";
        
        $params = [];
        
        if ($location !== 'all') {
            $query .= " AND m.location = :location";
            $params[':location'] = $location;
        }
        
        if ($medical_Name !== 'all') {
            $query .= " AND m.name = :medical_Name";
            $params[':medical_Name'] = $medical_Name;
        }
        
        $query .= " ORDER BY m.created_at DESC LIMIT $offset, $page_size";
        return $this->query($query, $params);
    }

    public function getDistinctLocations() {
        $query = "SELECT DISTINCT location FROM `" . $this->table . "` WHERE verifiedStatus = 'approved'  ORDER BY location";
        //  Add user stts check as a where cond.
        return $this->query($query);
    }

    public function getDistinctNames() {
        $query = "SELECT DISTINCT m.name FROM `" . $this->table . "` m LEFT JOIN users u ON m.user_id = u.id WHERE u.status='active' AND m.verifiedStatus = 'approved' ORDER BY m.name";
        return $this->query($query);
    }

}