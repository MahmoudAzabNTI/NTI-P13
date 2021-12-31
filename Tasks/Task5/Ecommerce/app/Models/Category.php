<?php
include_once __DIR__ . '\..\database\config\connection.php';
include_once __DIR__ . '/../interfaces/CURD.php';
class Category extends Connection implements CURD{
  private $id, $name_en, $name_ar, $icon, $color, $image, $status, $created_at, $updated_at;
  private $table = "categories";
  

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
   * Get the value of name_en
   */ 
  public function getName_en()
  {
    return $this->name_en;
  }

  /**
   * Set the value of name_en
   *
   * @return  self
   */ 
  public function setName_en($name_en)
  {
    $this->name_en = $name_en;

    return $this;
  }

  /**
   * Get the value of name_ar
   */ 
  public function getName_ar()
  {
    return $this->name_ar;
  }

  /**
   * Set the value of name_ar
   *
   * @return  self
   */ 
  public function setName_ar($name_ar)
  {
    $this->name_ar = $name_ar;

    return $this;
  }

  /**
   * Get the value of icon
   */ 
  public function getIcon()
  {
    return $this->icon;
  }

  /**
   * Set the value of icon
   *
   * @return  self
   */ 
  public function setIcon($icon)
  {
    $this->icon = $icon;

    return $this;
  }

  /**
   * Get the value of color
   */ 
  public function getColor()
  {
    return $this->color;
  }

  /**
   * Set the value of color
   *
   * @return  self
   */ 
  public function setColor($color)
  {
    $this->color = $color;

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
  public function create()
  {
    # code...
  }
  public function read()
  {
    $query = "SELECT id, name_en FROM `$this->table` WHERE status = '$this->status'";
    return $this->runDQL($query);
  }
  public function readByCat()
  {
    # code...
    $query = "SELECT id, name_en, price, status FROM `products_detials` WHERE `status` = $this->status AND `category_id` = $this->id";
    return $this->runDQL($query);
  }
  public function update()
  {
    # code...
  }
  public function delete()
  {
    # code...
  }
  
  
}
?>