<?php
//creating the bus including all information needed
class Bus {
    private $registration;
    private $makeModel;
    private $seats;
    private $engine;
    private $dateBought;
    private $nextService;
    
    public function __construct($r, $m, $s, $e, $d, $n) {
       $this->registration = $r;
       $this->makeModel = $m;
       $this->seats = $s;
       $this->engine = $e;
       $this->dateBought = $d;
       $this->nextService = $n;
    }
    
    //appropriate get methods
    public function getRegistration() {
        return $this->registration;
    }
    
     public function getMakeModel() {
        return $this->makeModel;
    }
    
     public function getSeats() {
        return $this->seats;
    }
    
     public function getEngine() {
        return $this->engine;
    }
    
     public function getDateBought() {
        return $this->dateBought;
    }
    
     public function getNextService() {
        return $this->nextService;
    }
}