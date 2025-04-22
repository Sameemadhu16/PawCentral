<?php

class AdoptionPostModel{
   
    use Model;

    protected $table = 'adoption_posts';
    protected $order_column = 'created_at';

    public $errors = [];

    // protect

    public function getUserPosts()
    {
        $userId = $_SESSION['role_id']; // Retrieve userId from session

        // Fetch rows from the table where user_id matches the session user and status is not 3
        $query = "SELECT * FROM `" . $this->table . "` WHERE `shelter_id` = :userid";

        $result = $this->query($query, [':userid' => $userId]);

        return $result;
    }


    public function addPost($data) {
        return $this->insert($data) ? true : false;
    }

    public function getPostDetailsById($conditions = [])
    {
        // $this->table = $this->donation_req;

        $query = "SELECT * FROM `" . $this->table . "`";
        $params = [];

        if (!empty($conditions)) {
            $query .= " WHERE ";
            $clauses = [];
            foreach ($conditions as $column => $value) {
                $clauses[] = "`$column` = :$column";
                $params[":$column"] = $value;
            }
            $query .= implode(" AND ", $clauses);
        }

        return $this->query($query, $params);
    }


}

