<?php
namespace libKML;

/**
 *  ResouceMap class
 */

require_once("KMLObject.php");

class Orientation extends KMLObject {
  public $heading;
  public $tilt;
  public $roll;
}

?>