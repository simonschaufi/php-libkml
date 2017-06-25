<?php
namespace KML\Geometries;

use KML\KMLObject;

/**
 *  Geometry abstract class
 */
 
abstract class Geometry extends KMLObject
{
    abstract public function toWKT();
    abstract public function toJSON();
}
