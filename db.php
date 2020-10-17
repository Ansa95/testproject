<?php

class db{
    private $host;
    private $user;
    private $password;
    private $db;
    public $con;
    public $error;
    public $res;


    function __construct($host,$user,$password,$db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }

    public function connect()
    {
        $this->con=mysqli_connect($this->host,$this->user,$this->password, $this->db);
        if($this->con) {
            return true;

        }
        else{
            return false;
        }

    }

    public function run($sql)
    {
        $res=mysqli_query($this->con,$sql);
        $this->error=mysqli_error($this->con);
        $this->res=$res;
        return $res;
    }

    public function get_error()
    {
      return $this->error;
    }

    function getResult(){
        return mysqli_fetch_all($this->res,MYSQLI_ASSOC);
    }

    function getRow(){
        
        return mysqli_fetch_array($this->res);
    }
}

?>