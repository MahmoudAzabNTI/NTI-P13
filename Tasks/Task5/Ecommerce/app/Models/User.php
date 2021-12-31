<?php
include_once __DIR__ . '\..\database\config\connection.php';
include_once __DIR__ . '/../interfaces/CURD.php';

class User extends Connection implements CURD{
  private $id, $first_name, $last_name, $email, $password, $phone, $gender, $image, $status,$code, $created_at, $update_at;
  private $table = "users";
  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of first_name
   */ 
  public function getFirst_name()
  {
    return $this->first_name;
  }

  /**
   * Set the value of first_name
   *
   * @return  self
   */ 
  public function setFirst_name($first_name)
  {
    $this->first_name = $first_name;

    return $this;
  }

  /**
   * Get the value of last_name
   */ 
  public function getLast_name()
  {
    return $this->last_name;
  }

  /**
   * Set the value of last_name
   *
   * @return  self
   */ 
  public function setLast_name($last_name)
  {
    $this->last_name = $last_name;

    return $this;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of password
   */ 
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */ 
  public function setPassword($password)
  {
    $this->password = sha1($password);

    return $this;
  }

  /**
   * Get the value of phone
   */ 
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * Set the value of phone
   *
   * @return  self
   */ 
  public function setPhone($phone)
  {
    $this->phone = $phone;

    return $this;
  }

  /**
   * Get the value of gender
   */ 
  public function getGender()
  {
    return $this->gender;
  }

  /**
   * Set the value of gender
   *
   * @return  self
   */ 
  public function setGender($gender)
  {
    $this->gender = $gender;

    return $this;
  }

  /**
   * Get the value of image
   */ 
  public function getImage()
  {
    return $this->image;
  }

  /**
   * Set the value of image
   *
   * @return  self
   */ 
  public function setImage($image)
  {
    $this->image = $image;

    return $this;
  }

  /**
   * Get the value of status
   */ 
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set the value of status
   *
   * @return  self
   */ 
  public function setStatus($status)
  {
    $this->status = $status;

    return $this;
  }
  /**
   * Get the value of code
   */ 
  public function getCode()
  {
    return $this->code;
  }

  /**
   * Set the value of code
   *
   * @return  self
   */ 
  public function setCode($code)
  {
    $this->code = $code;

    return $this;
  }
  public function create()
  {
    $query = "INSERT INTO `$this->table` (`first_name`, `last_name`, `email`, `password`, `role_id`, `phone`, `code`, `gender`) VALUES ('$this->first_name', '$this->last_name', '$this->email', '$this->password', '2', '$this->phone', '$this->code', '$this->gender')";
    // print_r($query);die;
    return $this->runDML($query);

  }
  public function read()
  {

  }
  public function update()
  {

  }
  public function delete()
  {

  }
  public function login (){
    $query = "SELECT * FROM `$this->table` WHERE email = '$this->email' AND password = '$this->password'";
    print_r($query);
    return $this->runDQL($query);

  }

  
}
?>