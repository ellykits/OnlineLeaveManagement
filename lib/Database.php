<?php
class Database{
    private $host = "localhost";
    private $db_name = "olms";
    private $db_password = "*123*admin#";
    private $db_user ="admin";   
    private $query_error ="**LOGGED ERRORS**: <br>";
    private $db_connect;
    
    public function __construct(){
        $this->host = "localhost";
        $this->db_name = "olms";
        $this->db_password = "*123*admin#";
        $this->db_user ="admin";   
        $this->query_error ="**LOGGED ERRORS**: <br>";
     
    }
    public function connectToDatabase(){
        
        $this->db_connect =  new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);;
        if(!$this->db_connect){
            $this->query_error .= $this->db_connect->error;
            return null;
        }
        return new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);
    }
   
    public function run($sql){
        
        $query = $this->db_connect->prepare($sql);
        if(!$query){
            $this->query_error .= $this->db_connect->error;
            return false;
        }
        if ($query->execute()){
            return true;
        }else{            
            $this->query_error .= $this->db_connect->error;
            return false;
        }   
    }
   
    public function getError(){
        return $this->query_error;
    }
    
    public function postElements($element){
    	$str = trim($element);
    	$str = htmlspecialchars($element);
    	$str = stripslashes($element);
    	return $str;
    }
}

?>