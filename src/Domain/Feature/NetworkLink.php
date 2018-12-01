<?php

namespace LibKml\Domain\Feature;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * References a KML file or KMZ archive on a local or remote network.
 */
class NetworkLink extends Feature {

  private $refreshVisibility;
  private $flyToView;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitNetworkLink($this);
  }

  public function getRefreshVisibility(): bool {
    return $this->refreshVisibility;
  }

  public function setRefreshVisibility(bool $refreshVisibility): void {
    $this->refreshVisibility = $refreshVisibility;
  }

  public function getFlyToView(): bool {
    return $this->flyToView;
  }

  public function setFlyToView(bool $flyToView): void {
    $this->flyToView = $flyToView;
  }

}
