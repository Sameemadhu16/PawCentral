<?php
class Shops{
    use Model;
    protected $table='service_providers';
    protected $user_table='users';
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

    public function getTotalShopsCount($location = 'all', $service_type = 'all') {
        $query = "SELECT COUNT(*) as total_shops FROM `" . $this->table . "` s 
                LEFT JOIN users u ON s.user_id = u.id WHERE u.status='active'";
        
        $params = [];
        
        if ($location !== 'all') {
            $query .= " AND s.Areas = :location";
            $params[':location'] = $location;
        }
        
        if ($service_type !== 'all') {
            $query .= " AND s.service_type = :service_type";
            $params[':service_type'] = $service_type;
        }
        
        return $this->query($query, $params);
    }

    public function getShopsWithPagination($offset, $page_size, $location = 'all', $service_type = 'all') {
        $offset = (int)$offset;
        $page_size = (int)$page_size;
        
          $query = "SELECT s.*, s.name as Shop_name, u.mobile_no as contact_no, s.open_hour as open_hours, s.closing_hour as closing_hours, u.profile_pic as image 
                 FROM `" . $this->table . "` s 
                 LEFT JOIN users u ON s.user_id = u.id WHERE u.status='active'";
        
        $params = [];
        
        if ($location !== 'all') {
            $query .= " AND s.Areas = :location";
            $params[':location'] = $location;
        }
        
        if ($service_type !== 'all') {
            $query .= " AND s.service_type = :service_type";
            $params[':service_type'] = $service_type;
        }
        
        $query .= " ORDER BY s.registered_on DESC LIMIT $offset, $page_size";
        return $this->query($query, $params);
    }

    public function getDistinctLocations() {
        $query = "SELECT DISTINCT Areas FROM `" . $this->table . "` ORDER BY Areas";
        //  Add user stts check as a where cond.
        return $this->query($query);
    }

    public function getDistinctServiceTypes() {
        $query = "SELECT DISTINCT service_type FROM `" . $this->table . "` WHERE service_type IS NOT NULL AND service_type != '' ORDER BY service_type";
        return $this->query($query);
    }

}