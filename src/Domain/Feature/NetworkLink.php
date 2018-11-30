<?php

namespace LibKml\Domain\Feature;

use LibKml\Domain\KmlObjectVisitor;

/**
 * References a KML file or KMZ archive on a local or remote network.
 */
class NetworkLink extends Feature {

  private $refreshVisibility;
  private $flyToView;

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitNetworkLink($this);
  }

  public function getRefreshVisibility() {
    $this->refreshVisibility;
  }

  public function setRefreshVisibility($refreshVisibility) {
    $this->refreshVisibility = $refreshVisibility;
  }

  public function getFlyToView() {
    $this->flyToView;
  }

  public function setFlyToView($flyToView) {
    $this->flyToView = $flyToView;
  }

}
