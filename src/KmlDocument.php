<?php

namespace LibKml;

use LibKml\Domain\KmlObject;

/**
 * Defines a KML document.
 */
class KmlDocument {

  private $elements = array();

  /**
   * @param KmlObject $element
   */
  public function addElement(KmlObject $element) {
    $this->elements[] = $element;
  }

  /**
   * @return array
   */
  public function getElements(): array {
    return $this->elements;
  }

  /**
   * @param array $elements
   */
  public function setElements(array $elements) {
    $this->elements = $elements;
  }

}
