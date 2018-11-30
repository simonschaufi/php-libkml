<?php

namespace LibKml\Domain;

use LibKml\Domain\FieldType\HttpQuery;

/**
 * Defines an image associated with an Icon style or overlay.
 */
class Icon extends KmlObject {

  private $href;
  private $refreshMode;
  private $refreshInterval;
  private $viewRefreshMode;
  private $viewRefreshTime;
  private $viewBoundScale;
  private $viewFormat;
  private $httpQuery;

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitIcon($this);
  }

  /**
   *
   */
  public function getHref() {
    return $this->href;
  }

  /**
   *
   */
  public function setHref($href) {
    $this->href = $href;
  }

  /**
   * @return int
   */
  public function getRefreshMode() {
    return $this->refreshMode;
  }

  /**
   * @param int $refreshMode
   */
  public function setRefreshMode($refreshMode) {
    $this->refreshMode = $refreshMode;
  }

  /**
   * @return int
   */
  public function getRefreshInterval() {
    return $this->refreshInterval;
  }

  /**
   * Indicates to refresh the file every $refreshInterval seconds.
   *
   * @param int $refreshInterval
   *   Refresh interval in seconds.
   */
  public function setRefreshInterval($refreshInterval) {
    $this->refreshInterval = $refreshInterval;
  }

  /**
   * @return int
   */
  public function getViewRefreshMode() {
    return $this->viewRefreshMode;
  }

  /**
   *
   */
  public function setViewRefreshMode($viewRefreshMode) {
    $this->viewRefreshMode = $viewRefreshMode;
  }

  /**
   * @return int
   */
  public function getViewRefreshTime() {
    return $this->viewRefreshTime;
  }

  /**
   *
   */
  public function setViewRefreshTime($viewRefreshTime) {
    $this->viewRefreshTime = $viewRefreshTime;
  }

  /**
   * @return int
   */
  public function getViewBoundScale() {
    return $this->viewBoundScale;
  }

  /**
   *
   */
  public function setViewBoundScale($viewBoundScale) {
    $this->viewBoundScale = $viewBoundScale;
  }

  /**
   *
   */
  public function getViewFormat() {
    return $this->viewFormat;
  }

  /**
   *
   */
  public function setViewFormat($viewFormat) {
    $this->viewFormat = $viewFormat;
  }

  /**
   * @return \LibKml\Domain\FieldType\HttpQuery
   */
  public function getHttpQuery() {
    return $this->httpQuery;
  }

  /**
   * @param \LibKml\Domain\FieldType\HttpQuery $httpQuery
   */
  public function setHttpQuery(HttpQuery $httpQuery) {
    $this->httpQuery = $httpQuery;
  }

}
