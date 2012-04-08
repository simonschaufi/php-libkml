<?php
namespace libKML;

/**
 *  KMLObject abstract class
 */
abstract class KMLObject {
  protected $id;
  
  public function setId($id) {
    $this->id = $id;
  }
  
  public function getId() {
    return $this->id;
  }
  
  public abstract function __toString();
}
?>