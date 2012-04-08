<?php
namespace libKML\atom;

/**
 *  Author class implements a xmlns:atom:author object
 */
class Author {
  
  private $name;
  private $uri;
  private $email;
  
  public function __construct($name = null, $uri = null, $email = null) {
    $this->name = $name;
    $this->uri = $uri;
    $this->email = $email;
  }
  
  public function __toString() {
    $output = array();
    
    $output[] = "<atom:author>";
    
    if (isset($this->name)) {
      $output[] = sprintf("\t<atom:name>%s</atom:name>\n", $this->name);
    }
    
    if (isset($this->uri)) {
      
    }
    
    if (isset($this->email)) {
      
    }
    
    $output[] = "</atom:author>";
    
    return implode("\n", $output);
  }
  
  public function setName($name) {
    $this->name = $name;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function setUri($uri) {
    $this->uri = $uri;
  }
  
  public function getUri() {
    return $this->uri;
  }
  
  public function setEmail($email) {
    $this->email = $email;
  }
  
  public function getEmail() {
    return $this->email;
  }
}
?>