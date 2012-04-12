<?php
namespace libKML;

/**
 *  Location class
 */

require_once("KMLObject.php");

class Location extends KMLObject {
  public $longitude;
  public $latitude;
  public $altitude;
}

?>