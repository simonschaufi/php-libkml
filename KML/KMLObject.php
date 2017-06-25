<?php
namespace KML;

/**
 *  KMLObject abstract class
 *  Base KMLObject
 */
abstract class KMLObject {
  protected $id;
  
  /**
   *  Sets KML attribute id
   */
  public function setId($id) {
    $this->id = $id;
  }
  
  /**
   *  Gets KML attribute id
   */
  public function getId() {
    return $this->id;
  }
  
  public abstract function __toString();
}
?>