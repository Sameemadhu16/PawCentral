<?php
// ADD THE DATABASE MEHTODS
class Model{

    use Database;

    // get all the ressults
    public function where($data){
        $query="select * fro users where id = :id ";
        $this->query($query,['id'=>2]);
    }
    
    public function first($data){
        $query = "select * from users";
        $result = $this->query($query);
    }

    public function insert($data){
        $query = "select * from users";
        $result = $this->query($query);
    }

    public function update($id, $data,  $id_column='id'){
        $query = "select * from users";
        $result = $this->query($query);
    }

}