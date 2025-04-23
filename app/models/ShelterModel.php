<?php

class ShelterModel
{
    use Model;

    protected $table = 'pet_shelters';
    protected $user_table = 'users';
    public $errors = [];

    public function getTotalSheltersCount($location = 'all') {
        $query = "SELECT COUNT(*) as total_shelters FROM `" . $this->table . "` s 
                LEFT JOIN users u ON s.user_id = u.id ";
                //  Add user stts check as a where cond.
        
        if ($location !== 'all') {
            $query .= " Where s.location = :location";
            // print_r(['query'=>$query,'location'=>$location]);
            // exit();
            return $this->query($query, [':location' => $location]);
        }
        return $this->query($query);
    }

    public function getSheltersWithPagination($offset, $page_size, $location = 'all') {
        $offset = (int)$offset;
        $page_size = (int)$page_size;
        
        $query = "SELECT s.*, s.name as shelter_name, s.contact_no as contact_no, u.profile_pic as image 
                 FROM `" . $this->table . "` s 
                 LEFT JOIN users u ON s.user_id = u.id ";
                //  Add user stts check as a where cond.
        
        $params = [];
        
        if ($location !== 'all') {
            $query .= " Where s.location = :location";
            $params[':location'] = $location;
        }
        
        $query .= " ORDER BY s.created_at DESC LIMIT $offset, $page_size";
        return $this->query($query, $params);
    }

    public function getDistinctLocations() {
        $query = "SELECT DISTINCT location FROM `" . $this->table . "` ORDER BY location";
        //  Add user stts check as a where cond.
        return $this->query($query);
    }

}