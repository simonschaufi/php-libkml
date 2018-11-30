<?php

namespace LibKml\Domain;

/**
 * Base KMLObject.
 */
abstract class KmlObject {

  protected $id;
  protected $targetId;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getTargetId() {
    return $this->targetId;
  }

  public function setTargetId($targetId) {
    $this->targetId = $targetId;
  }

  abstract public function accept(KmlObjectVisitorInterface $visitor): void;

}
