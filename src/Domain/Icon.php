<?php

namespace LibKml\Domain;

use LibKml\Domain\FieldType\HttpQuery;

/**
 * Defines an image associated with an Icon style or overlay.
 */
class Icon extends KmlObject {

  /**
   * @var string
   */
  private $href;

  /**
   * @var int
   */
  private $refreshMode;

  /**
   * @var int
   */
  private $refreshInterval;

  /**
   * @var int
   */
  private $viewRefreshMode;
  private $viewRefreshTime;

  /**
   * @var int
   */
  private $viewBoundScale;

  /**
   * @var string
   */
  private $viewFormat;

  /**
   * @var \LibKml\Domain\FieldType\HttpQuery
   */
  private $httpQuery;

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitIcon($this);
  }

  public function getHref() {
    return $this->href;
  }

  public function setHref($href) {
    $this->href = $href;
  }

  public function getRefreshMode() {
    return $this->refreshMode;
  }

  public function setRefreshMode($refreshMode) {
    $this->refreshMode = $refreshMode;
  }

  public function getRefreshInterval() {
    return $this->refreshInterval;
  }

  /**
   * Indicates to refresh the file every $refreshInterval seconds.
   *
   * @param integer $refreshInterval
   *   Refresh interval in seconds.
   */
  public function setRefreshInterval($refreshInterval) {
    $this->refreshInterval = $refreshInterval;
  }

  public function getViewRefreshMode() {
    return $this->viewRefreshMode;
  }

  public function setViewRefreshMode($viewRefreshMode) {
    $this->viewRefreshMode = $viewRefreshMode;
  }

  public function getViewRefreshTime() {
    return $this->viewRefreshTime;
  }

  public function setViewRefreshTime($viewRefreshTime) {
    $this->viewRefreshTime = $viewRefreshTime;
  }

  public function getViewBoundScale() {
    return $this->viewBoundScale;
  }

  public function setViewBoundScale($viewBoundScale) {
    $this->viewBoundScale = $viewBoundScale;
  }

  public function getViewFormat() {
    return $this->viewFormat;
  }

  public function setViewFormat(string $viewFormat) {
    $this->viewFormat = $viewFormat;
  }

  public function getHttpQuery() {
    return $this->httpQuery;
  }

  public function setHttpQuery(HttpQuery $httpQuery) {
    $this->httpQuery = $httpQuery;
  }

}
