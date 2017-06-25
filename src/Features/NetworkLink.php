<?php
namespace KML\Features;

class NetworkLink extends Feature
{
    private $refreshVisibility;
    private $flyToView;
  
    public function __toString(): string
    {
        $parent_string = parent::__toString();
    
        $output = [];
    
        $output[] = sprintf(
            "<NetworkLink%s>",
            isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
        );
        $output[] = $parent_string;
    
        if (isset($this->refreshVisibility)) {
            $output[] = sprintf("\t<refreshVisibility>%d<refreshVisibility>", $this->refreshVisibility);
        }
    
        if (isset($this->flyToView)) {
            $output[] = sprintf("\t<flyToView>%d<flyToView>", $this->flyToView);
        }
    
        if (isset($this->link)) {
            $output[] = $this->link->__toString();
        }
    
        $output[] = "</NetworkLink>";
    
        return implode("\n", $output);
    }
  
    public function getAllFeatures()
    {
        return [];
    }
  
    public function toWKT(): string
    {
        return '';
    }
  
    public function toWKT2d(): string
    {
        return '';
    }
  
    public function jsonSerialize()
    {
        return '';
    }
  
    public function getRefreshVisibility()
    {
        $this->refreshVisibility;
    }
  
    public function setRefreshVisibility($refreshVisibility)
    {
        $this->refreshVisibility = $refreshVisibility;
    }
  
    public function getflyToView()
    {
        $this->flyToView;
    }
  
    public function setflyToView($flyToView)
    {
        $this->flyToView = $flyToView;
    }
}
