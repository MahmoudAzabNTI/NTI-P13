<?php
include_once __DIR__ . '\..\database\config\connection.php';
include_once __DIR__ . '/../interfaces/CURD.php';
class Brand extends Connection implements CURD {
  protected $table = "brands";
  protected $id, $name_ar, $name_en, $status, $icon, $color, $image, $created_at, $update_at;
  public function getId()
  {
    # code...
    return $this->id;
  }
  public function setId($id)
  {
    # code...
    $this->id = $id;
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
   * Get the value of created_at
   */ 
  public function getCreated_at()
  {
    return $this->created_at;
  }

  /**
   * Set the value of created_at
   *
   * @return  self
   */ 
  public function setCreated_at($created_at)
  {
    $this->created_at = $created_at;

    return $this;
  }

  /**
   * Get the value of update_at
   */ 
  public function getUpdate_at()
  {
    return $this->update_at;
  }

  /**
   * Set the value of update_at
   *
   * @return  self
   */ 
  public function setUpdate_at($update_at)
  {
    $this->update_at = $update_at;

    return $this;
  }
  public function read()
  {
    # code...
    $query = "SELECT id, name_ar, name_en, status FROM $this->table WHERE `status` = $this->status";
    return $this->runDQL($query);
  }
  public function readById()
  {
    # code...
    $query = "SELECT id, name_ar, name_en, price, status FROM `products` WHERE `status`= $this->status AND `brand_id` = $this->id";
    // print_r($query);
    return $this->runDQL($query);
  }
  public function create()
  {
    # code... 
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