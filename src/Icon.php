<?php
namespace KML;

use KML\FieldTypes\RefreshMode;

/**
 *  Icon class
 */

class Icon extends KMLObject
{
    /** @var  string */
    private $href;
    /** @var  RefreshMode */
    private $refreshMode;
    /** @var  string */
    private $refreshInterval;
    /** @var  string */
    private $viewRefreshMode;
    /** @var  string */
    private $viewRefreshTime;
    /** @var  string */
    private $viewBoundScale;
    /** @var  string */
    private $viewFormat;
    /** @var  string */
    private $httpQuery;
  
    public function __toString(): string
    {
        $output = [];
    
        $output[] = sprintf(
            "<Icon%s>",
            isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
        );
    
        if (isset($this->href)) {
            $output[] = sprintf("\t<href>%s</href>", $this->href);
        }
    
        if (isset($this->refreshMode)) {
            $output[] = sprintf("\t<refreshMode>%s</refreshMode>", $this->refreshMode->__toString());
        }
    
        if (isset($this->refreshInterval)) {
            $output[] = sprintf("\t<refreshInterval>%s</refreshInterval>", $this->refreshInterval);
        }
    
        if (isset($this->viewRefreshMode)) {
            $output[] = sprintf("\t<viewRefreshMode>%s</viewRefreshMode>", $this->viewRefreshMode);
        }
    
        if (isset($this->viewRefreshTime)) {
            $output[] = sprintf("\t<viewRefreshTime>%s</viewRefreshTime>", $this->viewRefreshTime);
        }
    
        if (isset($this->viewBoundScale)) {
            $output[] = sprintf("\t<viewBoundScale>%s</viewBoundScale>", $this->viewBoundScale);
        }
    
        if (isset($this->viewFormat)) {
            $output[] = sprintf("\t<viewFormat>%s</viewFormat>", $this->viewFormat);
        }
    
        if (isset($this->httpQuery)) {
            $output[] = sprintf("\t<httpQuery>%s</httpQuery>", $this->httpQuery);
        }
    
        $output[] = "</Icon>";
    
        return implode("\n", $output);
    }
  
    public function getHref(): string
    {
        return $this->href;
    }
  
    public function setHref(string $href)
    {
        $this->href = $href;
    }
  
    public function getRefreshMode(): RefreshMode
    {
        return $this->refreshMode;
    }
  
    public function setRefreshMode(RefreshMode $refreshMode)
    {
        $this->refreshMode = $refreshMode;
    }
  
    public function getRefreshInterval(): string
    {
        return $this->refreshInterval;
    }
  
    public function setRefreshInterval(string $refreshInterval)
    {
        $this->href = $refreshInterval;
    }
  
    public function getViewRefreshMode(): string
    {
        return $this->viewRefreshMode;
    }
  
    public function setViewRefreshMode(string $viewRefreshMode)
    {
        $this->viewRefreshMode = $viewRefreshMode;
    }
  
    public function getViewRefreshTime(): string
    {
        return $this->viewRefreshTime;
    }
  
    public function setViewRefreshTime(string $viewRefreshTime)
    {
        $this->viewRefreshTime = $viewRefreshTime;
    }
  
    public function getViewBoundScale(): string
    {
        return $this->viewBoundScale;
    }
  
    public function setViewBoundScale(string $viewBoundScale)
    {
        $this->viewBoundScale = $viewBoundScale;
    }
  
    public function getViewFormat(): string
    {
        return $this->viewFormat;
    }
  
    public function setViewFormat(string $viewFormat)
    {
        $this->viewFormat = $viewFormat;
    }
  
    public function getHttpQuery(): string
    {
        return $this->httpQuery;
    }
  
    public function setHttpQuery(string $httpQuery)
    {
        $this->httpQuery = $httpQuery;
    }
}
