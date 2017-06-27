<?php
namespace KML\Geometries;

use KML\KMLObject;

abstract class Geometry extends KMLObject implements \JsonSerializable
{
    abstract public function toWKT(): string;
}
