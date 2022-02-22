<?php
class DB {

    public $host;
    public $db;
    public $user;
    public $pass;

    private $link;

    public function __construct($host = "localhost", $db = "dbtest", $user = "root", $pass = "password") {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;

        try {
            $this->link = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOExcpetion $e) {
            echo $e->getMessage();
        }

    }

    function query($query) {
        $stmt = $this->link->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function thislink() {
        return $this->link;
    }

    function close() {
        $this->link = null;
    }

}


?>