<?php

class PostPetModel{
    use Database;

    public function insertPost($data){
        $query="INSERT INTO pets(tradeType,petName,species,breed,genderNeeds,contactName,contactNumber,email)
        VALUES(:tradeType,:petName,:species,:breed,:genderNeeds,:contactNumber,:contactName,:email)";
        $this->query($query,$data);
    }
}