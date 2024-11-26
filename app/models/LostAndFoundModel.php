<?php

class LostAndFoundModel
{
    use Model;

    protected $table = 'lostandfound';

    public function getAllPets()
    {
        // Fetch all rows from the `lostandfound` table
        $query = "SELECT * FROM " . $this->table;
        $result = $this->query($query);

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

}
