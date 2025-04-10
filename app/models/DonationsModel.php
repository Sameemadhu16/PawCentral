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

    $query = "SELECT * FROM `" . $this->donation_req . "` WHERE `user_id` = :userid AND status=0";

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

    // Public view donation requests
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

}