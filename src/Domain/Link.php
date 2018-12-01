<?php

namespace LibKml\Domain;

/**
 * Link class.
 */
class Link extends KmlObject {

  const REFRESH_MODE_ON_CHANGE = 0;
  const REFRESH_MODE_ON_INTERVAL = 1;
  const REFRESH_MODE_ON_EXPIRE = 2;

  private $href;
  private $refreshMode;
  private $refreshInterval;
  private $viewRefreshMode;
  private $viewRefreshTime;
  private $viewBoundScale;
  private $viewFormat;
  private $httpQuery;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitLink($this);
  }

  public function getHref(): string {
    return $this->href;
  }

  public function setHref(string $href): void {
    $this->href = $href;
  }

  public function getrefreshMode(): string {
    return $this->refreshMode;
  }

  public function setRefreshMode(string $refreshMode): void {
    $this->refreshMode = $refreshMode;
  }

  public function getRefreshInterval() {
    return $this->refreshInterval;
  }

  public function setRefreshInterval($refreshInterval) {
    $this->href = $refreshInterval;
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

  public function setViewFormat($viewFormat) {
    $this->viewFormat = $viewFormat;
  }

  public function getHttpQuery() {
    return $this->httpQuery;
  }

  public function setHttpQuery($httpQuery) {
    $this->httpQuery = $httpQuery;
  }

}
