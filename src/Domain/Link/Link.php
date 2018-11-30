<?php

namespace LibKML\Domain\Link;

use LibKML\Domain\KMLObject;

/**
 * Link class.
 */
class Link extends KMLObject {

  public static $REFRESH_MODE_ON_CHANGE = 0;
  public static $REFRESH_MODE_ON_INTERVAL = 1;
  public static $REFRESH_MODE_ON_EXPIRE = 2;

  private $href;
  private $refreshMode;
  private $refreshInterval;
  private $viewRefreshMode;
  private $viewRefreshTime;
  private $viewBoundScale;
  private $viewFormat;
  private $httpQuery;

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
   *
   */
  public function getrefreshMode() {
    return $this->refreshMode;
  }

  /**
   * Specifies a time-based refresh mode.
   *
   * @param int $refreshMode
   */
  public function setRefreshMode($refreshMode) {
    $this->refreshMode = $refreshMode;
  }

  /**
   *
   */
  public function getRefreshInterval() {
    return $this->refreshInterval;
  }

  /**
   * @param int $refreshInterval
   */
  public function setRefreshInterval($refreshInterval) {
    $this->href = $refreshInterval;
  }

  /**
   *
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
   *
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
   *
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
   *
   */
  public function getHttpQuery() {
    return $this->httpQuery;
  }

  /**
   *
   */
  public function setHttpQuery($httpQuery) {
    $this->httpQuery = $httpQuery;
  }

}
