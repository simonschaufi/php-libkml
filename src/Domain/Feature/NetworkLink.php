<?php

namespace LibKML\Domain\Feature;

/**
 * NetworkLink abstract class.
 */
class NetworkLink extends Feature {

  private $refreshVisibility;
  private $flyToView;

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
