<?php
class Database{
    public $conn;
    function __construct()
    {
        $this->conn = new PDO("localhost", "root","","projekt");
        if($this->conn){
            var_dump("Sme ok");
        }else{
            echo "nope";
        }
    }
}
$db = new Database();
$db->conn;

?>
