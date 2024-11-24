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
}
