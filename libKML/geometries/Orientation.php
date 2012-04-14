<?php
namespace libKML;

/**
 *  ResouceMap class
 */

class Orientation extends KMLObject {
  
  private $heading;
  private $tilt;
  private $roll;
  
  public function getHeading() {
    return $this->heading;
  }
  
  public function setHeading($heading) {
    $this->heading = $heading;
  }
  
  public function gettilt() {
    return $this->tilt;
  }
  
  public function settilt($tilt) {
    $this->tilt = $tilt;
  }
  
  public function getroll() {
    return $this->roll;
  }
  
  public function setroll($roll) {
    $this->roll = $roll;
  }
  
}

?>