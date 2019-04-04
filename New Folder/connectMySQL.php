<?php
class MySQLDatabase {

    private $link = null;
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpassword = '4a9a85ae94b94fb8';
    private $db = 'test';

    function connect() {
        $this->link = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpassword);
        if(!$this->link) {
            die('Not connected : ' . mysqli_connect_error());
        }
        $database = mysqli_select_db($this->link, $this->db);
        if(!$database){
            die ('Cannot use : ' . $this->db);
        }
    }

    function query($query) {
        $result = mysqli_query($this->link, $query);
        if($result) {
            return $result;
        }
        else {
            die(mysqli_error($this->link)); // useful for debugging
        }
        return null;
    }

    function disconnect() {
        mysqli_close($this->link);
    }
}
?>