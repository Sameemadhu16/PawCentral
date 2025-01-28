<?php

trait Model
{
    use Database;
    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "id";

    // Generic get function for retrieving data with flexible options
    public function get($conditions = [], $options = [])
    {
        // Default query
        $query = "SELECT * FROM $this->table";
        $data = [];

        // Add WHERE clause if conditions are specified
        if (!empty($conditions)) {
            $keys = array_keys($conditions);
            $query .= " WHERE ";

            foreach ($keys as $key) {
                $query .= "$key = :$key AND ";
            }

            $query = rtrim($query, " AND ");
            $data = $conditions;
        }

        // Apply order and pagination options
        $order_column = $options['order_column'] ?? $this->order_column;
        $order_type = $options['order_type'] ?? $this->order_type;
        $limit = $options['limit'] ?? $this->limit;
        $offset = $options['offset'] ?? $this->offset;

        $query .= " ORDER BY $order_column $order_type LIMIT $limit OFFSET $offset";

        // Execute query and return result
        return $this->query($query, $data);
    }

    public function findAll()
    {
        return $this->get();
    }

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = rtrim($query, " AND ");

        $query .= " ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }

    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = rtrim($query, " AND ");
        $query .= " LIMIT 1";
        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);

        return $result ? $result[0] : false;
    }

    public function insert($data)
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";

        $result = $this->query($query, $data);

        return $result !== false;
    }

    public function update($id, $data, $id_column = 'id')
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $query .= "$key = :$key, ";
        }

        $query = rtrim($query, ", ");
        $query .= " WHERE $id_column = :$id_column";

        $data[$id_column] = $id;
        return $this->query($query, $data) !== false;
    }

    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";

        return $this->query($query, $data) !== false;
    }
    
    public function getRoleIdById($id)
    {
        return $this->first(['user_id' => $id]);
    }
}


