<?php
namespace KML\Time;

/**
 *  TimeSpan class
 */

class TimeSpan extends TimePrimitive {
  
  private $begin;
  private $end;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    $output[] = sprintf("<TimeSpan%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    $output[] = "</TimeSpan>";
    
    return implode("\n", $output);
  }
  
  public function getBegin() {
    return $this->begin;
  }
  
  public function setBegin($begin) {
    $this->begin = $begin;
  }
  
  public function getEnd() {
    return $this->end;
  }
  
  public function setEnd($end) {
    $this->end = $end;
  }
  
}
?>