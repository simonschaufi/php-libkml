<?php

namespace LibKml;

use LibKML\Domain\KMLObject;

/**
 * Defines a KML document.
 */
class KmlDocument {

  private $elements = array();

  /**
   *
   */
  public function addElement(KMLObject $element) {
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
