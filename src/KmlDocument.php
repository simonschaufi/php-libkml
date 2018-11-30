<?php

namespace LibKml;

use LibKml\Domain\KmlObject;

/**
 * Defines a KML document.
 */
class KmlDocument {

  private $elements = array();

  public function addElement(KmlObject $element) {
    $this->elements[] = $element;
  }

  public function getElements(): array {
    return $this->elements;
  }

  public function setElements(array $elements) {
    $this->elements = $elements;
  }

}
