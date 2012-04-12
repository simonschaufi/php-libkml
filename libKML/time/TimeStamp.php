<?php
namespace libKML;

/**
 *  TimeStamp class
 */

require_once("TimePrimitive.php");

class TimeStamp extends TimePrimitive {
  public $when;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    if (isset($this->when)) {
      $output[] = sprintf("<TimeStamp%s>",
                          isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
      $output[] = $parent_string;
      
      $output[] = $this->when->__toString();
      
      $output[] = "</TimeStamp>";
    }
    
    return implode("\n", $output);
  }
}
?>