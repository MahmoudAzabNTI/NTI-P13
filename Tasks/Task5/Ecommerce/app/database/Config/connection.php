<?php 
class Connection {
  private $hostname = 'localhost';
  private $username = 'root';
  private $password = '';
  private $dbname = 'ecommerce_nti';
  private $port;
  private $con;
  
  public function __construct() {
    $this->con = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
    // if(mysqli_connect_errno() || $this->con->connect_error){
    //   echo "Failed to connect to MySql" . mysqli_connect_error();
    //   exit();
    // }else{
    //   echo "Success to connect to MySql";
    // }
  }
  // insert update delete
  public function runDML($query){
    $result = $this->con->query($query);
    if($result){
      return true;
    }else {
      return false;
    }
  }
  public function runDQL($query)
  {
    $result = $this->con->query($query);
    if($result->num_rows > 0){
      return $result;
    }else {
      return [];
    }
  }
  
}
?>