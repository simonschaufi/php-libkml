<?php
namespace libKML;

/**
 *  TimeSpan class
 */

require_once("TimePrimitive.php");

class TimeSpan extends TimePrimitive {
  public $begin;
  public $end;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    $output[] = sprintf("<TimeSpan%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    $output[] = "</TimeSpan>";
    
    return implode("\n", $output);
  }
}
?>