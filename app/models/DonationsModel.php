<?php

class DonationsModel
{
    use Model;

// Make sure to change $this->table when using tables 
    protected $donation_req = 'donation_requests';
    protected $donations = 'donations';
    public $table;

    public function getUserReq()
    {
        $userId = $_SESSION['user_id'];

    $query = "SELECT * FROM `" . $this->donation_req . "` WHERE `user_id` = :userid ";  // AND approved=1 to filter ?

    $result = $this->query($query, [':userid' => $userId]);
    return $result;
    }

    
    public function addReq($data) {
        $this->table = $this->donation_req;
        return $this->insert($data) ? true : false;
    }

    public function closeReq($id,$data,$where){
        $this->table=$this->donation_req;
        return $this->update($id, $data, 'id');
    }

    // Public view donation requests | edit this to get the results for just the page number
    public function getViewReq()
    {
    $this->table=$this->donation_req;
    $query = "SELECT * FROM `" . $this->donation_req . "` WHERE status=0 AND approved = 1";

    $result = $this->query($query);
    return $result;
    }

    public function getDonReq($postid)
    {
    $this->table=$this->donation_req;
    $post = $this->first(['id' => $postid]);
        return $post;

    }

    public function insertDonation($data) {
        $this->table = $this->donations;
        return $this->insert($data) ? true : false;
    }

    public function getDonations($conditions = []) {
        $this->table = $this->donation_req;

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
    
    public function updateReq_amount($amount,$req_id){
        $query = "UPDATE donation_requests SET collected = collected + :amount WHERE id = :req_id";

        $this->table=$this->donation_req ;
        return $this->query($query, [':amount' => $amount, ':req_id' => $req_id]);
        // return $result;

    }

}