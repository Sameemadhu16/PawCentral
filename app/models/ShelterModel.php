<?php

class ShelterModel
{
    use Model;

    protected $table = 'pet_shelters';
    public $errors = [];

    public function getShelterById($userId) {
        $query = "SELECT * FROM `" . $this->table . "` WHERE `user_id` = :user_id"; // Use `user_id` as the foreign key
        return $this->query($query, [':user_id' => $userId])[0] ?? null;
    }

    public function updateByUserId($userId, $data) {
        $query = "UPDATE `" . $this->table . "` SET ";
        $fields = [];
        $params = [':user_id' => $userId];

        foreach ($data as $column => $value) {
            $fields[] = "`$column` = :$column";
            $params[":$column"] = $value;
        }

        $query .= implode(", ", $fields) . " WHERE `user_id` = :user_id";
        return $this->query($query, $params);
    }
}