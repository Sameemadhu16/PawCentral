<?php

// this is used in the Model.php to create Model class
trait Database {

    //create Connection with the database
    private function connect(){
        $string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;
        $con = new PDO($string,DBUSER,DBPASS);
        
        // Set max_allowed_packet for the session (32MB in this case)
        $con->exec("SET GLOBAL max_allowed_packet=33554432");

        return $con;


    }

    // get all the results
    public function query($query, $data = []) {
        $con = $this->connect();
        $stmt = $con->prepare($query);
    
        // Debugging: Print the query and data for inspection
    // echo "Query: $query\n";
    // echo "Data: ";
    // print_r($data);
    
        $check = $stmt->execute($data);
    
        // If the query was successful, check if we are fetching data or simply returning a success result
        if ($check) {
            // If it's a SELECT statement, fetch and return the result
            if (stripos($query, 'select') === 0) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            // For non-SELECT statements (like INSERT, UPDATE, DELETE), just return true
            return true;
        }
    
        // If the query failed, return false and optionally display error info for debugging
        var_dump($stmt->errorInfo()); // Debugging line (optional)
        return false;
    }
    

    // get one result or the first result
    public function get_row($query,$data = []){
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);
        if($check){
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
        }

        if(is_array($result) && count($result)){
            return $result[0];
        }

        return false;
    }
}
