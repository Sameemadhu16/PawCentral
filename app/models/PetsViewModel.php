<?php

class PetsViewModel
{
    use Model;

    protected $sell_table = 'selling_posts';
    protected $rent_table = 'rent_posts';
    protected $adopt_table = 'adoption_posts';
    protected $import_table = 'import_posts';

    // protected $allowedColumns = [
    //     'user_id',
    //     'med_id',
    //     'name',
    //     'img',
    //     'license_proof',
    //     'location',
    //     'contact_no',
    //     'services',
    //     'about_us',
    //     'verifiedStatus'
    // ];

    protected $order_column = 'created_at';

    public $errors = [];

    public function getTotalPostsCount($post_type = 'all', $location = 'all') {
        $query = "";
        $params = [];

        if ($post_type === 'all') {
            $query = "SELECT COUNT(*) as total_posts FROM (
                SELECT pet_id FROM {$this->sell_table} WHERE delete_status = 0
                UNION ALL
                SELECT pet_id FROM {$this->rent_table} WHERE delete_status = 0
                UNION ALL
                SELECT pet_id FROM {$this->adopt_table} WHERE is_deleted = 0 AND status = 0
                UNION ALL
                SELECT pet_id FROM {$this->import_table} WHERE delete_status = 0
            ) as combined_posts";
        } else {
            $table = $this->getTableName($post_type);
            $query = "SELECT COUNT(*) as total_posts FROM {$table}";
            
            if ($post_type === 'adopt') {
                $query .= " LEFT JOIN pet_shelters ps ON {$table}.shelter_id = ps.id";
            }
            
            $query .= " WHERE ";
            if ($post_type === 'adopt') {
                $query .= "{$table}.is_deleted = 0 AND {$table}.status = 0";
            } else {
                $query .= "{$table}.delete_status = 0";
            }
        }

        if ($location !== 'all') {
            if ($post_type === 'all') {
                $query = "SELECT COUNT(*) as total_posts FROM (
                    SELECT pet_id FROM {$this->sell_table} WHERE delete_status = 0 AND city = :location
                    UNION ALL
                    SELECT pet_id FROM {$this->rent_table} WHERE delete_status = 0 AND renter_address = :location
                    UNION ALL
                    SELECT a.pet_id FROM {$this->adopt_table} a 
                    LEFT JOIN pet_shelters ps ON a.shelter_id = ps.id 
                    WHERE a.is_deleted = 0 AND a.status = 0 AND ps.location = :location
                    UNION ALL
                    SELECT pet_id FROM {$this->import_table} WHERE delete_status = 0 AND country = :location
                ) as combined_posts";
            } else {
                $table = $this->getTableName($post_type);
                $location_field = $this->getLocationField($post_type);
                
                if ($post_type === 'adopt') {
                    $query = "SELECT COUNT(*) as total_posts FROM {$table} a 
                             LEFT JOIN pet_shelters ps ON a.shelter_id = ps.id 
                             WHERE a.is_deleted = 0 AND a.status = 0 AND ps.location = :location";
                } else {
                    $query .= " AND {$location_field} = :location";
                }
            }
            $params[':location'] = $location;
        }

        return $this->query($query, $params);
    }

    public function getPostsWithPagination($offset, $page_size, $post_type = 'all', $location = 'all') {
        $offset = (int)$offset;
        $page_size = (int)$page_size;
        $params = [];

        if ($post_type === 'all') {
            $query = "SELECT 
                'selling' AS post_type,
                s.created_at,
                s.pet_id,
                s.petName,
                s.breed,
                s.city AS location,
                s.price,
                NULL AS shelter_id,
                NULL AS shelter_name,
                NULL AS adopt_img,
                s.img1 AS img
            FROM 
                {$this->sell_table} s 
            WHERE 
                s.delete_status = 0";

            if ($location !== 'all') {
                $query .= " AND s.city = :location1";
                $params[':location1'] = $location;
            }

            $query .= " UNION ALL

            SELECT 
                'rent' AS post_type,
                r.created_at,
                r.pet_id,
                r.petName,
                r.breed,
                r.renter_address AS location,
                r.rental_fee AS price,
                NULL AS shelter_id,
                NULL AS shelter_name,
                NULL AS adopt_img,
                r.img1 AS img
            FROM 
                {$this->rent_table} r 
            WHERE 
                r.delete_status = 0";

            if ($location !== 'all') {
                $query .= " AND r.renter_address = :location2";
                $params[':location2'] = $location;
            }

            $query .= " UNION ALL

            SELECT 
                'adoption' AS post_type,
                a.created_at,
                a.pet_id,
                a.name AS petName,
                a.breed,
                ps.location,
                NULL AS price,
                a.shelter_id,
                ps.name AS shelter_name,
                a.postimg1 AS adopt_img,
                NULL AS img
            FROM 
                {$this->adopt_table} a
            LEFT JOIN 
                pet_shelters ps ON a.shelter_id = ps.id 
            WHERE 
                a.is_deleted = 0 AND a.status = 0";

            if ($location !== 'all') {
                $query .= " AND ps.location = :location3";
                $params[':location3'] = $location;
            }

            $query .= " UNION ALL

            SELECT 
                'import' AS post_type,
                i.created_at,
                i.pet_id,
                i.petName,
                i.breed,
                i.country AS location,
                i.import_fees AS price,
                NULL AS shelter_id,
                NULL AS shelter_name,
                NULL AS adopt_img,
                i.img1 AS img
            FROM 
                {$this->import_table} i 
            WHERE 
                i.delete_status = 0";

            if ($location !== 'all') {
                $query .= " AND i.country = :location4";
                $params[':location4'] = $location;
            }

            $query .= " ORDER BY created_at DESC LIMIT $offset, $page_size";
        } else {
            $table = $this->getTableName($post_type);
            $name_field = $post_type === 'adopt' ? 'a.name' : 'petName';
            $price_field = $post_type === 'rent' ? 'rental_fee' : ($post_type === 'import' ? 'import_fees' : ($post_type === 'sell' ? 'price' : 'NULL'));
            $location_field = $this->getLocationField($post_type);

            if ($post_type === 'adopt') {
                $query = "SELECT 
                    'adoption' AS post_type,
                    a.created_at,
                    a.pet_id,
                    a.name AS petName,
                    a.breed,
                    ps.location,
                    NULL AS price,
                    a.shelter_id,
                    ps.name AS shelter_name,
                    a.postimg1 AS adopt_img,
                    NULL AS img
                FROM 
                    {$table} a
                LEFT JOIN 
                    pet_shelters ps ON a.shelter_id = ps.id 
                WHERE 
                    a.is_deleted = 0 AND a.status = 0";
            } else {
                $query = "SELECT 
                    '{$post_type}' AS post_type,
                    created_at,
                    pet_id,
                    {$name_field} AS petName,
                    breed,
                    {$location_field} AS location,
                    {$price_field} AS price,
                    NULL AS shelter_id,
                    NULL AS shelter_name,
                    NULL AS adopt_img,
                    img1 AS img
                FROM 
                    {$table}";
            }

            if ($location !== 'all') {
                if ($post_type === 'adopt') {
                    $query .= " AND ps.location = :location";
                } else {
                    $query .= " WHERE {$location_field} = :location";
                }
                $params[':location'] = $location;
            }

            $query .= " ORDER BY created_at DESC LIMIT $offset, $page_size";
        }

        $results = $this->query($query, $params);
        
        // Process adoption post images
        if (!empty($results)) {
            foreach ($results as &$post) {
                if ($post->post_type === 'adoption' && !empty($post->adopt_img)) {
                    // Convert binary image data to base64
                    $post->adopt_img = 'data:image/jpeg;base64,' . base64_encode($post->adopt_img);
                }
            }
        }

        return $results;
    }

    public function getDistinctLocations() {
        $query = "SELECT DISTINCT location FROM (
            SELECT city AS location FROM {$this->sell_table} WHERE delete_status = 0
            UNION ALL
            SELECT renter_address AS location FROM {$this->rent_table} WHERE delete_status = 0
            UNION ALL
            SELECT location FROM pet_shelters ps 
            JOIN {$this->adopt_table} a ON ps.id = a.shelter_id 
            WHERE a.is_deleted = 0 AND a.status = 0
            UNION ALL
            SELECT country AS location FROM {$this->import_table} WHERE delete_status = 0
        ) as all_locations ORDER BY location";

        $result = $this->query($query);
        return array_column($result, 'location');
    }

    private function getLocationField($post_type) {
        switch ($post_type) {
            case 'sell':
                return 'city';
            case 'rent':
                return 'renter_address';
            case 'adopt':
                return 'ps.location';
            case 'import':
                return 'country';
            default:
                return '';
        }
    }

    private function getTableName($post_type) {
        switch ($post_type) {
            case 'sell':
                return $this->sell_table;
            case 'rent':
                return $this->rent_table;
            case 'adopt':
                return $this->adopt_table;
            case 'import':
                return $this->import_table;
            default:
                return '';
        }
    }
}