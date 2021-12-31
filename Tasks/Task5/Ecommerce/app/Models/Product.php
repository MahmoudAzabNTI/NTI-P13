<?php 
class Product extends Connection implements CURD {
  private $id, $name_ar, $name_en, $bacrcode, $cost, $price, $stock, $image, $description_ar, $description_en, $rich_description_ar, $rich_description_en, $status, $brand_id, $subcategory_id, $created_at, $updated_at;
  private $table = "products";
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
   * Get the value of bacrcode
   */ 
  public function getBacrcode()
  {
    return $this->bacrcode;
  }

  /**
   * Set the value of bacrcode
   *
   * @return  self
   */ 
  public function setBacrcode($bacrcode)
  {
    $this->bacrcode = $bacrcode;

    return $this;
  }

  /**
   * Get the value of cost
   */ 
  public function getCost()
  {
    return $this->cost;
  }

  /**
   * Set the value of cost
   *
   * @return  self
   */ 
  public function setCost($cost)
  {
    $this->cost = $cost;

    return $this;
  }

  /**
   * Get the value of price
   */ 
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Set the value of price
   *
   * @return  self
   */ 
  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }

  /**
   * Get the value of stock
   */ 
  public function getStock()
  {
    return $this->stock;
  }

  /**
   * Set the value of stock
   *
   * @return  self
   */ 
  public function setStock($stock)
  {
    $this->stock = $stock;

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
   * Get the value of description_ar
   */ 
  public function getDescription_ar()
  {
    return $this->description_ar;
  }

  /**
   * Set the value of description_ar
   *
   * @return  self
   */ 
  public function setDescription_ar($description_ar)
  {
    $this->description_ar = $description_ar;

    return $this;
  }

  /**
   * Get the value of description_en
   */ 
  public function getDescription_en()
  {
    return $this->description_en;
  }

  /**
   * Set the value of description_en
   *
   * @return  self
   */ 
  public function setDescription_en($description_en)
  {
    $this->description_en = $description_en;

    return $this;
  }

  /**
   * Get the value of rich_description_ar
   */ 
  public function getRich_description_ar()
  {
    return $this->rich_description_ar;
  }

  /**
   * Set the value of rich_description_ar
   *
   * @return  self
   */ 
  public function setRich_description_ar($rich_description_ar)
  {
    $this->rich_description_ar = $rich_description_ar;

    return $this;
  }

  /**
   * Get the value of rich_description_en
   */ 
  public function getRich_description_en()
  {
    return $this->rich_description_en;
  }

  /**
   * Set the value of rich_description_en
   *
   * @return  self
   */ 
  public function setRich_description_en($rich_description_en)
  {
    $this->rich_description_en = $rich_description_en;

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
   * Get the value of brand_id
   */ 
  public function getBrand_id()
  {
    return $this->brand_id;
  }

  /**
   * Set the value of brand_id
   *
   * @return  self
   */ 
  public function setBrand_id($brand_id)
  {
    $this->brand_id = $brand_id;

    return $this;
  }

  /**
   * Get the value of subcategory_id
   */ 
  public function getSubcategory_id()
  {
    return $this->subcategory_id;
  }

  /**
   * Set the value of subcategory_id
   *
   * @return  self
   */ 
  public function setSubcategory_id($subcategory_id)
  {
    $this->subcategory_id = $subcategory_id;

    return $this;
  }
  public function create()
  {
    # code...
  }
  public function read()
  {
    $query = "SELECT id, name_en, description_en, price,rich_description_en, image FROM `$this->table` WHERE `status` = $this->status";
    return $this->runDQL($query);
  }
  public function readById()
  {
    $query = "SELECT id, name_en, description_en,rich_description_en, price, image FROM `$this->table` WHERE `status` = $this->status AND `id` = $this->id";
    return $this->runDQL($query);
  }
  public function readImagesById()
  {
    $query = "SELECT id, product_id, image FROM `products_images` WHERE  `product_id` = $this->id";
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
  public function getNewProdcuts()
  {
    $query = "SELECT * FROM $this->table ORDER BY created_at LIMIT 4";
  }

  
}
?>