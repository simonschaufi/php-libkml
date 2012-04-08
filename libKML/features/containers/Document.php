<?php
namespace libKML;

/**
 *  Document class
 */

class Document extends Container {
  
  private $schemas = array();
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    $output[] = sprintf("<Document%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    foreach($this->schemas as $schema) {
      $output[] = $schema->__toString();
    }
    
    $output[] = "</Document>";
    
    return implode("\n", $output);
  }
  
  public function addSchema($schema) {
    $this->schemas[] = $schema;
  }
  
  public function clearSchemas() {
    $this->schemas = array();
  }
  
  public function getSchemas() {
    return $this->schemas;
  }
  
  public function setSchemas($schemas) {
    $this->schemas = $schemas;
  }
}

?>