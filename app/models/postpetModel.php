<?php

class PostpetModel{
    use Database;

    public function insertpost($data){
        $query="INSERT INTO pets(tradetype,petname,species,breed,genderneeds,contactname,contactnumber,email)
        VALUES(:tradetype,:petname,:species,:breed<:genderneeds,:contactnumber,:contactname,:email)";
        $this->query($query,$data);
    }
}