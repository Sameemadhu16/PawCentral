<?php

class LostAndFoundModel
{
    use Model;

    protected $table = 'lost_and_found_pets';

    public function getViewPosts()
    {
        // Fetch all rows from the `lostandfound` table
        $query = "SELECT * FROM `" . $this->table . "` WHERE `postStatus` = 0"; //get only the unmarked pets
        $result = $this->query($query);

    $result = $this->query($query);
        //$print=$_SESSION['user_id'];
        // echo "$print";
    return $result;
    }

    public function getAllPets()
    {
        // Fetch all rows from the `lostandfound` table
        // $query = "SELECT * FROM " . $this->table;
        $query = "SELECT * FROM `" . $this->table . "` WHERE `postStatus` = 0"; //get only the unmarked pets
        $result = $this->query($query);


        $userId = $_SESSION['user_id']; // Retrieve userId from session
        

        // $userId =2;
    // Fetch rows from the table where status = 0 and userid matches
    $query = "SELECT * FROM `" . $this->table . "` WHERE `id` = :userid";

    $result = $this->query($query, [':userid' => $userId]);
        //$print=$_SESSION['user_id'];
        // echo "$print";
    return $result;
    }

    public function updateStatus($id,$updatestatus)
    {
        $data[$id] = $id;
        $data[$updatestatus] = $updatestatus;
        $query = "UPDATE $this->table SET postStatus = :updatestatus WHERE petid=:id";

        return $this->query($query, $data) !== false;
    }

    public function create($data) {
        return $this->insert($data) ? true : false;
    }

    //for pagination for page amount of requests
    public function getTotalRequestsCount($status = 'all') {
        $query = "SELECT COUNT(*) as total_requests FROM `" . $this->table . "` WHERE postStatus = 0";
        if ($status !== 'all') {
            $query .= " AND status = :status";
            return $this->query($query, [':status' => $status]);
        }
        return $this->query($query);
    }

    //filter out needed for each page
    public function getViewReqWithPagination($offset, $page_size, $status = 'all') {
        $offset = (int)$offset;
        $page_size = (int)$page_size;
        
        $query = "SELECT * FROM `" . $this->table . "` WHERE postStatus = 0";
        $params = [];
        
        if ($status !== 'all') {
            $query .= " AND status = :status";
            $params[':status'] = $status;
        }
        
        $query .= " ORDER BY publishedOn DESC LIMIT $offset, $page_size";
        // print_r($query);
        // exit();
        return $this->query($query, $params);
    }

}
