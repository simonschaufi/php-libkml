<?php
namespace libKML;

/**
 *  Folder class
 */

class Folder extends Container {
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    $output[] = sprintf("<Folder%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;    
    $output[] = "</Folder>";
    
    return implode("\n", $output);
  }
}

?>