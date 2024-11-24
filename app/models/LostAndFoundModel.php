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

    public function getPetById($petid)
    {
        $query = "SELECT * FROM $this->table WHERE id = :petid";
        $data = ['petid' => $petid];
        return $this->get_row($query, $data);  // Assuming get_row fetches one record
    }
}
