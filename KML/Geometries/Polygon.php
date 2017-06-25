<?php
namespace KML\Geometries;

/**
 *  Polygon class
 */

class Polygon extends Geometry {
  
  private $extrude;
  private $tessellate;
  private $altitudeMode;
  private $outerBoundaryIs;
  private $innerBoundaryIs;
  
  public function toJSON() {
    $json_data = null;
    
    if (isset($this->outerBoundaryIs)) {
      $json_data = array('type' => 'Polygon',
                         'coordinates' => array());
      
      $outerCoordinates = $this->outerBoundaryIs->getCoordinates();
      foreach($outerCoordinates as $coordinate) {
        $json_data['coordinates'][0][] = $coordinate->toJSON();
      }
      
      $first_coordinate = $outerCoordinates[0];
      $last_coordinate = end($outerCoordinates);
      if ($first_coordinate != $last_coordinate) {
        $json_data['coordinates'][0][] = $first_coordinate->toJSON();
      }
      
      if (isset($this->innerBoundaryIs)) {
        $innerCoordinates = $this->innerBoundaryIs->getCoordinates();
        foreach($innerCoordinates as $coordinate) {
          $json_data['coordinates'][1][] = $coordinate->toJSON();
        }
        
        $first_coordinate = $innerCoordinates[0];
        $last_coordinate = end($innerCoordinates);
        if ($first_coordinate != $last_coordinate) {
          $json_data['coordinates'][1][] = $first_coordinate->toJSON();
        }
      }
    } 
    
    return $json_data;
  }
   
  public function toWKT() {
    $wkt_string = "";
    
    if (isset($this->outerBoundaryIs)) {
      $wkt_array = array();
      
      $outer_wkt_array = array();
      if (isset($this->outerBoundaryIs)) {
        $outerCoordinates = $this->outerBoundaryIs->getCoordinates();
        if (count($outerCoordinates)) {
          foreach($outerCoordinates as $coordinate) {
            $outer_wkt_array[] = $coordinate->toWKT();
          }
          
          $first_coordinate = $outerCoordinates[0];
          $last_coordinate = end($outerCoordinates);
          if ($first_coordinate != $last_coordinate) {
            $outer_wkt_array[] = $first_coordinate->toWKT();
          }
          
          $wkt_array[] = '('. implode(",", $outer_wkt_array) .')';
        }
      }
      
      $inner_wkt_array = array();
      if (isset($this->innerBoundaryIs)) {
        $innerCoordinates = $this->innerBoundaryIs->getCoordinates();
        if (count($innerCoordinates)) {
          foreach($innerCoordinates as $coordinate) {
            $inner_wkt_array[] = $coordinate->toWKT();
          }
          
          $first_coordinate = $innerCoordinates[0];
          $last_coordinate = end($innerCoordinates);
          if ($first_coordinate != $last_coordinate) {
            $inner_wkt_array[] = $first_coordinate->toWKT();
          }

          $wkt_array[] = '('. implode(",", $inner_wkt_array) .')';
        }
      }

      $wkt_string = sprintf("POLYGON(%s)", implode(",", $wkt_array));
    } 
    
    return $wkt_string;
  }
  
  public function toWKT2d() {
    $wkt_string = "";
    
    if (isset($this->outerBoundaryIs)) {
      $wkt_array = array();
      
      $outer_wkt_array = array();
      if (isset($this->outerBoundaryIs)) {
        $outerCoordinates = $this->outerBoundaryIs->getCoordinates();
        if (count($outerCoordinates)) {
          foreach($outerCoordinates as $coordinate) {
            $outer_wkt_array[] = $coordinate->toWKT2d();
          }
          
          $first_coordinate = $outerCoordinates[0];
          $last_coordinate = end($outerCoordinates);
          if ($first_coordinate != $last_coordinate) {
            $outer_wkt_array[] = $first_coordinate->toWKT2d();
          }
          
          $wkt_array[] = '('. implode(",", $outer_wkt_array) .')';
        }
      }
      
      $inner_wkt_array = array();
      if (isset($this->innerBoundaryIs)) {
        $innerCoordinates = $this->innerBoundaryIs->getCoordinates();
        if (count($innerCoordinates)) {
          foreach($innerCoordinates as $coordinate) {
            $inner_wkt_array[] = $coordinate->toWKT2d();
          }
          
          $first_coordinate = $innerCoordinates[0];
          $last_coordinate = end($innerCoordinates);
          if ($first_coordinate != $last_coordinate) {
            $inner_wkt_array[] = $first_coordinate->toWKT2d();
          }
          
          $wkt_array[] = '('. implode(",", $inner_wkt_array) .')';
        }
      }
      
      $wkt_string = sprintf("POLYGON(%s)", implode(",", $wkt_array));
    } 
    
    return $wkt_string;
  }
  
  public function __toString() {
   
    $output = array();
    $output[] = sprintf("<Polygon%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    
    if (isset($this->extrude)) {
      $output[] = sprintf("\t<extrude>%s</extrude>", $this->extrude);
    }
    
    if (isset($this->tessellate)) {
      $output[] = sprintf("\t<tessellate>%s</tessellate>", $this->tessellate);
    }
    
    if (isset($this->altitudeMode)) {
      $output[] = sprintf("\t<altitudeMode>%s</altitudeMode>", $this->altitudeMode->__toString());
    }
    
    if (isset($this->innerBoundaryIs)) {
      $output[] = sprintf("\t<innerBoundaryIs>\n%s\n</innerBoundaryIs>", $this->innerBoundaryIs->__toString());
    }
    
    if (isset($this->outerBoundaryIs)) {
      $output[] = sprintf("\t<outerBoundaryIs>\n%s\n</outerBoundaryIs>", $this->outerBoundaryIs->__toString());
    }
    
    $output[] = "</Polygon>";
    
    return implode("\n", $output);
  }
  
  public function getExtrude() {
    return $this->extrude;
  }
  
  public function setExtrude($extrude) {
    $this->extrude = $extrude;
  }
  
  public function getTessellate() {
    return $this->tessellate;
  }
  
  public function setTessellate($tessellate) {
    $this->tessellate = $tessellate;
  }
  
  public function getAltitudeMode() {
    return $this->altitudeMode;
  }
  
  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }
  
  public function getOuterBoundaryIs() {
    return $this->outerBoundaryIs;
  }
  
  public function setOuterBoundaryIs($outerBoundaryIs) {
    $this->outerBoundaryIs = $outerBoundaryIs;
  }
  
  public function getInnerBoundaryIs() {
    return $this->innerBoundaryIs;
  }
  
  public function setInnerBoundaryIs($innerBoundaryIs) {
    $this->innerBoundaryIs = $innerBoundaryIs;
  }
  
}

?>