<?php
namespace libKML;

/**
 *   kml root element class kml:kml
 */
 
class KML {
  
  private $networkLinkControl;
  private $feature;
  private $version = KML_DEFAULT_SCHEMA_VERSION;
  private $encoding = KML_DEFAULT_ENCODING;
  
  public function __construct($feature = null) {
    $this->feature = $feature;
  }
  
  public function __toString() {
    $output = array();
    
    $output[] = sprintf("<?xml version=\"1.0\" encoding=\"%s\"?>", $this->encoding);
    $output[] = sprintf("<kml xmlns=\"http://www.opengis.net/kml/%s\">", $this->version);
    
    if (isset($this->feature)) {
      $output[] = $this->feature->__toString();
    }
    
    $output[] = '</kml>';
    
    return implode("\n", $output);
  }
  
  public function toWKT() {
    if (isset($this->feature)) {
      return $this->feature->toWKT();
    } else {
      return '';
    }
  }
  
  public function toJSON() {
    $json_data = array();
    
    if (isset($this->feature)) {
      if ($this->feature instanceof Container) {
        $json_data['type'] = 'FeatureCollection';
        $json_data['features'] = array();
        
        $root_features = $this->feature->getFeatures();
        foreach($root_features as $feature) {
          $json_data['features'][] = $feature->toJSON();
        }    
        
      } else {
        $json_data = $this->feature->toJSON();
      }
    }
    
    return json_encode($json_data);
  }
  
  public function setFeature($feature) {
    if ($feature instanceof Feature) {
      $this->feature = $feature;
    }
  }
  
  public function getFeature() {
    return $this->feature;
  }
}
 
?>