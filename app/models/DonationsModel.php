<?php

class DonationsModel
{
    use Model;

    // Make sure to change $this->table when using tables 
    protected $donation_req = 'donation_requests';
    protected $donations = 'donations';
    protected $notificationtable = 'notifications_t';
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

    // Public view donation requests - all requests
    public function getViewReq()
    {
        $this->table = $this->donation_req;
        $query = "SELECT * FROM `" . $this->donation_req . "` WHERE status=0 AND approved = 1";

        $result = $this->query($query);
        return $result;
    }
//for pagination for page amount of requests
    public function getTotalRequestsCount() {
        $this->table = $this->donation_req;
        $query = "SELECT COUNT(*) as total_requests FROM `" . $this->table . "` WHERE status=0 AND approved = 1";
        return $this->query($query);
    }
//filter out needed for each page
    public function getViewReqWithPagination($offset, $page_size) {
        $this->table = $this->donation_req;
        $offset = (int)$offset;
        $page_size = (int)$page_size;

        $query = "SELECT * FROM `" . $this->donation_req . "` WHERE status=0 AND approved = 1 ORDER BY requested_at DESC LIMIT $offset, $page_size";
        return $this->query($query);
    }

    public function getDonReq($postid)
    {
        $this->table = $this->donation_req;
        $post = $this->first(['id' => $postid]);
        return $post;
    }

    public function closeReq($id,$data,$where){
        $this->table=$this->donation_req;
        return $this->update($id, $data, 'id');
    }

    public function insertDonation($data)
    {
        $this->table = $this->donations;
        return $this->insert($data) ? true : false;
    }

    public function UpdateReq($id,$data,$id_colName){
        $this->table=$this->donation_req;
        $result=$this->update($id,$data,$id_colName);
        return $result;
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
        $result=$this->query($query, [':amount' => $amount, ':req_id' => $req_id]);

        // $this->table=$this->donation_req ;
        $checkAmount = $this->first(['id' => $req_id]);

        if ($checkAmount->collected >= $checkAmount->amount) {

            $this->closeReqCompleted($req_id);
        }

        return $result;

    }
 

    public function closeReqCompleted($req_id) {
        $this->table = $this->donation_req;
        $query = "UPDATE `" . $this->table . "` SET `status` = 1 WHERE `id` = :req_id";
        $result = $this->query($query, [':req_id' => $req_id]);

        $req = $this->getDonReq($req_id);
        
        // prepare data for notification    
        $noti['title'] = $req->title . ' :Donation Request Completed';
        $noti['user_id'] = $req->user_id;  
        $noti['message'] = 'Good News! your donation request has collected ' . $req->collected .'Rs and completed. It is now closed.';
        $this->addNotification($noti);
        return $result;
    }

    public function addNotification($data) {
        $this->table = $this->notificationtable;
        return $this->insert($data) ? true : false;
    }
    

}