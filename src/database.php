<?php declare(strict_types=1);

require_once('../config.php');

class Database
{
    public $db;
    
    public function __construct(){
        $this->db = new Config();
        print_r($this->db);
   }
}
$db = new Database();