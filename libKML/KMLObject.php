<?php
namespace libKML;

/**
 *  KMLObject abstract class
 *  Base KMLObject
 */
abstract class KMLObject {
  protected $id;
  
  /**
   *  Sets KML tag id
   */
  public function setId($id) {
    $this->id = $id;
  }
  
  /**
   *  Gets KML tag id
   */
  public function getId() {
    return $this->id;
  }
  
  public abstract function __toString();
}
?>