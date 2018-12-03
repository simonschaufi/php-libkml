<?php

namespace LibKml;

use LibKml\Domain\Feature\Feature;
use LibKml\Domain\NetworkLinkControl;

/**
 * The root element of a KML file.
 */
class KmlDocument {

  private $hint;
  private $networkLinkControl;
  private $feature;

  public function getHint() {
    return $this->hint;
  }

  public function setHint(string $hint): void {
    $this->hint = $hint;
  }

  public function getNetworkLinkControl() {
    return $this->networkLinkControl;
  }

  public function setNetworkLinkControl(NetworkLinkControl $networkLinkControl): void {
    $this->networkLinkControl = $networkLinkControl;
  }

  public function getFeature() {
    return $this->feature;
  }

  public function setFeature(Feature $feature): void {
    $this->feature = $feature;
  }

}
