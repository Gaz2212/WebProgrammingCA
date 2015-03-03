<?php

class BusTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getBus() {
        // execute a query to get all programmers
        $sqlQuery = "SELECT * FROM bus";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve users");
        }
        
        return $statement;
    }
    
    public function getBusById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM bus WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve bus");
        }
        
        return $statement;
    }
    
    public function insertBus($r, $m, $s, $e, $d, $n) {
        $sqlQuery = "INSERT INTO bus " .
                "(registration, makeModel, seats, engine, dateBought, nextService) " .
                "VALUES (:registration, :makeModel, :seats, :engine, :dateBought, :nextService)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "registration" => $r,
            "makeModel" => $m,
            "seats" => $s,
            "engine" => $e,
            "dateBought" => $d,
            "nextService" => $n
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert bus");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    public function deleteBus($id) {
        $sqlQuery = "DELETE FROM bus WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete bus");
        }

        return ($statement->rowCount() == 1);
    }

    //function to update the bus
    public function updateBus($r, $m, $s, $e, $d, $n) {
        $sqlQuery = "UPDATE bus SET " .
                "registration = :registration, " .
                "makeModel = :makeModel, " .
                "seats = :seats, " .
                "engine = :engine, " .
                "dateBought = :dateBought " .
                "nextService = :nextService " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "registration" => $r,
            "makeModel" => $m,
            "seats" => $s,
            "engine" => $e,
            "dateBought" => $d,
            "nextService" => $n,
            "id" => $id
        );

        /* echo '<pre>';
          print_r($params );
          echo '</pre>'; */

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}

