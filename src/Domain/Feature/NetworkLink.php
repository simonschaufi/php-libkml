<?php

namespace LibKml\Domain\Feature;

use LibKml\Domain\KmlObjectVisitor;

/**
 * NetworkLink abstract class.
 */
class NetworkLink extends Feature {

  private $refreshVisibility;
  private $flyToView;

  /**
   * @param KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitNetworkLink($this);
  }

  /**
   *
   */
  public function getAllFeatures() {
    return array();
  }

  /**
   *
   */
  public function getRefreshVisibility() {
    $this->refreshVisibility;
  }

  /**
   *
   */
  public function setRefreshVisibility($refreshVisibility) {
    $this->refreshVisibility = $refreshVisibility;
  }

  /**
   *
   */
  public function getFlyToView() {
    $this->flyToView;
  }

  /**
   *
   */
  public function setFlyToView($flyToView) {
    $this->flyToView = $flyToView;
  }

}
