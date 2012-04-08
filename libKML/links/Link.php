<?php
namespace libKML;

/**
 *  Link class
 */

class Link extends KMLObject {
  
  private $href;
  private $refreshMode;
  private $refreshInterval;
  private $viewRefreshMode;
  private $viewRefreshTime;
  private $viewBoundScale;
  private $viewFormat;
  private $httpQuery;
  
  public function __toString() {
    $output = array();
    
    $output[] = sprintf("<Link%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    
    if (isset($this->href)) {
      $output[] = sprintf("\t<href>%s</href>", $this->href);
    }
    
    if (isset($this->refreshMode)) {
      $output[] = sprintf("\t<refreshMode>%s</refreshMode>", $this->refreshMode);
    }
    
    if (isset($this->refreshInterval)) {
      $output[] = sprintf("\t<refreshInterval>%f</refreshInterval>", $this->refreshInterval);
    }
    
    if (isset($this->viewRefreshMode)) {
      $output[] = sprintf("\t<viewRefreshMode>%s</viewRefreshMode>", $this->viewRefreshMode);
    }
    
    if (isset($this->viewRefreshTime)) {
      $output[] = sprintf("\t<viewRefreshTime>%f</viewRefreshTime>", $this->viewRefreshTime);
    }
    
    if (isset($this->viewBoundScale)) {
      $output[] = sprintf("\t<viewBoundScale>%f</viewBoundScale>", $this->viewBoundScale);
    }
    
    if (isset($this->viewFormat)) {
      $output[] = sprintf("\t<viewFormat>%s</viewFormat>", $this->viewFormat);
    }
    
    if (isset($this->httpQuery)) {
      $output[] = sprintf("\t<httpQuery>%s</httpQuery>", $this->httpQuery);
    }
    
    $output[] = "</Link>";
    
    return implode("\n", $output);
  }
  
  public function getHref() {
    return $this->href;
  }
  
  public function setHref($href) {
    $this->href = $href;
  }
  
  public function getrefreshMode() {
    return $this->refreshMode;
  }
  
  public function setRefreshMode($refreshMode) {
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

?>