<?php

namespace LibKml\Domain;

/**
 * Base KMLObject.
 */
abstract class KmlObject {

  protected $id;
  protected $targetId;

  /**
   * Gets KML attribute id.
   *
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Sets KML attribute id.
   *
   * @param $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getTargetId() {
    return $this->targetId;
  }

  /**
   * @param string $targetId
   */
  public function setTargetId($targetId) {
    $this->targetId = $targetId;
  }

  /**
   * @param KmlObjectVisitor $visitor
   */
  public abstract function accept(KmlObjectVisitor $visitor);

}
