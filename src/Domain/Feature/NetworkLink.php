<?php

namespace LibKml\Domain\Feature;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Link;
use LibKml\Domain\KmlDocument;

/**
 * References a KML file or KMZ archive on a local or remote network.
 */
class NetworkLink extends Feature {

  private $refreshVisibility;
  private $flyToView;
  private $link;

  /**
   * Parsed KML from the link location.
   *
   * @var \LibKml\Domain\KmlDocument
   */
  private $kmlDocument;

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

  public function getLink(): Link {
    return $this->link;
  }

  public function setLink(Link $link): void {
    $this->link = $link;
  }

  public function getKmlDocument(): KmlDocument {
    return $this->kmlDocument;
  }

  public function setKmlDocument(KmlDocument $kmlDocument): void {
    $this->kmlDocument = $kmlDocument;
  }

}
