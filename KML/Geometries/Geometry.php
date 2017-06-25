<?php
namespace KML\Geometries;

use KML\KMLObject;

/**
 *  Geometry abstract class
 */
 
abstract class Geometry extends KMLObject {
  
  public abstract function toWKT();
  public abstract function toJSON();
  
}
?>