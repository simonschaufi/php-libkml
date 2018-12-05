<?php

namespace LibKml\Domain;

use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\NetworkLinkControl;

/**
 * The root element of a KML file.
 */
class KmlDocument {

  private $networkLinkControl;
  private $feature;

  public function getNetworkLinkControl(): ?NetworkLinkControl {
    return $this->networkLinkControl;
  }

  public function setNetworkLinkControl(?NetworkLinkControl $networkLinkControl): void {
    $this->networkLinkControl = $networkLinkControl;
  }

  public function getFeature(): ?Feature {
    return $this->feature;
  }

  public function setFeature(?Feature $feature): void {
    $this->feature = $feature;
  }

}
