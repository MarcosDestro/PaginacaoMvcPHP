<?php
class Model {
    protected $db;

    public function __construct(){
        //Puxa a global da conexão em config.
        global $db;
        $this->db = $db;
    }
}